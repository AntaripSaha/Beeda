<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\ApiUrl;
use App\BusinessSetting;
use App\Models\OrderDetail;
use App\Models\Product;
use DB;

class DashboardController extends Controller
{
    use ApiUrl;
    /*
    public function index()
    {
        $token = getToken();
        if($token)
        {
            $dashboard_info = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/dashboard/'.session()->get('user_info')->user_id);
            $dashboard_info = json_decode($dashboard_info);
            $parent = 'seller';
            $page = 'seller_dashboard';
            return view('store_owner.dashboard.dashboard', compact('dashboard_info', 'page', 'parent'));
        }
        else
        {
            return redirect()->route('login.login');
        }
    }
    */

    public function index()
    {
        $token = getToken();
        $user_id = session()->get('user_info')->user_id;

        if($token)
        {
            $total_products = Product::where('user_id', $user_id)->count();
            $total_pending_orders = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'pending')->get()->groupBy('order_id'));
            $total_successful_orders = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->get()->groupBy('order_id'));
            $total_sale = OrderDetail::where('seller_id', $user_id)->where('payment_status', 'paid')->get()->sum(function($t){
                return ($t->price + $t->tax + $t->shipping_cost + $t->packing_cost) - $t->coupon_discount;
            });;
            $total_product_sold = OrderDetail::where('payment_status', 'paid')->where('seller_id', $user_id)->sum('quantity');
            $total_sales_jan = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 1)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_fab = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 2)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_mar = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 3)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_apr = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 4)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_may = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 5)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_jun = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 6)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_jul = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 7)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_aug = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 8)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_sep = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 9)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_oct = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 10)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_nov = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 11)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $total_sales_dec = count(OrderDetail::where('seller_id', $user_id)->where('delivery_status', 'delivered')->whereMonth('created_at', 12)->whereYear('created_at', date('Y'))->get()->groupBy('order_id'));
            $dashboard_info = (object)array(
                'total_products' => $total_products,
                'total_pending_orders' => $total_pending_orders,
                'total_successful_orders' => $total_successful_orders,
                'total_sale' => $total_sale,
                'total_product_sold' => $total_product_sold,
                'sales_chart' => (object)array(
                        'total_sales_jan' => $total_sales_jan,
                        'total_sales_fab' => $total_sales_fab,
                        'total_sales_mar' => $total_sales_mar,
                        'total_sales_apr' => $total_sales_apr,
                        'total_sales_may' => $total_sales_may,
                        'total_sales_jun' => $total_sales_jun,
                        'total_sales_jul' => $total_sales_jul,
                        'total_sales_aug' => $total_sales_aug,
                        'total_sales_sep' => $total_sales_sep,
                        'total_sales_oct' => $total_sales_oct,
                        'total_sales_nov' => $total_sales_nov,
                        'total_sales_dec' => $total_sales_dec,
                )
            ); 

            $parent = 'seller';
            $page = 'seller_dashboard';
            return view('store_owner.dashboard.dashboard', compact('dashboard_info', 'page', 'parent'));
        }
        else
        {
            return redirect()->route('login.login');
        }
    }
}
