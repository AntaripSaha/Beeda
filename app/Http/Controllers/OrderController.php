<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Jobs\SendOrderNotificationMailJob;
use App\Models\User;
use App\Order;
use App\OrderDetail;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    use ApiUrl;

    /*public function orderList(Request $request)
    {
        $token = getToken();
        if($token)
        {
            return $orders = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/orderlist/'.session()->get('user_info')->user_id);
            $orders = json_decode($orders);
            
            $all_orders = [];
            if($orders)
            {
                $all_orders = $orders;
            }
            if($request->ajax())
            {
                $data = $all_orders->orders;
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('customer', function($data){
                        return $data->user? $data->user->name: '';    
                    })
                    ->editColumn('service', function($data){
                        return isset($data->order_details[0]->product->service_category->name) ? $data->order_details[0]->product->service_category->name : "-";    
                    })
                    ->editColumn('quantity', function($data){ 
                        return count($data->order_details);    
                    })
                    ->editColumn('viewed', function($data){ 
                        if($data->viewed == 0)
                        {
                            return '<i class="fa fa-eye" aria-hidden="true"></i>';
                        }
                        else
                        {
                            return '<i class="fa fa-check text-success" aria-hidden="true"></i>';

                        }
                    })
                    ->editColumn('amount', function($data){
                        $price = 0;
                        foreach($data->order_details as $details)
                        {
                            $price += (($details->tax + $details->shipping_cost + $details->packing_cost + $details->price) - $details->coupon_discount);
                        }   
                        return number_format($price, 2);    
                    })
                    ->editColumn('delivery_status', function($data){
                        $btn = '';
                        $icon_class = '';
                        $btn_color = '';
                        $btn_text = '';
                        $btn_value = '';
                        if($data->order_details[0]->delivery_status == 'pending')
                        {
                             $btn .= '<span class="badge badge-danger">'.$data->order_details[0]->delivery_status.'</span>';
                        }
                        else
                        {
                             $btn .= '<span class="badge badge-success">'.$data->order_details[0]->delivery_status.'</span>';
                        }
                        if($data->order_details[0]->delivery_status == 'pending')
                        {
                            $icon_class = 'fa fa-check';
                            $btn_color = '#35bf35';
                            $btn_text = 'Confirm';
                            $btn_value = 'confirmed';
                        }
                        if($data->order_details[0]->delivery_status == 'confirmed')
                        {
                            $icon_class = 'fas fa-shipping-fast';
                            $btn_color = '#0368ff';
                            $btn_text = 'Pick Up';
                            $btn_value = 'picked_up';
                        }
                        if($data->order_details[0]->delivery_status == 'picked_up')
                        {
                            $icon_class = 'fas fa-gifts';
                            $btn_color = '#9203ff';
                            $btn_text = 'Deliver';
                            $btn_value = 'delivered';
                        }
                        if($data->order_details[0]->delivery_status != 'delivered')
                        {
                            $btn .= '<form action="'.route('order.change.delivery.status').'" method="post"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" name="order_id" value="'.$data->id.'" /><input type="hidden" name="delivery_status" value="'.$btn_value.'" /><button class="btn btn-xs" style="background-color: '.$btn_color.';border-color: '.$btn_color.';color:white;" type="submit"><i class="'.$icon_class.'"></i> '.$btn_text.'</button></form>';
                        }
                        return $btn;
                    })
                    ->editColumn('payment_status', function($data){
                        if($data->order_details[0]->payment_status == 'unpaid')
                        {
                            return '<span class="badge badge-danger">'.$data->order_details[0]->payment_status.'</span>';
                        }
                        else
                        {
                            return '<span class="badge badge-success">'.$data->order_details[0]->payment_status.'</span>';
                        }
                    })
                    ->editColumn('action', function($data){
                        $btn = '';
                        if($data->order_details[0]->payment_status == 'unpaid')
                        {
                            $btn .= '<form action="'.route('order.make.payment').'" method="post"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" name="order_id" value="'.$data->id.'" /><button class="btn btn-sm" style="background-color: #061880;border-color: #061880;color:white;" type="submit"><i class="fas fa-wallet"></i> Pay</button></form><br>';
                        }
                        $btn .= '<a href="'.route('order.details', ['id'=>$data->id]).'" class="btn btn-sm" style="background-color: #061880;border-color: #061880;color:white;" type="submit"><i class="fas fa-info-circle"></i></a>'; 
                        return $btn;
                    })
                    ->rawColumns(['customer', 'service','code','amount','delivery_status','payment_status', 'viewed','action'])
                    ->make(true);
            
                 } 
                 $parent = 'seller';
                 $page = 'order';
                 return view('store_owner.orders.orders', compact('parent', 'page'));
                }
                else
                {
                    return redirect()->route('login.login');
                }
    }*/

    public function orderList(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $id = session()->get('user_info')->user_id;
            $order_ids = OrderDetail::where('seller_id', $id)->groupBy('order_id')->pluck('order_id');
            $seller_id = $id;
            $orders = Order::with(['user','orderDetails'=> function($query) use($seller_id){
                $query->with(['product'=> function($query){
                    $query->with(['service_category']);
                }])->where('seller_id', $seller_id);
            }])->whereIn('id', $order_ids)->orderBy('id', 'desc')->get();


            if($request->ajax())
            {
                $data = json_decode($orders);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('customer', function($data){
                        return $data->user? $data->user->name: '';    
                    })
                    ->editColumn('service', function($data){
                        return isset($data->order_details[0]->product->service_category->name) ? $data->order_details[0]->product->service_category->name : "-";    
                    })
                    ->editColumn('quantity', function($data){ 
                        return count($data->order_details);   
                    })
                    ->editColumn('viewed', function($data){ 
                        if($data->viewed == 0)
                        {
                            return '<i class="fa fa-eye" aria-hidden="true"></i>';
                        }
                        else
                        {
                            return '<i class="fa fa-check text-success" aria-hidden="true"></i>';

                        }
                    })
                    ->editColumn('amount', function($data){
                        $price = 0;
                        if (isset($data->order_details)) {
                            foreach($data->order_details as $details)
                            {
                                $price += (($details->tax + $details->shipping_cost + $details->packing_cost + $details->price) - $details->coupon_discount);
                            }   
                            return number_format($price, 2);
                        }    
                        return number_format(0, 2);
                    })
                    ->editColumn('delivery_status', function($data){
                        if(isset($data->order_details[0]->delivery_status)) {
                            $btn = '';
                            $icon_class = '';
                            $btn_color = '';
                            $btn_text = '';
                            $btn_value = '';
                            if($data->order_details[0]->delivery_status == 'pending')
                            {
                                $btn .= '<span class="badge badge-danger">'.ucfirst($data->order_details[0]->delivery_status).'</span>';
                            }
                            else
                            {
                                $btn .= '<span class="badge badge-success">'.ucfirst($data->order_details[0]->delivery_status).'</span>';
                            }
                            if($data->order_details[0]->delivery_status == 'pending')
                            {
                                $icon_class = 'fa fa-check';
                                $btn_color = '#35bf35';
                                $btn_text = 'Accepted';
                                $btn_value = 'accepted';
                            }
                            if($data->order_details[0]->delivery_status == 'accepted')
                            {
                                $icon_class = 'fas fa-shipping-fast';
                                $btn_color = '#0368ff';
                                $btn_text = 'Processing';
                                $btn_value = 'processing';
                            }
                            if($data->order_details[0]->delivery_status == 'processing')
                            {
                                $icon_class = 'fas fa-gifts';
                                $btn_color = '#9203ff';
                                $btn_text = 'Shipped';
                                $btn_value = 'shipped';
                            }if($data->order_details[0]->delivery_status == 'shipped')
                            {
                                $icon_class = 'fas fa-gifts';
                                $btn_color = '#9203ff';
                                $btn_text = 'Delivered';
                                $btn_value = 'delivered';
                            }
                            if($data->order_details[0]->delivery_status != 'delivered')
                            {
                                $btn .= '<form action="'.route('order.change.delivery.status').'" method="post"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" name="order_id" value="'.$data->id.'" /><input type="hidden" name="delivery_status" value="'.$btn_value.'" /><button class="btn btn-xs" style="background-color: '.$btn_color.';border-color: '.$btn_color.';color:white;" type="submit"><i class="'.$icon_class.'"></i> '.$btn_text.'</button></form>';
                            }
                            return $btn;
                        }
                        return '-';
                    })
                    ->editColumn('payment_status', function($data){
                        if (isset($data->order_details[0]->payment_status)) {
                            if($data->order_details[0]->payment_status == 'unpaid')
                            {
                                return '<span class="badge badge-danger">'.$data->order_details[0]->payment_status.'</span>';
                            }
                            else
                            {
                                return '<span class="badge badge-success">'.$data->order_details[0]->payment_status.'</span>';
                            }
                        }
                        return '-';
                    })
                    ->editColumn('action', function($data){
                        if (isset($data->order_details[0]->payment_status)) {
                            $btn = '';
                            if($data->order_details[0]->payment_status == 'unpaid')
                            {
                                $btn .= '<form action="'.route('order.make.payment').'" method="post"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" name="order_id" value="'.$data->id.'" /><button class="btn btn-sm" style="background-color: #061880;border-color: #061880;color:white;" type="submit"><i class="fas fa-wallet"></i> Pay</button></form><br>';
                            }
                            $btn .= '<a href="'.route('order.details', ['id'=>$data->id]).'" class="btn btn-sm" style="background-color: #061880;border-color: #061880;color:white;" type="submit"><i class="fas fa-info-circle"></i></a>'; 
                            return $btn;
                        }
                        return '-';
                    })
                    ->rawColumns(['customer', 'service','code','amount','delivery_status','payment_status', 'viewed','action'])
                    ->make(true);
            
                 } 
                 $parent = 'seller';
                 $page = 'order';
                 return view('store_owner.orders.orders', compact('parent', 'page'));
        } else
        {
            return redirect()->route('login.login');
        }
    }

    public function shortOrderList(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $orders = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/shortorderlist/'.session()->get('user_info')->user_id);
            $orders = json_decode($orders); 
            $all_orders = [];
            if($orders)
            {
                $all_orders = $orders;
            }
            return $all_orders;
        }
    }

    public function makePayment(Request $request)
    {
      $token = getToken();
        if($token)
        {
            /*
          $payment = Http::withHeaders([
                  'Authorization' => 'Bearer '.$token
              ])->post($this->getApiUrl().'seller/order/makepayment', [
                  'id' => $request->order_id,
                  'seller_id' => session()->get('user_info')->user_id
              ]);
              $payment = json_decode($payment);
            */
            $payment = false;
            $orders = OrderDetail::where('seller_id', session()->get('user_info')->user_id)->where('order_id', $request->order_id)->get();
            foreach($orders as $order)
            {
                $order->payment_status = 'paid';
                $order->update();
                $payment = true;
            }           

            $message = "";
            if($payment)
            {
                $message = 'Payment completed successfully';
            }
            else
            {
                $message = 'Something went wrong';
            }
        }  else {
            return redirect()->route('login.login');
        }  

        return redirect()->route('order.list')->with('success_message', $message);
    }

    public function changeDeliveryStatus(Request $request)
    {
        $token = getToken();
        $message = "";

        if($token)
        {
            /*
            $delivery_status = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'seller/order/changedeliverystatus', [
                'id' => $request->order_id,
                'seller_id' => session()->get('user_info')->user_id,
                'delivery_status' => $request->delivery_status
            ]);     
          $delivery_status = json_decode($delivery_status); 
          */
           $delivery_status = false;

            $orders = OrderDetail::with(['order'])->where('seller_id', session()->get('user_info')->user_id)->where('order_id', $request->order_id)->get();

            foreach($orders as $order)
            {
                $order->delivery_status = $request->delivery_status;
                $order->save();
            }

            $user = User::where('id', $orders[0]->order->user_id)->first();
            $order_status = '';

            if($request->delivery_status == 'accepted')
            {
                $order_status = 'accepted';
                $delivery_status = true;
            }
            else if($request->delivery_status == 'processing')
            {
                $order_status = 'processing';
                $delivery_status = true;
            }
            else if($request->delivery_status == 'shipped')
            {
                $order_status = 'shipped';
                $delivery_status = true;
            }
            else if($request->delivery_status == 'delivered')
            {
                $order_status = 'delivered';
                $delivery_status = true;
            }

            $count_delivered_orders = OrderDetail::where('order_id', $request->order_id)->where('delivery_status', 'delivered')->count();
            $count_total_orders = OrderDetail::where('order_id', $request->order_id)->count();
            if($count_delivered_orders == $count_total_orders)
            {
                $parent_order = \App\Order::where('id', $order->order_id)->first();
                if($parent_order)
                {
                    $parent_order->delivery_status = 'delivered';
                    $parent_order->update();
                }
            }

            $data = [
                'subject' => 'Beeda Order',
                'to' => $user->email,
                'name' => $user->name,
                'content' => 'Your order has been '.$order_status.' successfully!',
                'order_no' => $order->order->code
            ];

            if(env('SEND_EMAIL')) dispatch(new SendOrderNotificationMailJob($data));

          if($delivery_status)
          {
              $message = 'Delivery status changed successfully';
          }
          else
          {
              $message = 'Something went wrong';
          }
        }  
        else
        {
          return redirect()->route('login.login');
        }  
        return redirect()->route('order.list')->with('success_message', $message);
    }

    public function orderDetails($id)
    {
        $token = getToken();
        if($token)
        {
            /*
            $order = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/orderdetails/'.$id.'/'.session()->get('user_info')->user_id);
            */
            
            $seller_id = session()->get('user_info')->user_id;
            $order = Order::with(['user','orderDetails'=>function($query) use($seller_id){
                $query->with(['product'=> function($query){
                    $query->with(['service_category', 'shop'=> function($query){
                        $query->with(['logo_img']);
                    }, 'thumbnail_image']);
                },  'orderAddons'=>function($query){
                    $query->with(['addon']);
            }])->where('seller_id', $seller_id);
            }])->where('id', $id)->first();

            if($order->viewed == 0)
            {
                $order->viewed = 1;
                $order->update();
            }

            $order = json_decode($order); 
            // $order = $order->order;
            $parent = 'seller';
            $page = 'order';

            if($order->order_details[0]->product->service_category_id == 8)
            {
                return view('store_owner.orders.grocery_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 9)
            {
                return view('store_owner.orders.pharmacy_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 10)
            {
                return view('store_owner.orders.liquor_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 11)
            {
                return view('store_owner.orders.water_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 20)
            {
                return view('store_owner.orders.gas_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 26)
            {
                return view('store_owner.orders.flower_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 4)
            {
                return view('store_owner.orders.food_order_details', compact('parent', 'page', 'order'));
            }
            else if($order->order_details[0]->product->service_category_id == 6)
            {
                return view('store_owner.orders.beedamall_order_details', compact('parent', 'page', 'order'));
            }
        }  
        else
        {
          return redirect()->route('login.login');
        }  
    }
}
