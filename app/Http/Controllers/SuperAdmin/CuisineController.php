<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Cuisine;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CuisineController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $suisines = Cuisine::get();
            $data = [];
            if ($suisines) {
                $data = $suisines;
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($data) {
                    return '<img src="'. env('AWS_MEDIA_URL') . $data->image.'" width="50" height="50" />';
                })
                ->editColumn('status', function($data){
                    if($data->status)  return '<span class="badge badge-success">Active</span>';
                    return '<span class="badge badge-danger">Inactive</span>';
                })
                ->editColumn('action', function ($data) {
                    $btn = '<a href="'.route('superadmin.cuisine.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a> ';
                    $btn .= '<a href="' .route('superadmin.cuisine.delete', ['id' => $data->id]).'"><i class="material-icons">delete</i></a>';
                    return $btn;
                })
                ->rawColumns(['status','image', 'action'])
                ->make(true);
        }
        $page = 'manage_service';
        return view('superadmin.cuisines.index',compact('page'));
    }

    public function create()
    {
        $page = 'manage_service';
        return view('superadmin.cuisines.create',compact('page'));
    }

    public function store(Request $request)
    {
        $cuisine = new Cuisine();
        $cuisine->name = $request->name;
        $cuisine->slug = $this->generateSlug($request->name);
        $cuisine->status = $request->status;
        if($request->hasFile('image')) {
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
            $path = Storage::disk('s3')->url($file);
            $file_name = env('APP_ENV')!='production' ? $path : substr($path, 45, 200);
            $cuisine->image = $file_name;
        }
        $cuisine->save();
        return redirect()->route('superadmin.cuisine.index')->with('success_message', 'Cuisine added successfully.');
    }

    public function edit($id)
    {
        $cuisine = Cuisine::find($id);
        $page = 'manage_service';
        return view('superadmin.cuisines.edit',compact('cuisine','page'));
    }

    public function update(Request $request)
    {
        $cuisine = Cuisine::find($request->id);
        $cuisine->name = $request->name;
        $cuisine->slug = ($cuisine->name != $request->name) ? $this->generateSlug($request->name) : $cuisine->slug;
        $cuisine->status = $request->status;
        if($request->hasFile('image')) {
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('image'));
            $path = Storage::disk('s3')->url($file);
            $file_name = env('APP_ENV')!='production' ? $path : substr($path, 45, 200);
            $cuisine->image = $file_name;
        }
        $cuisine->update();
        return redirect()->route('superadmin.cuisine.index')->with('success_message', 'Cuisine updated successfully.');
    }

    public function delete($id)
    {
        $Cuisine = Cuisine::find($id);
        $Cuisine->delete();
        return redirect()->route('superadmin.cuisine.index')->with('success_message', 'Cuisine deleted successfully.');
    }

    private function generateSlug($title)
    {
        $slug = Str::slug($title);
        $slugExists = Cuisine::where('slug', $slug)->count();
        while ($slugExists) {
            $slug .= rand(1, 9);
            $slugExists = Cuisine::where('slug', $slug)->count();
        }
        return $slug;
    }

    
}
