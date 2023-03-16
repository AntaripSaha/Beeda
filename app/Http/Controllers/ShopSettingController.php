<?php

namespace App\Http\Controllers;

use App\Cuisine;
use App\FoodAddon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Models\Shop;
use App\Constants\ServiceCategoryType;
use App\SellerService;
use App\Shop as AppShop;
use Yajra\DataTables\Facades\DataTables;

class ShopSettingController extends Controller
{
    use ApiUrl;

    public function shopSetting(Request $request)
    {
        $token = getToken();
        if ($token) {
            $id = session()->get('user_info')->user_id;
            $seller_services = SellerService::with(['service_category', 'shop'=>function($query){
                $query->with(['logo_img', 'banner_img']);
            }, 'seller'])->where('seller_id', $id)->whereIn('service_category_id', [
                ServiceCategoryType::FOOD,
                ServiceCategoryType::BEEDA_MALL,
                ServiceCategoryType::GROCERY,
                ServiceCategoryType::EXPRESS,
                ServiceCategoryType::PHARMACY,
                ServiceCategoryType::LIQUOR,
                ServiceCategoryType::WATER,
                ServiceCategoryType::GAS,
                ServiceCategoryType::CAR_SALES,
                ServiceCategoryType::REAL_ESTATE,
                ServiceCategoryType::FLOWER,
                ServiceCategoryType::FARMERS
                ])->get();

            $parent = 'seller';
            $page = 'shop_setting';
            return view('store_owner.shop_setting.shop_setting', compact('seller_services', 'page', 'parent'));
        } else {
            return redirect()->route('login.login');
        }
    }

    public function editShop($id)
    {
        $token = getToken();
        if ($token) {
            $shop = Shop::with(['logo_img','banner_img', 'banner_img_mobile', 'shop_timing','seller_documents'=>function($query){
                $query->with('doc_file');
            }, 'seller_service'])->where('id', $id)->first();

            $shop_id = $id;
            $store_open_timings = [];
            $store_close_timings = [];
            $days = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
            if (count($shop->shop_timing) == 7) {
                $store_open_timings['all'] = $shop->shop_timing[0]->shop_open_time;
                $store_close_timings['all'] = $shop->shop_timing[0]->shop_close_time;
            } else {
                foreach ($shop->shop_timing as $time) {
                    $store_open_timings[$time->day] = $time->shop_open_time;
                    $store_close_timings[$time->day] = $time->shop_close_time;
                }
            }
            $parent = 'seller';
            $page = 'shop_setting';
            return view('store_owner.shop_setting.edit_shop', compact('shop_id', 'shop', 'store_open_timings', 'store_close_timings', 'parent', 'page'));
        } else {
            return redirect()->route('login.login');
        }
    }
    public function updateShop(Request $request)
    {
        $validate = $request->validate([
            'day' => 'required',
        ]);
        $token = getToken();
        if ($token) {
            $store_details = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
            ]);

            if ($request->service_document_files) {
                if (count($request->service_document_files) > 0) {
                    foreach ($request->service_document_files as $key => $value) {
                        $store_details = $store_details->attach('service_document_files[' . $key . ']', file_get_contents($value), $value->getClientOriginalName());
                    }
                }
            }
            if (in_array('all', $request->day)) {
                $request->day = ["all", "SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
            }

            if (isset($request->pickup_status) && $request->pickup_status == 'on') {
                $pickup_status = 1;
            } else {
                $pickup_status = 0;
            }

            $test_file = public_path() . '/' . 'test.png';
            $test_file = str_replace("/public","", $test_file);
            $store_details->attach('test_img', file_get_contents($test_file), 'test.png');
            $store_details = $store_details->post($this->getApiUrl() . 'shop/update/' . $request->shop_id, [
                ['name' => 'user_id', 'contents' => $request->user_id],
                ['name' => 'seller_service_id', 'contents' => $request->seller_service_id],
                ['name' => 'store_name', 'contents' => $request->store_name],
                ['name' => 'delivery_radius', 'contents' => $request->delivery_radius],
                ['name' => 'radius_unit', 'contents' => $request->radius_unit],
                ['name' => 'delivery_time', 'contents' => $request->delivery_time],
                ['name' => 'time_unit', 'contents' => $request->time_unit],
                ['name' => 'pickup_status', 'contents' => $pickup_status],
                ['name' => 'pickup_time_start', 'contents' => $request->pickup_time_start],
                ['name' => 'pickup_time_end', 'contents' => $request->pickup_time_end],
                ['name' => 'order_min_amount', 'contents' => $request->order_min_amount],
                ['name' => 'packaging_charge', 'contents' => $request->packaging_charge],
                ['name' => 'short_description', 'contents' => $request->short_description],
                ['name' => 'day', 'contents' => json_encode($request->day)],
                ['name' => 'open_time', 'contents' => json_encode($request->open_time)],
                ['name' => 'close_time', 'contents' => json_encode($request->close_time)],
                ['name' => 'document_ids', 'contents' => json_encode($request->document_ids)],
                ['name' => 'address_lat', 'contents' => $request->address_lat],
                ['name' => 'address_long', 'contents' => $request->address_long],
                ['name' => 'store_address', 'contents' => $request->store_address],
                ['name' => 'meta_title', 'contents' => $request->meta_title],
                ['name' => 'meta_description', 'contents' => $request->meta_description],
                ['name' => 'facebook', 'contents' => $request->facebook],
                ['name' => 'twitter', 'contents' => $request->twitter],
                ['name' => 'google', 'contents' => $request->google],
                ['name' => 'youtube', 'contents' => $request->youtube],
                ['name' => 'crop_logo', 'contents' => $request->crop_logo],
                ['name' => 'crop_desktop_logo', 'contents' => $request->crop_desktop_logo],
                ['name' => 'crop_mobile_logo', 'contents' => $request->crop_mobile_logo],
                ['name' => 'request_agent', 'contents' => 'web']
            ]);

            if($store_details && isset(json_decode($store_details)->error))  return redirect()->route('login.login');
            if (json_decode($store_details)->result && json_decode($store_details)->result == true) {
                return redirect()->back()->with('success_message', 'Shop updated successfully');
            } else {
                return redirect()->back()->with('error_message', json_decode($store_details)->message);
            }
        } else {
            return redirect()->route('login.login');
        }
    }

    public function cuisines($shopId, Request $request)
    {
        $cuisines = Cuisine::where('status', 1)->get();
        $existingCuisines = Shop::where('id', $shopId)->first()->cuisines()->pluck('cuisine_id')->toArray();

        $parent = $shopId;
        $page = 'cuisine';
        return view('store_owner.shop_setting.cuisines', compact('page', 'shopId', 'parent','cuisines','existingCuisines'));
    }

    public function storeCuisine(Request $request)
    {
        $shop = Shop::where('id', $request->shop_id)->first();
        $shop->cuisines()->sync($request->cuisine);
        if ($shop) return redirect()->back()->with('success_message', 'Changes Saved successfully');
        return redirect()->back()->with('success_message', 'Something went wrong!');
    }

    public function deleteCuisine(Request $request)
    {
        $token = getToken();
        $cuisine = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post($this->getApiUrl() . 'cuisines/delete', ['id' => $request->id]);
        if($cuisine && isset(json_decode($cuisine)->error))  return redirect()->route('login.login');
        $cuisine = json_decode($cuisine);
        if ($cuisine) return redirect()->back()->with('success_message', 'Cuisine deleted successfully');
        return redirect()->back()->with('success_message', 'Something went wrong!');
    }

    public function addons($shopId, Request $request)
    {
        if(request()->ajax()) {
            return Datatables::of($data = FoodAddon::where('shop_id', $shopId)->get())
            ->addIndexColumn()
            ->addColumn('action', function ($data) {
                $edit = '<button onclick="editAddon(' . $data->id . ',`' . $data->name . '`,`' . $data->price . '`)" class="btn btn-info">Edit</button> ';
                $delete = ' <button onclick="deleteAddon(' . $data->id . ')" class="btn btn-danger">Delete</button>';
                return $edit . $delete;
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        $parent = $shopId;
        $page = 'add_ons';
        return view('store_owner.shop_setting.addons', compact('page', 'shopId', 'parent'));
        /*
        if ($request->ajax()) {
            $token = getToken();
            if ($token) {
                $addons = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->post($this->getApiUrl() . 'addons/list', ['shop_id' => $request->id]);
                if($addons && isset(json_decode($addons)->error))  return redirect()->route('login.login');
                $addons = json_decode($addons);
                $data = [];
                if ($addons) {
                    $data = $addons;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($data) {
                        $edit = '<button onclick="editAddon(' . $data->id . ',`' . $data->name . '`,`' . $data->price . '`)" class="btn btn-info">Edit</button> ';
                        $delete = ' <button onclick="deleteAddon(' . $data->id . ')" class="btn btn-danger">Delete</button>';
                        return $edit . $delete;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }

        $parent = $shopId;
        $page = 'add_ons';
        return view('store_owner.shop_setting.addons', compact('page', 'shopId', 'parent'));
        */
    }

    public function storeAddon(Request $request)
    {
        /*
        $token = getToken();
        $addon = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post($this->getApiUrl() . 'addons/add', ['shop_id' => $request->shop_id, 'name' => $request->name, 'id' => $request->id, 'price' => $request->price]);
        */

        if($request->id!=0) $addon = FoodAddon::find($request->id);
        else $addon = new FoodAddon();
        $addon->name = $request->name;
        $addon->price = $request->price;
        $addon->shop_id = $request->shop_id;
        $addon->save();

        if($addon && isset(json_decode($addon)->error))  return redirect()->route('login.login');
        $addon = json_decode($addon);
        if ($addon) return redirect()->back()->with('success_message', 'Addon added successfully');
        return redirect()->back()->with('success_message', 'Something went wrong!');
    }

    public function deleteAddon(Request $request)
    {

        $addon = FoodAddon::find($request->id);
        $addon->products()->detach();
        $cuisine = $addon->delete();

        if($cuisine && isset(json_decode($cuisine)->error))  return redirect()->route('login.login');
        $cuisine = json_decode($cuisine);
        if ($cuisine) return redirect()->back()->with('success_message', 'Addon deleted successfully');
        return redirect()->back()->with('success_message', 'Something went wrong!');
    }
}
