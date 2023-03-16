<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Constants\ServiceCategoryType;
use App\ServiceCategory;
use App\UserSubscription;
use App\EcommerceSubscription;
use App\EcommerceSubscriptionOption;
use App\Revenue;
use App\SellerSubscription;
use App\User;
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Illuminate\Support\Facades\DB;

class EcommerceSubscriptionController extends Controller
{
    public function index(Request $request)
    {
       if($request->ajax()) {
            $token = getToken();
            if ($token) {
                return DataTablesDataTables::of($data = EcommerceSubscription::all())
                    ->addIndexColumn()
                    ->editColumn('service_name', function ($data) {
                        if ($data->service_category_id) {
                            return ServiceCategory::where('id', $data->service_category_id)->first()->name;
                        } else {
                            return 'Other-'.$data->service_category_id;
                        }
                    })
                    ->editColumn('amount', function ($data) {
                        return number_format($data->amount, 2);
                    })
                    ->editColumn('discount', function ($data) {
                        return number_format($data->discount, 2);
                    })
                    ->editColumn('status', function ($data) {
                        $active = '';
                        $checked = '';
                        if($data->is_active)
                        {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn '.$active.'">
                                        <input type="checkbox" onclick="publish('.$data->id.')" class="cb-value publish'.$data->id.'" '.$checked.'/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<form action="'.route('ecommerce_subscription.delete').'" method="post" id="delete-form-'.$data->id.'"><input type="hidden" name="_token" value="'.csrf_token().'" /><input type="hidden" value="'.$data->id.'" name="id" /></form>';
                        $btn .= '<a href="'.route('ecommerce_subscription.edit', ['id' => $data->id]).'" style="color:#061880;" title="Edit"><i class="material-icons">edit</i></a>';
                        $btn .= '<a href="javascript:;" title="Delete" style="color:#061880;" onclick="deleteEcommerceSubscription('.$data->id.')"><i class="material-icons">delete</i></a>';
                        return $btn;
                    })
                    ->rawColumns(['service_name', 'amount', 'discount', 'status', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'ecommerce_subscription';
        return view('superadmin.ecommerce.subscriptions.index', compact('page'));
    }

    public function add(Request $request)
    {
        $service_categories = ServiceCategory::where('status', 1)->get();
        $subscription_options = EcommerceSubscriptionOption::where('status', 1)->get();
        $page = 'ecommerce_subscription';
        return view('superadmin.ecommerce.subscriptions.add', compact('page', 'service_categories', 'subscription_options'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required',
            'name' => 'required',
            'duration_days' => 'required',
            'remaining_notification' => 'required',
            'amount' => 'required',
            'discount' => 'required',
            'is_active' => 'required',
            'product_listing' => 'required',
        ]);
        
        try{
            $months = floor($request->duration_days / 30);
            $days = $request->duration_days - ($months*30);
            $duration = $months == 0 ? $days.' Days' :  $months." Months";

            $data = [
                'service_category_id' => $request->service_category_id,
                'name' => $request->name,
                'duration' => $duration,
                'duration_days' => $request->duration_days,
                'remaining_notification' => $request->remaining_notification,
                'amount' => $request->amount,
                'discount' => $request->discount,
                'is_active' => $request->is_active,
                'product_listing' => $request->product_listing,
                'options' => json_encode($request->options),
            ];

            EcommerceSubscription::create($data);
            $message = "Subscription added successfully!";
            return redirect()->route('ecommerce_subscription.index')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function edit($id)
    {   
        $token = getToken();

        if ($token) {
            $subscription = EcommerceSubscription::where('id', $id)->first();
            $service_categories = ServiceCategory::where('status', 1)->get();
            $subscription_options = EcommerceSubscriptionOption::where('status', 1)->get();
            $page = 'ecommerce_subscription';
            return view('superadmin.ecommerce.subscriptions.edit', compact('page', 'subscription', 'service_categories', 'subscription_options'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'service_category_id' => 'required',
            'name' => 'required',
            'duration_days' => 'required',
            'remaining_notification' => 'required',
            'amount' => 'required',
            'discount' => 'required',
            'is_active' => 'required',
            'product_listing' => 'required',
        ]);

        try{
            $subscription = EcommerceSubscription::where('id', $request->id)->first();

            $months = floor($request->duration_days / 30);
            $days = $request->duration_days - ($months*30);
            $duration = $months == 0 ? $days.' Days' :  $months." Months";

            $data = [
                'service_category_id' => $request->service_category_id,
                'name' => $request->name,
                'duration' => $duration,
                'duration_days' => $request->duration_days,
                'remaining_notification' => $request->remaining_notification,
                'amount' => $request->amount,
                'discount' => $request->discount,
                'is_active' => $request->is_active,
                'product_listing' => $request->product_listing,
                'options' => json_encode($request->options),
            ];

            $subscription->update($data);
            $message = "Subscription updated successfully!";
            return redirect()->route('ecommerce_subscription.index')->with('success_message', $message);
        }catch(\Exception $e){
            return redirect()->back()->with('error_message', 'Something Went Wrong!');
        }
    }

    public function destory(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);

        $token = getToken();
        if ($token) {
            $subscription = EcommerceSubscription::where('id', $request->id)->first();
            $subscription->delete();
            return redirect()->route('ecommerce_subscription.index')->with('success_message', 'Subscription deleted successfully');
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function publish(Request $request)
    {
        $request->validate([
            'subscription_id' => 'required',
        ]);

        $token = getToken();
        if ($token) {
            $subscription = EcommerceSubscription::where('id', $request->subscription_id)->first();
            $subscription->is_active = !$subscription->is_active;
            $subscription->update();

            return response()->json([
                'message' => 'Status changed successfully'
            ]);
        } else {
            return redirect()->route('super.admin.login');
        }
    }
      

    public function seller(Request $request)
    {
       if($request->ajax()) {
            $token = getToken();
            if ($token) {
                return DataTablesDataTables::of($data =SellerSubscription::select('*', DB::raw('SUM(amount) as total_amount'), DB::raw('SUM(discount) as total_discount'))->with(['user'])->groupBy('user_id')->get())
                    ->addIndexColumn()
                    ->editColumn('driver_name', function ($data) {
                       return $data->user->name;
                    })
                    ->editColumn('service_listing', function ($data) {
                        $services = '';
                        $sellerSubscription = SellerSubscription::with('service_category')->where('user_id', $data->user_id)->get();
                        foreach ($sellerSubscription as $key => $row) {
                            $services .= '<span>';
                            $services .= '<img height="20px" src="https://d2t5292uahafuy.cloudfront.net/public/'.$row->service_category->icon_image.'"/>';
                            $services .= ' '.$row->service_category->name.'</span> ';
                        }
                        return $services;
                    })
                    ->editColumn('total_amount', function ($data) {
                        return number_format($data->total_amount, 2);
                    })
                    ->editColumn('total_discount', function ($data) {
                        return number_format($data->total_discount, 2);
                    })
                    ->editColumn('action', function ($data) {
                        $btn = '<a href="'.url('/ecommerce-subscriptions/seller-details/').'/'.$data->user_id.'" class="btn btn-info" title="Edit">Details</a>';
                        return $btn;
                    })
                    ->rawColumns(['driver_name', 'service_listing', 'total_amount', 'total_discount', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'seller_subscriptions';
        return view('superadmin.ecommerce.seller_subscriptions.index', compact('page'));
    } 

    public function sellerSubscriptionDetails(Request $request, $user_id)
    {
        $user = User::find($user_id);

       if($request->ajax()) {
            $token = getToken();
            if ($token) {
                return DataTablesDataTables::of($data =SellerSubscription::with(['subscription'])->where('user_id', $user_id)->get())
                    ->addIndexColumn()
                    ->editColumn('service_name', function ($data) {
                        if ($data->service_category_id == 2) {
                            return 'RIDES';
                        } else if($data->service_category_id == 10) {
                            return 'COURIER';
                        }
                    })
                    ->editColumn('package_name', function ($data) {
                        return $data->subscription->name;
                    })
                    ->editColumn('amount', function ($data) {
                        return number_format($data->amount, 2);
                    })
                    ->editColumn('discount', function ($data) {
                        return number_format($data->discount, 2);
                    })
                    ->editColumn('status', function ($data) {
                        $active = '';
                        $checked = '';
                        if($data->is_active)
                        {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn '.$active.'">
                                        <input type="checkbox" onclick="publish('.$data->id.')" class="cb-value publish'.$data->id.'" '.$checked.'/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->rawColumns(['service_name', 'package_name', 'amount', 'discount', 'status'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'seller_subscriptions';
        return view('superadmin.ecommerce.seller_subscriptions.details', compact('page', 'user'));
    }
}
