<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\BeedaBlog;
use App\Upload;
use App\Constants\ServiceCategoryType;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Illuminate\Support\Facades\URL;


class BeedaBlogController extends Controller
{
    public function blogList(Request $request)
    {
        if ($request->ajax()) {
            $data = BeedaBlog::with(['user', 'category', 'img'])->get();

            return Datatables::of($data)
            // ->addIndexColumn()
            ->editColumn('category', function ($data) {
                if(isset($data->category->name)) return $data->category->name;
            })
            ->editColumn('status', function($data){
                $active = '';
                $checked = '';
                if($data->status)
                {
                    $active = 'active';
                    $checked = 'checked';
                }
                $switch = '<div class="toggle-btn '.$active.'">
                                <input type="checkbox" onclick="approve('.$data->id.')" class="cb-value approve'.$data->id.'" '.$checked.'/>
                                <span class="round-btn"></span>
                            </div>';
                return $switch;
            })
            ->editColumn('action', function ($data) {
                $btn = '<form action="' . route('beeda.blog.delete', [$data->id]) . '" method="post" id="delete-form' . $data->id . '"><input type="hidden" name="_token" value="' . csrf_token() . '" /><input type="hidden" value="' . $data->id . '" name="id" /></form>';
                $btn .= '<a href="' . route('beeda.blog.edit', [$data->id]) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteBlog(' . $data->id . ')"><i class="material-icons">delete</i></a>';
                return $btn;
            })
            ->rawColumns(['category', 'status', 'action'])
            ->make(true);
        }
        
        $page = 'manage_blog';

        return view('superadmin.beeda_blog.blog_list', compact('page'));
    }

    public function addBlog()
    {
        $categories = Category::where('service_category_id', ServiceCategoryType::BEEDA_MALL)->select('id', 'name')->get();

        $page = 'manage_blog';
        return view('superadmin.beeda_blog.add_blog', compact('categories', 'page'));
    }

    public function addBlogSubmit(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'device_type' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
        ]);

        $blog = new BeedaBlog;
        $blog->user_id = session()->get('super_user_info')->user_id;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->thumbnail_alt = $request->thumbnail_alt;
        $blog->thumbnail_meta_description = $request->thumbnail_meta_description;
        $blog->banner_alt = $request->banner_alt;
        $blog->banner_meta_description = $request->banner_meta_description;
        $blog->device_type = $request->device_type;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        // $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_image_alt = $request->meta_image_alt;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        $description = $request->description;
        $base_64s = [];
        $scraps = explode('src="data:image/',$request->description); 
        for($i=1; $i<count($scraps); $i++) $base_64s[] = "data:image/".explode('">', $scraps[$i])[0];
        $generatedLinks= [];

        foreach($base_64s as $key=>$base_64)
        {
            $image_parts = explode(";base64,", $base_64);
            $imageExtension = explode("image/", $image_parts[0])[1];
            $image_base64 = base64_decode($image_parts[1]);
            if(true) // !env('AWS_ON')
            {
                $fileName = uniqid() . '.'.$imageExtension;
                $file = "img/blogs/".$fileName;
                file_put_contents($file, $image_base64);
                $fileName = env('APP_URL')."/img/blogs/".$fileName;
                $generatedLinks[] = $fileName;
            }
            else
            {
                $fileName = uniqid() . '.'.$imageExtension;
                $file = public_path('test/') . $fileName;
                if(env('APP_ENV') == 'production') $file = str_replace('/public', '', $file);
                file_put_contents($file, $image_base64);
                $unlink_file = $file;
                $aws_file_name = rand(10000000000, 99999999999).'.'.$imageExtension;
                Storage::disk('s3')->put('public/test/'.$aws_file_name, file_get_contents($file));
                unlink($unlink_file);
                $path = env('AWS_MEDIA_URL').'test/'.$aws_file_name;
                $fileName = substr($path, 45, 200);
                $fileName = 'test/'.$aws_file_name;
                $generatedLinks[] = env('AWS_MEDIA_URL').$fileName;
            }    
        }

        foreach($generatedLinks as $key=>$link)  $description = str_replace($base_64s[$key],$link,$description);
        $blog->description = $description;

        if ($request->file('thumbnail')) {
            $upload = new Upload;
            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->getClientOriginalName();
            $size = $request->file('thumbnail')->getSize();
            $ext = $file->getClientOriginalExtension();

            //$file = Storage::disk('s3')->put('public/uploads/all', $request->file('thumbnail'));
            //$path = Storage::disk('s3')->url($file);
            //$file_name = substr($path, 45, 200);

            $file->move('img/blogs/', $name);
            $upload->file_name = env('APP_URL').'/img/blogs/'.$name;

            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->user_id = session()->get('super_user_info')->user_id;
            // $upload->file_name = $file_name;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $blog->thumbnail = $upload->id;
        }

        if ($request->file('banner')) {
            $upload = new Upload;
            $file = $request->file('banner');
            $name = $request->file('banner')->getClientOriginalName();
            $size = $request->file('banner')->getSize();
            $ext = $file->getClientOriginalExtension();

            //$file = Storage::disk('s3')->put('public/uploads/all', $request->file('banner'));
            //$path = Storage::disk('s3')->url($file);
            //$file_name = substr($path, 45, 200);

            $file->move('img/blogs/', $name);
            $upload->file_name = env('APP_URL').'/img/blogs/'.$name;

            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->user_id = session()->get('super_user_info')->user_id;
            // $upload->file_name = $file_name;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $blog->banner = $upload->id;
        }

        if ($request->file('meta_img')) {
            $upload = new Upload;
            $file = $request->file('meta_img');
            $name = $request->file('meta_img')->getClientOriginalName();
            $size = $request->file('meta_img')->getSize();
            $ext = $file->getClientOriginalExtension();

            //$file = Storage::disk('s3')->put('public/uploads/all', $request->file('meta_img'));
            //$path = Storage::disk('s3')->url($file);
            //$file_name = substr($path, 45, 200);

            $file->move('img/blogs/', $name);
            $upload->file_name = env('APP_URL').'/img/blogs/'.$name;

            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->user_id = session()->get('super_user_info')->user_id;
            // $upload->file_name = $file_name;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $blog->meta_img = $upload->id;
        }


        $blog->save();

        return redirect()->route('beeda.blog.list')->with('success_message','Blog post has been created successfully');

    }

    public function editBlog($id)
    {
        $blog = BeedaBlog::find($id);
        $categories = Category::where('service_category_id', ServiceCategoryType::BEEDA_MALL)->select('id', 'name')->get();
        $page = 'manage_blog';
        return view('superadmin.beeda_blog.edit_blog', compact('blog', 'categories', 'page'));
    }

    public function editBlogSubmit(Request $request)
    {        
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
        ]);

        $blog = BeedaBlog::find($request->id);
        $blog->user_id = session()->get('super_user_info')->user_id;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->thumbnail_alt = $request->thumbnail_alt;
        $blog->thumbnail_meta_description = $request->thumbnail_meta_description;
        $blog->banner_alt = $request->banner_alt;
        $blog->banner_meta_description = $request->banner_meta_description;
        $blog->device_type = $request->device_type;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        // $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_image_alt = $request->meta_image_alt;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        $description = $request->description;
        $base_64s = [];
        $scraps = explode('src="data:image/',$request->description); 
        for($i=1; $i<count($scraps); $i++) $base_64s[] = "data:image/".explode('">', $scraps[$i])[0];
        $generatedLinks= [];
        foreach($base_64s as $key=>$base_64)
        {
            $image_parts = explode(";base64,", $base_64);
            $imageExtension = explode("image/", $image_parts[0])[1];
            $image_base64 = base64_decode($image_parts[1]);
            if(true) // !env('AWS_ON')
            {
                $fileName = uniqid() . '.'.$imageExtension;
                $file = "img/blogs/".$fileName;
                file_put_contents($file, $image_base64);
                $fileName = env('APP_URL')."/img/blogs/".$fileName;
                $generatedLinks[] = $fileName;
            }
            else
            {
                $fileName = uniqid() . '.'.$imageExtension;
                $file = public_path('test/') . $fileName;
                if(env('APP_ENV') == 'production') $file = str_replace('/public', '', $file);
                file_put_contents($file, $image_base64);
                $unlink_file = $file;
                $aws_file_name = rand(10000000000, 99999999999).'.'.$imageExtension;
                Storage::disk('s3')->put('public/test/'.$aws_file_name, file_get_contents($file));
                unlink($unlink_file);
                $path = env('AWS_MEDIA_URL').'test/'.$aws_file_name;
                $fileName = substr($path, 45, 200);
                $fileName = 'test/'.$aws_file_name;
                $generatedLinks[] = env('AWS_MEDIA_URL').$fileName;
            }    
        }
        foreach($generatedLinks as $key=>$link)  $description = str_replace($base_64s[$key],$link,$description);
        $blog->description = $description;

        if ($request->file('thumbnail')) {
            $old_upload = Upload::where('id', $blog->thumbnail)->first();
            if($old_upload)
            {
                //if (!file_exists('img/blogs/'.$old_upload->file_original_name)) unlink('img/blogs/'.$old_upload->file_original_name);
                // $old_upload->forceDelete();
                // if(Storage::disk('s3')->exists('public/'.$old_upload->file_name))
                // {
                //     Storage::disk('s3')->delete('public/'.$old_upload->file_name);
                // }
            }
            $upload = new Upload;
            $file = $request->file('thumbnail');
            $name = $request->file('thumbnail')->getClientOriginalName();
            $size = $request->file('thumbnail')->getSize();
            $ext = $file->getClientOriginalExtension();

            // $file = Storage::disk('s3')->put('public/uploads/all', $request->file('thumbnail'));
            // $path = Storage::disk('s3')->url($file);
            // $file_name = substr($path, 45, 200);

            $file->move('img/blogs/', $name);
            $upload->file_name = env('APP_URL').'/img/blogs/'.$name;

            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->user_id = session()->get('super_user_info')->user_id;
            // $upload->file_name = $file_name;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $blog->thumbnail = $upload->id;
        }

        if ($request->file('banner')) {
            $old_upload = Upload::where('id', $blog->banner)->first();
            if($old_upload)
            {
                //if (!file_exists('img/blogs/'.$old_upload->file_original_name)) unlink('img/blogs/'.$old_upload->file_original_name);
                // $old_upload->forceDelete();
                // if(Storage::disk('s3')->exists('public/'.$old_upload->file_name))
                // {
                //     Storage::disk('s3')->delete('public/'.$old_upload->file_name);
                // }
            }
            $upload = new Upload;
            $file = $request->file('banner');
            $name = $request->file('banner')->getClientOriginalName();
            $size = $request->file('banner')->getSize();
            $ext = $file->getClientOriginalExtension();

            // $file = Storage::disk('s3')->put('public/uploads/all', $request->file('banner'));
            // $path = Storage::disk('s3')->url($file);
            // $file_name = substr($path, 45, 200);

            $file->move('img/blogs/', $name);
            $upload->file_name = env('APP_URL').'/img/blogs/'.$name;

            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->user_id = session()->get('super_user_info')->user_id;
            // $upload->file_name = $file_name;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $blog->banner = $upload->id;
        }

        if ($request->file('meta_img')) {
            $old_upload = Upload::where('id', $blog->meta_image)->first();
            if($old_upload)
            {
                //if (!file_exists('img/blogs/'.$old_upload->file_original_name)) unlink('img/blogs/'.$old_upload->file_original_name);
                // $old_upload->forceDelete();
                // if(Storage::disk('s3')->exists('public/'.$old_upload->file_name))
                // {
                //     Storage::disk('s3')->delete('public/'.$old_upload->file_name);
                // }
            }
            $upload = new Upload;
            $file = $request->file('meta_img');
            $name = $request->file('meta_img')->getClientOriginalName();
            $size = $request->file('meta_img')->getSize();
            $ext = $file->getClientOriginalExtension();

            // $file = Storage::disk('s3')->put('public/uploads/all', $request->file('meta_img'));
            // $path = Storage::disk('s3')->url($file);
            // $file_name = substr($path, 45, 200);

            $file->move('img/blogs/', $name);
            $upload->file_name = env('APP_URL').'/img/blogs/'.$name;

            $upload->file_original_name = $name;
            $upload->extension = $ext;
            $upload->user_id = session()->get('super_user_info')->user_id;
            // $upload->file_name = $file_name;
            $upload->type = "image";
            $upload->file_size = $size;
            $upload->save();
            $blog->meta_img = $upload->id;
        }
        

        $blog->save();

        return redirect()->route('beeda.blog.list')->with('success_message','Blog post has been updated successfully');

    }

    public function change_status(Request $request) 
    {
        $blog = BeedaBlog::find($request->id);
        if ($blog->status == 1) {
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        
        $blog->save();

        return 1;
    }

    public function deleteBlog($id)
    {
        $blog = BeedaBlog::find($id);
        $thumbnail_upload = Upload::where('id', $blog->thumbnail)->first();
        if($thumbnail_upload)
        {
            if (!file_exists('img/blogs/'.$thumbnail_upload->file_original_name)) unlink('img/blogs/'.$thumbnail_upload->file_original_name);
            // $thumbnail_upload->forceDelete();
            // if(Storage::disk('s3')->exists('public/'.$thumbnail_upload->file_name))
            // {
            //     Storage::disk('s3')->delete('public/'.$thumbnail_upload->file_name);
            // }
            $thumbnail_upload->delete();
        }
        $banner_upload = Upload::where('id', $blog->banner)->first();
        if($banner_upload)
        {
            if (!file_exists('img/blogs/'.$banner_upload->file_original_name))unlink('img/blogs/'.$banner_upload->file_original_name);
            // $banner_upload->forceDelete();
            // if(Storage::disk('s3')->exists('public/'.$banner_upload->file_name))
            // {
            //     Storage::disk('s3')->delete('public/'.$banner_upload->file_name);
            // }
            $banner_upload->delete();
        }
        $meta_upload = Upload::where('id', $blog->meta_img)->first();
        if($meta_upload)
        {
            if (!file_exists('img/blogs/'.$meta_upload->file_original_name)) unlink('img/blogs/'.$meta_upload->file_original_name);
            // $meta_upload->forceDelete();
            // if(Storage::disk('s3')->exists('public/'.$meta_upload->file_name))
            // {
            //     Storage::disk('s3')->delete('public/'.$meta_upload->file_name);
            // }
            $meta_upload->delete();
        }
        $blog->delete();
        return redirect()->back();
    }
}

