<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Product;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        try{
            if ($request->ajax()) {
                $data = Product::with(['shop', 'thumbnail_image', 'category', 'service_category'])->get();
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('product_image', function ($data) {
                        if ($data->thumbnail_image) {
                            if (env('AWS_ON')) {
                                return '<img src="' . env('AWS_MEDIA_URL') . $data->thumbnail_image->file_name . '" style="width:50px;height:50px;"/>';
                            }
                            return '<img src="https://beedamall.com/public/' . $data->thumbnail_image->file_name . '" style="width:60px;"/>';
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('name', function ($data) {
                            return '<a href="'.route('product.details', $data->slug) .'" >'.$data->name.'</a>';
                    })
                    ->editColumn('shop_name', function ($data) {
                        return $data->shop->name;
                })
                    ->editColumn('category', function ($data) {
                        if ($data->category) {
                            return $data->category->name;
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('service_category', function ($data) {
                        if ($data->service_category_id) {
                            return $data->service_category->name;
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('published', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->published) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="publish(' . $data->id . ')" class="cb-value publish' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('tabed', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->tabed) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="tab(' . $data->id . ')" class="cb-value tab' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('featured', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->featured) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="feature(' . $data->id . ')" class="cb-value feature' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('todays_deal', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->todays_deal) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="todaysDeal(' . $data->id . ')" class="cb-value todaysDeal' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->rawColumns(['product_image', 'name', 'shop_name', 'category','service_category_id', 'published', 'tabed', 'featured', 'todays_deal'])
                    ->make(true);
            }
            $page = 'manage_product';
            return view('superadmin.sellers.manage_product.product_list', compact('page'));
        }
        catch(Exception $e){
            return redirect()->back()->with('success_message', $e->getMessage());
        }
    }
    public function show($slug)
    {
        try{
            $detailedProduct  = Product::with(['user'])->where('slug', $slug)->first();
            $page = 'manage_product';
            return view('superadmin.sellers.manage_product.product_details', compact('page', 'detailedProduct'));
        }
        catch(Exception $e){
            return redirect()->back()->with('success_message', $e->getMessage());
        }

        

    }
}
