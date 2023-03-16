<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\ServiceCategory;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Brand;
use DB;

class BrandController extends Controller
{
    use ApiUrl;

    public function brandList(Request $request)
    {
        $token = getToken();
        if ($token) {
            // $brands = Http::withHeaders([
            //     'Authorization' => 'Bearer ' . $token
            // ])->get($this->getApiUrl() . 'superadmin/brandlist');

            $data = Brand::with('logo')->get();
            $data = json_decode($data);
            if ($request->ajax()) {

                return Datatables::of($data)
                    ->editColumn('logo', function ($data) {
                        if ($data->logo) {
                            if (env('AWS_ON')) {
                                return '<img src="' . env('AWS_MEDIA_URL') . $data->logo->file_name . '" style="width:50px;height:50px;"/>';
                            }
                            return '<img src="https://beedamall.com/public/' . $data->logo->file_name . '" style="width:50px;height:50px;"/>';
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<form action="' . route('brand.delete') . '" method="post" id="delete-form' . $data->id . '"><input type="hidden" name="_token" value="' . csrf_token() . '" /><input type="hidden" value="' . $data->id . '" name="id" /></form>';
                        $btn .= '<a href="' . route('brand.edit', ['id' => $data->id]) . '" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteBrand(' . $data->id . ')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['logo', 'action'])
                    ->make(true);

        }
        $page = 'manage_brand';
        return view('superadmin.sellers.manage_brand.brand_list', compact('page'));

        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addBrand()
    {
        $token = getToken();
        if ($token) {
            $service_categories = ServiceCategory::where('status',1)->get();
            $service_category_list = [];
            if ($service_categories) {
                $service_category_list = $service_categories;
            }
            $page = 'manage_brand';
            return view('superadmin.sellers.manage_brand.add_brand', compact('service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addBrandSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'service_category' => 'required',
            'logo' => 'required'
        ]);
        try {
            $token = getToken();
            if ($token) {
                DB::beginTransaction();
                $brand = Brand::create([
                    'service_category_id' => $request->service_category,
                    'name' => $request->name,
                    'logo' => uploadImage($request->logo),
                    'top' => 0,
                    'slug' => preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5),
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description,
                ]);
                if ($brand) {
                    DB::commit();
                    return redirect()->route('brand.list')->with('success_message', $brand->message);
                } else {
                    DB::rollback();
                    return redirect()->back()->with('error_message', 'Something went wrong');
                }
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function deleteBrand(Request $request)
    {
        $token = getToken();
        if ($token) {
            $deleted_at = false;
            $brand = Brand::where('id', $request->id)->first();
            $brand->delete();
            $deleted_at = true;

            if ($deleted_at) {
                return redirect()->route('brand.list')->with('success_message', 'Brand deleted successfully');
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editBrand($id)
    {
        $token = getToken();
        if ($token) {
            $brand = Brand::with('logo_image')->find($id);
            $service_categories = ServiceCategory::where('status',1)->get();
            $service_category_list = [];
            if ($service_categories) {
                $service_category_list = $service_categories;
            }
            $page = 'manage_brand';
            return view('superadmin.sellers.manage_brand.edit_brand', compact('brand', 'service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editBrandSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'service_category' => 'required'
        ]);
        try{
            $token = getToken();
            DB::beginTransaction();
            if ($token) {
                $brand = Brand::find($request->id);
                $update = $brand->update([
                    'service_category_id' => $request->service_category,
                    'name' => $request->name,
                    'logo' => $request->file('logo_img') ? updateImage($brand->logo, $request->logo_img) : $brand->logo,
                    'meta_title' => $request->meta_title,
                    'meta_description' => $request->meta_description
                ]);
                if ($update) {
                    DB::commit();
                    return redirect()->route('brand.list')->with('success_message', $brand->message);
                } else {
                    DB::rollback();
                    return redirect()->back()->with('error_message', 'Something went wrong');
                }
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }
}
