<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Blog;
use App\Upload;
use App\Constants\ServiceCategoryType;
use Illuminate\Support\Facades\Storage;
use DataTables;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Blog::with(['category'])->get();

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
                $btn = '<form action="' . route('blog.destroy', [$data->id]) . '" method="post" id="delete-form' . $data->id . '"><input type="hidden" name="_token" value="' . csrf_token() . '" /><input type="hidden" value="' . $data->id . '" name="id" /></form>';
                $btn .= '<a href="' . route('blog.edit', [$data->id]) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteBlog(' . $data->id . ')"><i class="material-icons">delete</i></a>';
                return $btn;
            })
            ->rawColumns(['category', 'status', 'action'])
            ->make(true);
        }
        
        $page = 'manage_blog';

        return view('superadmin.sellers.manage_blog.blog_list', compact('page'));
    }

    public function create()
    {
        $categories = Category::where('service_category_id', ServiceCategoryType::BEEDA_MALL)->select('id', 'name')->get();

        $page = 'manage_blog';
        return view('superadmin.sellers.manage_blog.add_blog', compact('categories', 'page'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'device_type' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
        ]);

        $blog = new Blog;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->device_type = $request->device_type;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        if ($request->file('banner')) {
            $upload = new Upload;
            $file = $request->file('banner');
            $name = $request->file('banner')->getClientOriginalName();
            $size = $request->file('banner')->getSize();
            $ext = $file->getClientOriginalExtension();
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('banner'));
            $path = Storage::disk('s3')->url($file);
            $file_name = substr($path, 45, 200);

            $upload->file_original_name = $name;

            $upload->extension = $ext;

            $upload->file_name = $file_name;

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
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('meta_img'));
            $path = Storage::disk('s3')->url($file);
            $file_name = substr($path, 45, 200);

            $upload->file_original_name = $name;

            $upload->extension = $ext;

            $upload->file_name = $file_name;

            $upload->type = "image";

            $upload->file_size = $size;

            $upload->save();

            $blog->meta_img = $upload->id;
        }

        // if ($request->file('banner')) {
        //     $blog = $blog->attach('banner', file_get_contents($request->file('banner')), $request->file('banner')->getClientOriginalName());
        // }

        // if ($request->file('meta_img')) {
        //     $blog = $blog->attach('meta_img', file_get_contents($request->file('meta_img')), $request->file('meta_img')->getClientOriginalName());
        // }

        $blog->save();

        return redirect()->route('blog.index')->with('success_message','Blog post has been created successfully');

    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = Category::where('service_category_id', ServiceCategoryType::BEEDA_MALL)->select('id', 'name')->get();
        $page = 'manage_blog';
        return view('superadmin.sellers.manage_blog.edit_blog', compact('blog', 'categories', 'page'));
    }

    public function update(Request $request, $id)
    {        
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required',
        ]);

        $blog = Blog::find($id);
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->device_type = $request->device_type;
        $blog->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->meta_keywords = $request->meta_keywords;

        if ($request->file('banner')) {
            $old_upload = Upload::where('id', $blog->banner)->first();
            if($old_upload)
            {
                $old_upload->forceDelete();
                if(Storage::disk('s3')->exists('public/'.$old_upload->file_name))
                {
                    Storage::disk('s3')->delete('public/'.$old_upload->file_name);
                }
            }
            $upload = new Upload;
            $file = $request->file('banner');
            $name = $request->file('banner')->getClientOriginalName();
            $size = $request->file('banner')->getSize();
            $ext = $file->getClientOriginalExtension();
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('banner'));
            $path = Storage::disk('s3')->url($file);
            $file_name = substr($path, 45, 200);

            $upload->file_original_name = $name;

            $upload->extension = $ext;

            $upload->file_name = $file_name;

            $upload->type = "image";

            $upload->file_size = $size;

            $upload->save();

            $blog->banner = $upload->id;
        }

        if ($request->file('meta_img')) {
            $old_upload = Upload::where('id', $blog->meta_image)->first();
            if($old_upload)
            {
                $old_upload->forceDelete();
                if(Storage::disk('s3')->exists('public/'.$old_upload->file_name))
                {
                    Storage::disk('s3')->delete('public/'.$old_upload->file_name);
                }
            }
            $upload = new Upload;
            $file = $request->file('meta_img');
            $name = $request->file('meta_img')->getClientOriginalName();
            $size = $request->file('meta_img')->getSize();
            $ext = $file->getClientOriginalExtension();
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('meta_img'));
            $path = Storage::disk('s3')->url($file);
            $file_name = substr($path, 45, 200);

            $upload->file_original_name = $name;

            $upload->extension = $ext;

            $upload->file_name = $file_name;

            $upload->type = "image";

            $upload->file_size = $size;

            $upload->save();

            $blog->meta_img = $upload->id;
        }
        
        // if ($request->file('banner')) {
        //     $blog = $blog->attach('banner', file_get_contents($request->file('banner')), $request->file('banner')->getClientOriginalName());
        // }

        // if ($request->file('meta_img')) {
        //     $blog = $blog->attach('meta_img', file_get_contents($request->file('meta_img')), $request->file('meta_img')->getClientOriginalName());
        // }

        $blog->save();

        return redirect()->route('blog.index')->with('success_message','Blog post has been updated successfully');

    }

    public function change_status(Request $request) 
    {
        $blog = Blog::find($request->id);
        if ($blog->status == 1) {
            $blog->status = 0;
        } else {
            $blog->status = 1;
        }
        
        $blog->save();

        return 1;
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $banner_upload = Upload::where('id', $blog->banner)->first();
        if($banner_upload)
        {
            $banner_upload->forceDelete();
            if(Storage::disk('s3')->exists('public/'.$banner_upload->file_name))
            {
                Storage::disk('s3')->delete('public/'.$banner_upload->file_name);
            }
        }
        $meta_upload = Upload::where('id', $blog->meta_img)->first();
        if($meta_upload)
        {
            $meta_upload->forceDelete();
            if(Storage::disk('s3')->exists('public/'.$meta_upload->file_name))
            {
                Storage::disk('s3')->delete('public/'.$meta_upload->file_name);
            }
        }
        $blog->delete();
        return redirect()->back();
    }
}

