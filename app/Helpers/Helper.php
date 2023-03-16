<?php

use App\Constants\ServiceCategoryType;
use App\Currency;
use App\Models\BusinessSetting;
use App\Product;
use App\SellerService;
use App\Upload;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

function getSellerServices()
{   
    $token = getToken();
    if($token)
    {  
        $services = SellerService::with(['service_category', 'shop'=>function($query){
            $query->with(['logo_img', 'banner_img']);
        }, 'seller'])->where('seller_id', session()->get('user_info')->user_id)->whereIn('service_category_id', [
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
            ServiceCategoryType::FARMERS,
            ])->get();
        return $services;    
    }
}

function filterVariantName($name)
{
    $name = str_replace('_', ' ', $name);
    $name = str_replace('~', '-', $name);
    return $name;
}

function getProviderServices()
{   
    $token = getToken();
    if($token)
    {  
        $provider_services = SellerService::with(['service_category', 'shop'=>function($query){
            $query->with(['logo_img', 'banner_img']);
        }, 'seller'])->where('seller_id', session()->get('user_info')->user_id)->whereIn('service_category_id', [
            ServiceCategoryType::TASKER,
            ServiceCategoryType::BEAUTY,
            ServiceCategoryType::NFT,
            ServiceCategoryType::SPA,
            ServiceCategoryType::FARMERS,
            ServiceCategoryType::DOG_WALKER,
            ServiceCategoryType::DIGITAL_CARDS,
            ServiceCategoryType::BUSINESS_CARD
            ])->get();
        return $provider_services;
    }
}

function getApiUrlFromHelper()
{
    return env('APP_ENV')=='local' ? 'http://beeda_backend.local/api/v1/' :   env('API_URL') . 'v1/';
}
if (! function_exists('currency_symbol')) {
    function currency_symbol()
    {
        $code = \App\Currency::findOrFail(get_setting('system_default_currency'))->code;
        if(Session::has('currency_code')){
            $currency = Currency::where('code', Session::get('currency_code', $code))->first();
        }
        else{
            $currency = Currency::where('code', $code)->first();
        }
        return $currency->symbol;
    }
}
if (! function_exists('uploadImage')) {
    function uploadImage($image)
    {
        // return $image->getClientOriginalExtension();
        try{
            if($image){
                $upload = new Upload();
                $extension = strtolower($image->getClientOriginalExtension());

                // if(isset($type[$extension])){
                    $upload->file_original_name = null;
                    $arr = explode('.', $image->getClientOriginalName());
                    for($i=0; $i < count($arr)-1; $i++){
                        if($i == 0){
                            $upload->file_original_name .= $arr[$i];
                        }
                        else{
                            $upload->file_original_name .= ".".$arr[$i];
                        }
                    }
                    if (env('AWS_ON')) {

                        if(env('APP_ENV')=='production')
                        {
                            //Magic..
                            $tempImgName = rand(10,100) . '.' . $extension;
                            //another magic
                            if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                                $imagePath = $image;
                                switch ($extension) {
                                    case "png":
                                        $im = imagecreatefrompng($imagePath);
                                        $newImagePath = str_replace("png", "webp", $imagePath);
                                        $quality = 50;

                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpeg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpeg", "webp", $imagePath);
                                        $quality = 50;

                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpg", "webp", $imagePath);
                                        $quality = 50;

                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    default:
                                        break;
                                }
                            }

                            $publicPath = public_path('/uploads/all/') . $tempImgName;
                            $publicPath = str_replace('/public', '', $publicPath);
                            
                            $awsFileName = rand(100000,999999) . '.' . $extension;

                            // $file = Storage::disk('s3')->put('public/uploads/all/' . $awsFileName, file_get_contents($publicPath));
                            // $path = env('AWS_MEDIA_URL').'uploads/all/'.$awsFileName;
                            // $path = substr($path, 45, 200);
                            $file = Storage::disk('s3')->put('public/uploads/all', $image);
                            $path = Storage::disk('s3')->url($file);
                            $path = substr($path, 45, 200);
                        }
                        else
                        {
                            if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                                $imagePath = $image;

                                //Create an image object.
                                // $im = imagecreatefrompng($imagePath);
                                switch ($extension) {
                                    case "png":
                                        $im = imagecreatefrompng($imagePath);
                                        $newImagePath = str_replace("png", "webp", $imagePath);
                                        //Quality. 1-100.
                                        $quality = 50;

                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpeg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpeg", "webp", $imagePath);
                                        //Quality. 1-100.
                                        $quality = 50;

                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    case "jpg":
                                        $im = imagecreatefromjpeg($imagePath);
                                        $newImagePath = str_replace("jpg", "webp", $imagePath);
                                        //Quality. 1-100.
                                        $quality = 50;

                                        //Create the webp image.
                                        imagewebp($im, $newImagePath, $quality);
                                        break;
                                    default:
                                        break;
                                }
                            }


                            
                            
                            $file = Storage::disk('s3')->put('public/uploads/all', $image);
                            $path = Storage::disk('s3')->url($file);
                            $path = substr($path, 45, 200);
                        }
                        $size = $image->getSize();
                    }
                    else
                    {
                        $path = $image->store('uploads/all', 'local');
                        $size = $image->getSize();
                    }

                    
                    $upload->extension = $extension == "png" || $extension == "jpeg" || $extension == "jpg" ? "webp" : $extension;
                    $upload->file_name = $path;
                    // $upload->user_id = session()->get('user_info')->user_id;
                    $upload->type = "image";
                    $upload->file_size = $size;
                    $upload->save();
                // }
            } 
            else{
                return "no image";
            }
            return $upload->id;
        }
        catch(Exception $e){
            return failedResponse($e->getMessage());
        }
    }
}
if (! function_exists('updateImage')) {
    function updateImage($id, $image)
    {
        try{
            if($image){
                $upload = Upload::find($id);
                $unlink_image = $upload->file_name;
                $extension = strtolower($image->getClientOriginalExtension());

                $upload->file_original_name = null;
                $arr = explode('.', $image->getClientOriginalName());
                for($i=0; $i < count($arr)-1; $i++){
                    if($i == 0){
                        $upload->file_original_name .= $arr[$i];
                    }
                    else{
                        $upload->file_original_name .= ".".$arr[$i];
                    }
                }
                if (env('AWS_ON')) {

                    if(env('APP_ENV')=='production')
                    {
                        //Magic..
                        $tempImgName = rand(10,100) . '.' . $extension;
                        //another magic
                        if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                            $imagePath = $image;
                            switch ($extension) {
                                case "png":
                                    $im = imagecreatefrompng($imagePath);
                                    $newImagePath = str_replace("png", "webp", $imagePath);
                                    $quality = 50;

                                    //Create the webp image.
                                    imagewebp($im, $newImagePath, $quality);
                                    break;
                                case "jpeg":
                                    $im = imagecreatefromjpeg($imagePath);
                                    $newImagePath = str_replace("jpeg", "webp", $imagePath);
                                    $quality = 50;

                                    //Create the webp image.
                                    imagewebp($im, $newImagePath, $quality);
                                    break;
                                case "jpg":
                                    $im = imagecreatefromjpeg($imagePath);
                                    $newImagePath = str_replace("jpg", "webp", $imagePath);
                                    $quality = 50;

                                    //Create the webp image.
                                    imagewebp($im, $newImagePath, $quality);
                                    break;
                                default:
                                    break;
                            }
                        }
                        

                        $publicPath = public_path('/uploads/all/') . $tempImgName;
                        $publicPath = str_replace('/public', '', $publicPath);
                        
                        $awsFileName = rand(100000,999999) . '.' . $extension;

                        $file = Storage::disk('s3')->put('public/uploads/all', $image);
                        $path = Storage::disk('s3')->url($file);
                        $path = substr($path, 45, 200);
                    }
                    else
                    {
                        if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
                            $imagePath = $image;

                            switch ($extension) {
                                case "png":
                                    $im = imagecreatefrompng($imagePath);
                                    $newImagePath = str_replace("png", "webp", $imagePath);
                                    //Quality. 1-100.
                                    $quality = 50;

                                    //Create the webp image.
                                    imagewebp($im, $newImagePath, $quality);
                                    break;
                                case "jpeg":
                                    $im = imagecreatefromjpeg($imagePath);
                                    $newImagePath = str_replace("jpeg", "webp", $imagePath);
                                    //Quality. 1-100.
                                    $quality = 50;

                                    //Create the webp image.
                                    imagewebp($im, $newImagePath, $quality);
                                    break;
                                case "jpg":
                                    $im = imagecreatefromjpeg($imagePath);
                                    $newImagePath = str_replace("jpg", "webp", $imagePath);
                                    //Quality. 1-100.
                                    $quality = 50;

                                    //Create the webp image.
                                    imagewebp($im, $newImagePath, $quality);
                                    break;
                                default:
                                    break;
                            }
                        }

                        Storage::disk('s3')->delete($unlink_image);
                        
                        
                        $file = Storage::disk('s3')->put('public/uploads/all', $image);
                        $path = Storage::disk('s3')->url($file);
                        $path = substr($path, 45, 200);
                    }
                    $size = $image->getSize();
                }
                else
                {
                    unlink(public_path() . $unlink_image);
                    $path = $image->store('uploads/all', 'local');
                    $size = $image->getSize();
                }

                // return $path;
                $upload->extension = $extension == "png" || $extension == "jpeg" || $extension == "jpg" ? "webp" : $extension;
                $upload->file_name = $path;
                $upload->type = "image";
                $upload->file_size = $size;
                $upload->save();
                // return $upload;
            } 
            else{
                return "no image";
            }
            return $upload->id;
        }
        catch(Exception $e){
            return failedResponse($e->getMessage());
        }
    }
}
if (! function_exists('getUser')) {
    function getUser()
    {
        if (Auth::check()) {
            return Auth::user();
        } else {
            return null;
        }
    }
}
if (! function_exists('daysCount')) {
    function daysCount($num)
    {
        $last_date = Carbon::now()->addMonth($num);
        return Carbon::parse($last_date)->diffInDays(Carbon::now());
    }
}
//return file uploaded via uploader
if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Upload::find($id)) != null) {
            return my_asset($asset->file_name);
        }
        return null;
    }
}
if (!function_exists('uploaded_asset_extension')) {
    function uploaded_asset_extension($id)
    {
        if (($asset = \App\Upload::find($id)) != null) {
            return $asset->extension;
        }
        return null;
    }
}
if (! function_exists('my_asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool|null  $secure
     * @return string
     */
    function my_asset($path, $secure = null)
    {
        if(env('AWS_ON'))  return env('AWS_MEDIA_URL').$path;
        return app('url')->asset('public/'.$path, $secure);
    }
}
if (! function_exists('verified_sellers_id')) {
    function verified_sellers_id() {
        return App\Seller::where('verification_status', 1)->get()->pluck('user_id')->toArray();
    }
}
//filter products based on vendor activation system
if (! function_exists('filter_products')) {
    function filter_products($products) {
        $verified_sellers = verified_sellers_id();
        if(BusinessSetting::where('type', 'vendor_system_activation')->first()->value == 1){
            return $products->where('published', '1')->orderBy('created_at', 'desc')->where(function($p) use ($verified_sellers){
                $p->where('added_by', 'admin')->orWhere(function($q) use ($verified_sellers){
                    $q->whereIn('user_id', $verified_sellers);
                });
            });
        }
        else{
            return $products->where('published', '1')->where('added_by', 'admin');
        }
    }
}
if(! function_exists('renderStarRating')){
    function renderStarRating($rating,$maxRating=5) {
        $fullStar = "<i class = 'las la-star active'></i>";
        $halfStar = "<i class = 'las la-star half'></i>";
        $emptyStar = "<i class = 'las la-star'></i>";
        $rating = $rating <= $maxRating?$rating:$maxRating;

        $fullStarCount = (int)$rating;
        $halfStarCount = ceil($rating)-$fullStarCount;
        $emptyStarCount = $maxRating -$fullStarCount-$halfStarCount;

        $html = str_repeat($fullStar,$fullStarCount);
        $html .= str_repeat($halfStar,$halfStarCount);
        $html .= str_repeat($emptyStar,$emptyStarCount);
        echo $html;
    }
}
if (! function_exists('convert_price')) {
    function convert_price($price)
    {
        $business_settings = BusinessSetting::where('type', 'system_default_currency')->first();
        if($business_settings != null){
            $currency = Currency::find($business_settings->value);
            $price = floatval($price) / floatval($currency->exchange_rate);
        }

        $code = \App\Currency::findOrFail(get_setting('system_default_currency'))->code;
        if(Session::has('currency_code')){
            $currency = Currency::where('code', Session::get('currency_code', $code))->first();
        }
        else{
            $currency = Currency::where('code', $code)->first();
        }

        $price = floatval($price) * floatval($currency->exchange_rate);

        return $price;
    }
}

//formats currency
if (! function_exists('format_price')) {
    function format_price($price)
    {
        if (get_setting('decimal_separator') == 1) {
            $fomated_price = number_format($price, BusinessSetting::where('type', 'no_of_decimals')->first()->value);
        }
        else {
            $fomated_price = number_format($price, BusinessSetting::where('type', 'no_of_decimals')->first()->value , ',' , ' ');
        }

        if(BusinessSetting::where('type', 'symbol_format')->first()->value == 1){
            return currency_symbol().$fomated_price;
        }
        return $fomated_price.currency_symbol();
    }
}

//formats price to home default price with convertion
if (! function_exists('single_price')) {
    function single_price($price)
    {
        $price = $price < 0 ? 0 : $price;
        return format_price(convert_price($price));
    }
}
if (! function_exists('home_price')) {
    function home_price($id)
    {
        $product = Product::findOrFail($id);
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if($lowest_price > $stock->price){
                    $lowest_price = $stock->price;
                }
                if($highest_price < $stock->price){
                    $highest_price = $stock->price;
                }
            }
        }

        if($product->tax_type == 'percent'){
            $lowest_price += ($lowest_price*$product->tax)/100;
            $highest_price += ($highest_price*$product->tax)/100;
        }
        elseif($product->tax_type == 'amount'){
            $lowest_price += $product->tax;
            $highest_price += $product->tax;
        }

        $lowest_price = convert_price($lowest_price);
        $highest_price = convert_price($highest_price);

        if($lowest_price == $highest_price){
            $lowest_price = $lowest_price < 0 ? 0 : $lowest_price;
            return format_price($lowest_price);
        }
        else{
            $lowest_price = $lowest_price < 0 ? 0 : $lowest_price;
            $highest_price = $highest_price < 0 ? 0 : $highest_price;
            return format_price($lowest_price).' - '.format_price($highest_price);
        }
    }
}
if (! function_exists('home_discounted_price')) {
    function home_discounted_price($id)
    {
        $product = Product::findOrFail($id);
        $lowest_price = $product->unit_price;
        $highest_price = $product->unit_price;

        if ($product->variant_product) {
            foreach ($product->stocks as $key => $stock) {
                if($lowest_price > $stock->price){
                    $lowest_price = $stock->price;
                }
                if($highest_price < $stock->price){
                    $highest_price = $stock->price;
                }
            }
        }

        $flash_deals = \App\FlashDeal::where('status', 1)->get();
        $inFlashDeal = false;
        foreach ($flash_deals as $flash_deal) {
            if ($flash_deal != null && $flash_deal->status == 1 && strtotime(date('d-m-Y')) >= $flash_deal->start_date && strtotime(date('d-m-Y')) <= $flash_deal->end_date && FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first() != null) {
                $flash_deal_product = FlashDealProduct::where('flash_deal_id', $flash_deal->id)->where('product_id', $id)->first();
                if($flash_deal_product->discount_type == 'percent'){
                    $lowest_price -= ($lowest_price*$flash_deal_product->discount)/100;
                    $highest_price -= ($highest_price*$flash_deal_product->discount)/100;
                }
                elseif($flash_deal_product->discount_type == 'amount'){
                    $lowest_price -= $flash_deal_product->discount;
                    $highest_price -= $flash_deal_product->discount;
                }
                $inFlashDeal = true;
                break;
            }
        }

        if (!$inFlashDeal) {
            if($product->discount_type == 'percent'){
                $lowest_price -= ($lowest_price*$product->discount)/100;
                $highest_price -= ($highest_price*$product->discount)/100;
            }
            elseif($product->discount_type == 'amount'){
                $lowest_price -= $product->discount;
                $highest_price -= $product->discount;
            }
        }

        if($product->tax_type == 'percent'){
            $lowest_price += ($lowest_price*$product->tax)/100;
            $highest_price += ($highest_price*$product->tax)/100;
        }
        elseif($product->tax_type == 'amount'){
            $lowest_price += $product->tax;
            $highest_price += $product->tax;
        }

        $lowest_price = convert_price($lowest_price);
        $highest_price = convert_price($highest_price);

        if($lowest_price == $highest_price){
            $lowest_price = $lowest_price < 0 ? 0 : $lowest_price;
            return format_price($lowest_price);
        }
        else{
            $lowest_price = $lowest_price < 0 ? 0 : $lowest_price;
            $highest_price = $highest_price < 0 ? 0 : $highest_price;
            return format_price($lowest_price).' - '.format_price($highest_price);
        }
    }
}

function assetUrl()
{
    return env('AWS_ON') ? env('AWS_MEDIA_URL') : env('NATIVE_MEDIA_URL');
}

if (! function_exists('successResponse')) {
    function successResponse($message='',$data = [],$code=200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data,
            'statusCode' => $code
        ]);
    }
}

if (! function_exists('failedResponse')) {
    function failedResponse($message='',$code=500)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'statusCode' => $code
        ]);
    }
}
if (!function_exists('get_setting')) {
    function get_setting($key, $default = null)
    {
        $setting = BusinessSetting::where('type', $key)->first();
        return $setting == null ? $default : $setting->value;
    }
}

if (!function_exists('uploaded_asset_extension')) {
    function uploaded_asset_extension($id)
    {
        if (($asset = \App\Upload::find($id)) != null) {
            return $asset->extension;
        }
        return null;
    }
}

if (!function_exists('setToken')) {
    function setToken($access_token)
    {
        return Cookie::queue(Cookie::make('api_token', $access_token, 3000));
    }
}

if (!function_exists('getToken')) {
    function getToken()
    {
        if (Cookie::has('api_token')) return Cookie::get('api_token');
        else return null;
    }
}

if (!function_exists('resetToken')) {
    function forgetToken()
    {
        return Cookie::queue(Cookie::forget('api_token'));
    }
}