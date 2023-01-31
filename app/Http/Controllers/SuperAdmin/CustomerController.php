<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Constants\ServiceCategoryType;
use App\Http\Controllers\Controller;
use App\Models\LoginActivity;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Yajra\DataTables\DataTables;
use App\OrderDetail;
use App\Order;
use App\Ride;
use Exception;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        try{
            if($request->ajax()) {
                $data = User::with('transactions','loginActivities')->where('is_deleted',0)->where('user_type','customer')->orderBy('created_at','desc')->get();
                foreach ($data as $key => $value) $value->totalTransactions = count($value->transactions);
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('avatar', function ($data) {
                        return $data->avatar ? '<img style="height:30px;width:30px" src="'. $data->avatar .'">' : '<img style="height:30px;width:30px" src="https://d2t5292uahafuy.cloudfront.net/public/assets/img/11640168385jtmh7kpmvna5ddyynoxsjy5leb1nmpvqooaavkrjmt9zs7vtvuqi4lcwofkzsaejalxn7ggpim4hkg0wbwtzsrp1ldijzbdbsj5z.png">';
                    })
                    ->editColumn('totalTransactions', function ($data) {
                        return $data->totalTransactions ?  '<a href="/wallet/transactions/' . $data->id .'" class="btn btn-info">' . $data->totalTransactions . ' Transactions</a>' : '<a class="btn btn-dark">No Transactions</a>';
                    })
                    ->editColumn('balance', function ($data) {
                        return $data->currency . ' ' . number_format($data->balance,2);
                    })
                    ->addColumn('loginActivity', function ($data) {
                        return '<a class="btn btn-primary" href="/superadmin/customer/'. $data->id .'/login-activity">Login Activity</a>';
                    })
                    ->editColumn('created_at', function ($data) {
                        return date('F j, Y', strtotime($data->created_at));
                    })
                    ->editColumn('action', function ($data) {
                        return '<a href="/superadmin/customer/'. $data->id .'/details" title="Delete" style="color:#061880;" onclick="deleteCoupon('.$data->id.')"><i class="material-icons">info</i></a>';
                    })
                    ->rawColumns(['created_at', 'updated_at', 'action','totalTransactions','avatar','loginActivity'])
                    ->make(true);
            }
            $page = 'manage_customer';
            return view('superadmin.customer.index',compact('page'));
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }

    public function loginActivity(Request $request,$id)
    {
        try{
            if($request->ajax()) {
                $data = LoginActivity::where('user_id',$id)->get();
                foreach ($data as $key => $value) {
                    $token = DB::table('oauth_access_tokens')->find($value->token);
                    $value->active = $token ? !$token->revoked : false;
                }
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->editColumn('created_at', function ($data) {
                        return date('F j, Y, g:i a', strtotime($data->created_at));
                    })
                    ->editColumn('device_name', function ($data) {
                        return $data->active ? '<span style="background-color:#adf0cf;padding:4px;border-radius:3px">'. $data->device_name .'</span>' : '<span style="background-color:#f2c2bb;padding:4px;border-radius:3px">' . $data->device_name . '</span>';
                    })
                    ->rawColumns(['created_at','device_name'])
                    ->make(true);
            }
            $page = 'manage_customer';
            $user = User::find($id);
            return view('superadmin.customer.login-activity',compact('page','user'));
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }
    public function orderList(Request $request, $id)
    {
        try{
            $orders = Order::with(['user','orderDetails'=> function($query){
                $query->with(['product'=> function($query){
                    $query->with(['service_category']);
                }]);
            }])->where('user_id', $id)->orderBy('id', 'desc')->get();


            if($request->ajax())
            {
                $data = json_decode($orders);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('date', function($data){
                        return $data->date;    
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
                            $btn .= '<span class="badge badge-success">'.ucfirst($data->order_details[0]->delivery_status).'</span>';
                            
                            return $btn;
                        }
                        return '-';
                    })
                    // ->editColumn('payment_status', function($data){
                    //     if (isset($data->order_details[0]->payment_status)) {
                    //         if($data->order_details[0]->payment_status == 'unpaid')
                    //         {
                    //             return '<span class="badge badge-danger">'.$data->order_details[0]->payment_status.'</span>';
                    //         }
                    //         else
                    //         {
                    //             return '<span class="badge badge-success">'.$data->order_details[0]->payment_status.'</span>';
                    //         }
                    //     }
                    //     return '-';
                    // })
                    ->editColumn('code', function($data){
                            $btn = '';
                            $btn .= '<a href="'.route('superadmin.customer.customer.order.details', ['id'=>$data->id]).'" style="color:blue;" type="submit">'.$data->code.'</a>'; 
                            return $btn;
                    })
                    ->rawColumns(['date', 'service','code','amount','delivery_status','payment_status', 'viewed','action'])
                    ->make(true);
            
                 } 
                 $parent = 'seller';
                 $page = 'manage_customer';
                 $user = User::find($id);
                 return view('superadmin.customer.orders', compact('parent', 'page', 'id', 'user'));
        } 
        catch(Exception $e)
        {
            return failedResponse($e->getMessage());
        }
    }
    public function orderDetails($id){
        try{
            $order = Order::with(['user','orderDetails'=>function($query){
                $query->with(['product'=> function($query){
                    $query->with(['service_category', 'shop'=> function($query){
                        $query->with(['logo_img']);
                    }, 'thumbnail_image']);
                },  'orderAddons'=>function($query){
                    $query->with(['addon']);
            }]);
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
            return view('superadmin.customer.orderDetails', compact('parent', 'page', 'order'));
        }
        catch(Exception $e){
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function details(Request $request,$id)
    {
        try{
            $user = User::with('transactions','orders')->find($id);
            $rides = Ride::where('service_category_id', ServiceCategoryType::RIDES)->where('user_id', $id)->get();
            // dd(count($rides));
            $page = 'manage_customer';
            return view('superadmin.customer.details',compact('page','user', 'rides'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }

    public function rideList(Request $request, $id){
        try{
            $orders = Ride::with(['user', 'driver', 'rating', 'vehicle_type'])->where('user_id', $id)->orderBy('id', 'desc')->get();

            if($request->ajax())
            {
                $data = json_decode($orders);
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('pickup_datetime', function($data){
                        return $data->pickup_datetime;    
                    })
                    ->editColumn('driver', function($data){
                        if($data->driver_id) return isset($data->diver->name) ? $data->driver->name : $data->driver->first_name. " ". $data->driver->last_name;    
                        else return "--";
                    })
                    ->editColumn('rating', function($data){ 
                        return isset($data->rating->rating) ? $data->rating->rating : "--";   
                    })
                    ->editColumn('vehicle_type', function($data){ 
                            return $data->vehicle_type->name;
                    })
                    ->editColumn('status', function($data){
                            $statuses = array(0 => "pending", 1 =>"accepted", 2 => "schedule-accepted", 3 => "arrived", 4 => "cancelled", 5 => "running", 6 => "drop", 7 => "payment", 8 => "rating", 9 => "completed", 10 => "failed", 12 => "collect_cash");
                            return ucfirst($statuses[$data->status]);
                    })
                    ->editColumn('total_distance', function($data){
                        return $data->total_distance. " KM";
                    })
                    ->editColumn('total_pay', function($data){
                            return single_price($data->total_pay);
                    })
                    ->editColumn('ride_no', function($data){
                        return '<a href="'.route('superadmin.customer.ride.details', ['id'=>$data->id]).'" style="color:blue;" type="submit">'.$data->ride_no.'</a>'; 
                })
                    ->rawColumns(['pickup_datetime', 'driver','rating','vehicle_type','status', 'ride_no', 'pickup_address', 'destination_address', 'total_distance', 'total_pay', 'eta'])
                    ->make(true);
            
                 } 
                 $parent = 'seller';
                 $page = 'manage_customer';
                 $user = User::find($id);
                 return view('superadmin.customer.ride.index', compact('parent', 'page', 'id', 'user'));
        } 
        catch(Exception $e)
        {
            return failedResponse($e->getMessage());
        }
    }
    public function rideDetails($id){
        try{
            $ride = Ride::with(['user', 'driver', 'rating', 'vehicle_type', 'ride_route'])->find($id);
            $user = User::find($ride->user_id);
            $parent = 'seller';
            $page = 'manage_customer';
            $ride_path = json_decode($ride->ride_path);
            // return(gettype($ride_path));
            return view('superadmin.customer.ride.show', compact('parent', 'page', 'ride', 'user', 'ride_path'));
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }
}
