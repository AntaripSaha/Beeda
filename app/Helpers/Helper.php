<?php

use App\Constants\ServiceCategoryType;
use App\Currency;
use App\Models\BusinessSetting;
use App\Product;
use App\SellerService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

function getSellerServices()
{   
    $token = Cache::get('api_token');
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
            ServiceCategoryType::FLOWER
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
    $token = Cache::get('api_token');
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