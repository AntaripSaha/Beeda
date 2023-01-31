<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Constants\ServiceCategoryType;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\WorldsBrand;
use App\SellerService;
use DataTables;
use Illuminate\Support\Facades\Storage;

class WorldsBrandsController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $worldsBrands = WorldsBrand::get();
                $data = [];
                if ($worldsBrands) {
                    $data = $worldsBrands;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('logo', function ($data) {
                        return '<img src="'. env('AWS_MEDIA_URL') . $data->logo.'" width="50" height="50" />';
                    })
                    ->editColumn('status', function($data){
                        if($data->status)  return '<span class="badge badge-success">Active</span>';
                        return '<span class="badge badge-danger">Inactive</span>';
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<a href="'.route('worlds-brands.shops', ['id' => $data->id]).'" style="color:#061880;" title="Shops"><i class="material-icons">add</i></a> | ';
                        $btn .= '<a href="'.route('worlds-brands.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a> | ';
                        $btn .= '<a href="' .route('worlds-brands.delete', ['id' => $data->id]).'"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['status','logo', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_service';
        return view('superadmin.worlds-brands.index',compact('page'));
    }

    public function create()
    {
        $page = 'manage_service';
        return view('superadmin.worlds-brands.create',compact('page'));
    }

    public function store(Request $request)
    {
        $worldsBrand = new WorldsBrand();
        $worldsBrand->name = $request->name;
        $worldsBrand->status = $request->status;
        if($request->hasFile('logo')) {
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('logo'));
            $path = Storage::disk('s3')->url($file);
            $file_name = env('APP_ENV')!='production' ? $path : substr($path, 45, 200);
            $worldsBrand->logo = $file_name;
        }
        $worldsBrand->save();
        return redirect()->route('worlds-brands.index')->with('success_message', 'Worlds Brand added successfully.');
    }

    public function edit($id)
    {
        $worldsBrand = WorldsBrand::find($id);
        $page = 'manage_service';
        return view('superadmin.worlds-brands.edit',compact('worldsBrand','page'));
    }

    public function update(Request $request)
    {
        $worldsBrand = WorldsBrand::find($request->id);
        $worldsBrand->name = $request->name;
        $worldsBrand->status = $request->status;
        if($request->hasFile('logo')) {
            $file = Storage::disk('s3')->put('public/uploads/all', $request->file('logo'));
            $path = Storage::disk('s3')->url($file);
            $file_name = env('APP_ENV')!='production' ? $path : substr($path, 45, 200);
            $worldsBrand->logo = $file_name;
        }
        $worldsBrand->update();
        return redirect()->route('worlds-brands.index')->with('success_message', 'Worlds Brand updated successfully.');
    }

    public function delete($id)
    {
        $worldsBrand = WorldsBrand::find($id);
        $worldsBrand->delete();
        return redirect()->route('worlds-brands.index')->with('success_message', 'Worlds Brand deleted successfully.');
    }

    public function shops($id)
    {
        $worldsBrand = WorldsBrand::with('shops')->find($id);
        $existingShops = $worldsBrand->shops->pluck('id');
        $service_category_ids = SellerService::where('service_category_id', ServiceCategoryType::FOOD)->pluck('id');
        $shops = Shop::whereIn('seller_service_id', $service_category_ids)->get();
        $page = 'manage_service';
        return view('superadmin.worlds-brands.shops',compact('worldsBrand','shops','existingShops','page'));
    }

    public function shopsSubmit($id, Request $request)
    {
        $worldsBrand = WorldsBrand::find($id);
        $worldsBrand->shops()->sync($request->shops);
        return redirect()->route('worlds-brands.index')->with('success_message', 'Worlds Brand updated successfully.');
    }
}