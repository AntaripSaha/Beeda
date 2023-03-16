<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Http\Traits\AddProductDataFormat;
use App\Http\Traits\EditProductDataFormat;
use Yajra\DataTables\Facades\DataTables;
use App\Product;
use App\Constants\ServiceCategoryType;
use App\Models\Shop;

class ServiceItemController extends Controller
{
    use ApiUrl;
    use AddProductDataFormat;
    use EditProductDataFormat;

    public function serviceItem($id)
    {
        return view('store_owner.service_item.service_item_list');
    }

    public function addServiceItem($id)
    {
        $token = getToken();
        if($token)
        {
            $pre_data = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'product_upload_pre_req', [
                'shop_id' => $id
            ]);

            $data = [];
            if($pre_data && isset(json_decode($pre_data)->error))  return redirect()->route('login.login');
            if($pre_data)   $data = json_decode($pre_data);
            $shop_id = $id;
            $parent = $shop_id;
            $page = 'add_product';
            $shop = Shop::find($id);
            $regions = Region::all();

            if($data->shop->seller_service->service_category_id == ServiceCategoryType::FOOD)
            {
                return view('store_owner.service_item.add_food_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::GROCERY)
            {
                return view('store_owner.service_item.add_grocery_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::GAS)
            {
                return view('store_owner.service_item.add_gas_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::BEEDA_MALL)
            {
                return view('store_owner.service_item.add_service_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::LIQUOR)
            {
                return view('store_owner.service_item.add_liquor_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::FLOWER)
            {
                return view('store_owner.service_item.add_flower_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::PHARMACY)
            {
                return view('store_owner.service_item.add_pharmacy_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::WATER)
            {
                return view('store_owner.service_item.add_water_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }
            if($data->shop->seller_service->service_category_id == ServiceCategoryType::FARMERS)
            {
                return view('store_owner.service_item.add_farmer_item', compact('data', 'shop_id', 'page', 'parent', 'shop', 'regions'));
            }

        }
        else
        {
            return redirect()->route('login.login');
        }

    }

    public function addServiceItemSubmit(Request $request)
    {
        try{
            $token = getToken();
            if($request->service_category_id == ServiceCategoryType::FOOD) $item_add = $this->addFoodProduct($request);
            if($request->service_category_id == ServiceCategoryType::GROCERY) $item_add = $this->addGroceryProduct($request);
            if($request->service_category_id == ServiceCategoryType::BEEDA_MALL) $item_add = $this->addBeedamallProduct($request);
            if($request->service_category_id == ServiceCategoryType::GAS)  $item_add = $this->addGasProduct($request);
            if($request->service_category_id == ServiceCategoryType::LIQUOR) $item_add = $this->addLiquorProduct($request);
            if($request->service_category_id == ServiceCategoryType::FLOWER) $item_add = $this->addFlowerProduct($request);
            if($request->service_category_id == ServiceCategoryType::PHARMACY)  $item_add = $this->addPharmacyProduct($request);
            if($request->service_category_id == ServiceCategoryType::WATER)  $item_add = $this->addWaterProduct($request);
            if($request->service_category_id == ServiceCategoryType::FARMERS)  $item_add = $this->addFarmerProduct($request);
            if($token)
            {
                if($item_add && isset(json_decode($item_add)->error))  return redirect()->route('login.login');
                $item_add = json_decode($item_add);
                if($item_add && $item_add->success)  return redirect()->route('service.item.list', ['id' => $request->service_category_id])->with('success_message', 'Product uploaded successfully');
                return redirect()->back()->with('error_message', $item_add->message);

            }
            return redirect()->route('login.login');
        }
        catch(\Exception $e)
        {
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function serviceItemList($service_category_id, Request $request)
    {
        $products = Product::orderBy('id', 'desc')->with(['category', 'brand', 'stocks', 'thumbnail_image', 'shop'])
                    ->where('user_id', session()->get('user_info')->user_id)
                    ->where('service_category_id', $service_category_id)->get();

       if($request->ajax())
       {
            $data = $products;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('category', function($data){
                    return $data->category?$data->category->name:'';
                })
                ->editColumn('current_qty', function($data){
                    $variants = '';
                    if($data->variant_product)
                    {
                        foreach($data->stocks as $stock)
                        {
                            $variants .= '<small>'.$stock->variant.': '.$stock->qty.'</small><br>';
                        }
                        return $variants;
                    }
                    else
                    {
                        return count($data->stocks) > 0 ? $data->stocks[0]->qty : 0;
                    }

                })
                ->editColumn('published', function($data){
                    $active = '';
                    $checked = '';
                    if($data->published)
                    {
                        $active = 'active';
                        $checked = 'checked';
                    }
                    $switch = '<div class="toggle-btn '.$active.'">
                                    <input type="checkbox" onclick="publish('.$data->id.','.$data->service_category_id.')" class="cb-value publish'.$data->id.'" '.$checked.'/>
                                    <span class="round-btn"></span>
                                </div>';
                    return $switch;
                })
                ->editColumn('image', function($data){
                    $image = '';
                    if($data->thumbnail_image)
                    {
                        $image .= '<img src="'.assetUrl().$data->thumbnail_image->file_name.'" style="width:70px;height:50px;"/>';
                    }
                    else
                    {
                        return $image .= '---';
                    }
                    return $image;
                })
                ->addColumn('options', function($data){
                    $actionBtn = '<a href="'.route('service.item.edit', ['id'=>$data->id]).'" class="edit btn btn-info btn-xs"><i class="fas fa-edit"></i></a>';
                    return $actionBtn;
                })
                ->rawColumns(['current_qty','category','published','image','options'])
                ->make(true);

       }
       $parent = $service_category_id;
       $page = 'product_list';
       return view('store_owner.service_item.service_item_list', compact('service_category_id', 'page', 'parent'));
    }

    public function publishProduct(Request $request)
    {
        $token = getToken();
        $publish_product = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'seller_products/publish', [
            'id' => $request->product_id,
            'service_category_id' => $request->service_category_id
        ]);
        $publish_product = json_decode($publish_product);
        return response()->json(['status'=>true, 'data'=> $publish_product]);
    }

    public function featureProduct(Request $request)
    {
        $token = getToken();
        $feature_product = Http::withHeaders([
            'Authorization' => 'Bearer '.$token
        ])->post($this->getApiUrl().'seller_products/feature', [
            'id' => $request->product_id
        ]);
        $feature_product = json_decode($feature_product);
        return response()->json(['status'=>true, 'data'=> $feature_product]);
    }

    public function editServiceItem($id)
    {
        try {
            $token = getToken();
            $product_response = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller_products_by_id/'.$id);
            if ($product_response->status() != 200)
            {
                $parent = 'seller';
                $page = 'error';
                $status_code = $product_response->status();
                $response =  json_encode($product_response);
                return view('store_owner.error.error', compact('response', 'status_code', 'page', 'parent'));
            }
            if($product_response && isset(json_decode($product_response)->error))  return redirect()->route('login.login');
            $product = json_decode($product_response)->data;

            $gallery_images = json_decode($product_response)->gallery_images;
            $thumbnail_image = json_decode($product_response)->thumbnail_image;
            $meta_image = json_decode($product_response)->meta_image;
            $pdf = json_decode($product_response)->pdf;
            $delivery_charges = json_decode($product_response)->delivery_charges;
            $pre_data = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'product_upload_pre_req', [
                'shop_id' => $product->shop_id
            ]);
            if($pre_data && isset(json_decode($pre_data)->error))  return redirect()->route('login.login');
            $shop_id = $product->shop_id;
            $data = json_decode($pre_data);
            $attribute_array = [];
            foreach($data->attributes as $attribute)
            {
                $attribute_array[$attribute->id] = $attribute->name;
            }
            $parent = 'seller';
            $page = 'product_list';
            $id = $product->shop_id;
            $shop = Shop::find($id);
            $regions = Region::all();
//            dd($regions[0]->id);

            if($product->service_category_id == ServiceCategoryType::FOOD)
                return view('store_owner.service_item.edit_food_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::GROCERY)
                return view('store_owner.service_item.edit_grocery_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::BEEDA_MALL)
                return view('store_owner.service_item.edit_service_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::GAS)
                return view('store_owner.service_item.edit_gas_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::LIQUOR)
                return view('store_owner.service_item.edit_liquor_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::FLOWER)
                return view('store_owner.service_item.edit_flower_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::PHARMACY)
                return view('store_owner.service_item.edit_pharmacy_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::WATER)
                return view('store_owner.service_item.edit_water_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
            if($product->service_category_id == ServiceCategoryType::FARMERS)
                return view('store_owner.service_item.edit_farmer_item', compact('data', 'regions', 'shop_id', 'product', 'gallery_images', 'thumbnail_image', 'meta_image', 'pdf', 'delivery_charges', 'attribute_array', 'page', 'parent', 'shop'));
        } catch (\Throwable $e) {
            $parent = 'seller';
            $page = 'error';
            $status_code = 404;
            $response =  'Empty response';
            return view('store_owner.error.error', compact('response', 'status_code', 'page', 'parent'));
        }
    }

    public function updateServiceItem(Request $request)
    {

        $token = getToken();
        if($request->service_category_id == ServiceCategoryType::FOOD) $item_update = $this->editFoodProduct($request);
        if($request->service_category_id == ServiceCategoryType::GROCERY) $item_update = $this->editGroceryProduct($request);
        if($request->service_category_id == ServiceCategoryType::BEEDA_MALL) $item_update = $this->editBeedamallProduct($request);
        if($request->service_category_id == ServiceCategoryType::GAS) $item_update = $this->editGasProduct($request);
        if($request->service_category_id == ServiceCategoryType::LIQUOR) $item_update = $this->editLiquorProduct($request);
        if($request->service_category_id == ServiceCategoryType::FLOWER) $item_update = $this->editFlowerProduct($request);
        if($request->service_category_id == ServiceCategoryType::PHARMACY) $item_update = $this->editPharmacyProduct($request);
        if($request->service_category_id == ServiceCategoryType::WATER) $item_update = $this->editWaterProduct($request);
        if($request->service_category_id == ServiceCategoryType::FARMERS) $item_update = $this->editFarmerProduct($request);
        if($token)
        {
            if($item_update && isset(json_decode($item_update)->error))  return redirect()->route('login.login');
            $item_update = json_decode($item_update);
            if($item_update && $item_update->status)
            {
                return redirect()->route('service.item.list', ['id' => $request->service_category_id])->with('success_message', 'Product updated successfully');
            }
            else
            {
                return redirect()->route('service.item.list', ['id' => $request->service_category_id])->with('error_message', 'Something went wrong!');
            }


        }
        else
        {
            return redirect()->route('login.login');
        }
    }

    public function getPossibleAttributeCombination(Request $request)
    {

        $data = $request->attr_array;

        $combos=$this->possible_combos($data);

        //calculate all the possible comobos creatable from a given choices array


        return response()->json(['status'=> true, 'data'=>$combos]);
    }

    public function possible_combos($groups, $prefix='') {

        $result = array();
        $group = array_shift($groups);
        foreach($group as $selected) {
            if($groups) {
                $result = array_merge($result, $this->possible_combos($groups, $prefix . str_replace('-', '~', $selected). '-'));
            } else {
                $result[] = $prefix . str_replace('-', '~', $selected);
            }
        }
        return $result;
    }

    public function getServiceCategoryPreData(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $service_category_pre = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'product_upload_pre_req',[
                'shop_id' => $request->shop_id
            ]);
            if($service_category_pre && isset(json_decode($service_category_pre)->error))  return redirect()->route('login.login');
            $service_category_pre_data = [];

            if($service_category_pre)
            {
                $service_category_pre_data = json_decode($service_category_pre);
            }
            return response()->json([
                'status' => true,
                'data' => $service_category_pre_data
            ]);
        }
    }
}
