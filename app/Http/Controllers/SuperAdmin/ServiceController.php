<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Constants\ServiceCategoryType;
use App\SellerService;
use App\Models\Property;
use Yajra\DataTables\Facades\DataTables;
use App\ServiceCategory;
use App\Product;
use App\Models\OrderDetail;
use App\Shop;
use App\Blog;
use App\Category;
use App\Models\BusinessSetting;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product as ModelsProduct;
use App\Models\Shop as ModelsShop;
use App\Models\User as ModelsUser;
use App\RequiredDocument;
use App\Ride;
use App\Subscription;
use App\User;
use App\TransportDriver;
use App\UserSubscription;
use DB;

class ServiceController extends Controller
{
    use ApiUrl;

    public function serviceList()
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_category_list = ServiceCategory::where('category_type', 2)->get();
            $page = 'manage_service';
            return view('superadmin.sellers.manage_service.service_list', compact('service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addService()
    {
        $page = 'manage_service';
        return view('superadmin.sellers.manage_service.add_service', compact('page'));
    }

    public function addServiceSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'icon' => 'required',
            'category_type' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'color' => $request->color,
            'category_type' => $request->category_type
        ];
        $token = Cache::get('api_token');
        if ($token) {
            $add_service = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('icon')) {
                $add_service = $add_service->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $add_service = $add_service->post($this->getApiUrl() . 'superadmin/addservice', $data);
            $add_service = json_decode($add_service);
            if ($add_service) {
                return redirect()->route('service.list')->with('success_message', $add_service->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editService($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $id);

            $service_category = json_decode($service_category);
            $service = null;
            if ($service_category) {
                $service = $service_category->service;
            }
            $page = 'manage_service';
            return view('superadmin.sellers.manage_service.edit_service', compact('service', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editServiceSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category_type' => 'required'
        ]);
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'color' => $request->color,
            'category_type' => $request->category_type
        ];
        $token = Cache::get('api_token');
        if ($token) {
            $update_service = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('icon')) {
                $update_service = $update_service->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $update_service = $update_service->post($this->getApiUrl() . 'superadmin/updateservice', $data);
            $update_service = json_decode($update_service);
            if ($update_service) {
                return redirect()->route('service.list')->with('success_message', $update_service->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function serviceStatus(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $data = [
                'id' => $request->service_id
            ];
            $service_status = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/servicestatus', $data);

            $service_status = json_decode($service_status);
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function storeDashboard($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $dashboard_info = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/storedashboard/' . $id);
            $dashboard_info = json_decode($dashboard_info);
            $info = null;
            if ($dashboard_info) {
                $info = $dashboard_info->dashboard_info;
            }
            $service_category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $id);

            $service_category = json_decode($service_category);
            $service = null;
            if ($service_category) {
                $service = $service_category->service;
            }
            $total_agents = 0;
            $total_properties = 0;
            if($service->id == ServiceCategoryType::REAL_ESTATE)
            {
                $total_agents = SellerService::where('service_category_id', ServiceCategoryType::REAL_ESTATE)->get()->count();
                $total_properties = Property::all()->count();
            }

            // Manage Blog
            $total_web_blogs = 0;
            $total_mobile_blogs = 0;
            $category_section =[];
            if ($id ==  ServiceCategoryType::BEEDA_MALL)
            {
                $category_section = [
                    'section_1_cat_name' =>  Category::find(get_setting('home_category_section_1')),
                    'section_1_name' =>  BusinessSetting::where('type', 'home_category_section_1_name')->first(),
                    'section_2_cat_name' => Category::find(get_setting('home_category_section_2')),
                    'section_2_name' =>  BusinessSetting::where('type', 'home_category_section_2_name')->first(),
                    'section_3_cat_name' => Category::find(get_setting('home_category_section_3')),
                    'section_3_name' =>  BusinessSetting::where('type', 'home_category_section_3_name')->first(),
                ];
                
                $total_web_blogs = Blog::where('device_type', 'web')->get()->count();
                $total_mobile_blogs = Blog::where('device_type', 'mobile')->get()->count();
            }

            $page = 'manage_service';
            return view('superadmin.sellers.manage_service.store_dashboard', compact('info', 'service', 'category_section', 'page', 'total_agents', 'total_properties', 'total_web_blogs', 'total_mobile_blogs'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function storeList($id, Request $request)
    {
        $start = microtime(true);
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $data = SellerService::with(['shop' => function ($query) {
                    $query->with(['totalProducts'=>function($q){
                        $q->select('id', 'shop_id');
                    }, 'logo_img']);
                }])
                ->whereHas('shop')
                ->where('service_category_id', $id)->get();
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('id', function ($data) {
                        return $data->shop->id;
                    })
                    ->editColumn('name', function ($data) {
                        return $data->shop->name;
                    })
                    ->editColumn('logo', function ($data) {
                        if ($data->shop->logo_img) {
                            if (env('AWS_ON')) {
                                return '<img src="' . env('AWS_MEDIA_URL') . $data->shop->logo_img->file_name . '" style="width:50px;height:50px;"/>';
                            }
                            return '<img src="https://beedamall.com/public/' . $data->shop->logo_img->file_name . '" style="width:60px;"/>';
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('products', function ($data) {
                        if (count($data->shop->totalProducts) > 0) {
                            return '<a href="' . route('service.store.product.list', ['id' => $data->shop->id]) . '" class="btn btn-sm btn-info">View (' . count($data->shop->totalProducts) . ')</a>';
                        } else {
                            return 0;
                        }
                    })
                    ->editColumn('orders', function ($data) {
                        return '<a href="' . route('service.store.order.list', ['id' => $data->shop->id]) . '" style="color:#061880;"><i class="material-icons">shopping_cart</i></a>';
                    })
                    ->editColumn('documents', function ($data) {
                        return '<a href="' . route('service.store.document.list', ['id' => $data->shop->id]) . '" style="color:#061880;"><i class="material-icons">description</i></a>';
                    })
                    ->editColumn('status', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->status) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="approve(' . $data->id . ')" class="cb-value approve' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('featured', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->shop->is_featured) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="feature(' . $data->shop->id . ')" class="cb-value feature' . $data->shop->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->rawColumns(['logo', 'products', 'orders', 'documents', 'status', 'featured'])
                    ->make(true);
            } 
        }
        $service = $service = ServiceCategory::where('id', $id)->first();
        $page = 'manage_service';
        $service_id = $id;
        return view('superadmin.sellers.manage_service.store_list', compact('page', 'service_id', 'service'));
    }

    public function storeProductList($id, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $data = Product::with(['shop', 'thumbnail_image', 'category'])->where('shop_id', $id)->get();
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
                    ->editColumn('category', function ($data) {
                        if ($data->category) {
                            return $data->category->name;
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
                    ->rawColumns(['product_image', 'category', 'published', 'tabed', 'featured', 'todays_deal'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_service';
        $shop_id = $id;
        return view('superadmin.sellers.manage_service.store_product_list', compact('page', 'shop_id'));
    }

    public function superAdminPublishProduct(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $product = Product::where('id', $request->product_id)->first();
            $product->published = !$product->published;
            $product->update();
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function superAdminTabProduct(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $product = Product::where('id', $request->product_id)->first();
            $product->tabed = !$product->tabed;
            $product->update();
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function superAdminFeatureProduct(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $product = Product::where('id', $request->product_id)->first();
            $product->featured = !$product->featured;
            $product->update();
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function superAdminTodaysDealProduct(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $product = Product::where('id', $request->product_id)->first();
            $product->todays_deal = !$product->todays_deal;
            $product->update();
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function storeApprove(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $seller_service = SellerService::where('id', $request->seller_service_id)->first();
            $seller_service->status = !$seller_service->status;
            $seller_service->update();

            if (!$seller_service->status) {
                $seller_service_id = $seller_service->id;
                $shop_id = ModelsShop::where('seller_service_id', $seller_service_id)->first()->id;
                $product_ids = ModelsProduct::where('shop_id', $shop_id)->pluck('id');
                Cart::whereIn('product_id', $product_ids)->delete();
            }
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function storeFeature(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $shop = Shop::where('id', $request->shop_id)->first();
            $shop->is_featured = !$shop->is_featured;
            $shop->update();
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function driverApprove(Request $request)
    {
        try{
            DB::beginTransaction();
            $seller = SellerService::where('seller_id', $request->user_id)->where('service_category_id',$request->service_id)->first();
            $seller->status = !$seller->status;
            $seller->update();
            $sellerServices = SellerService::where('seller_id', $request->user_id)->where('status', 0)->get();
            $user = User::find($request->user_id);
            if(!$sellerServices->count() > 0)
            {
                if($user)
                {
                    $user->state = 'active';
                    $user->update();
                }
            }
            $driver = TransportDriver::where('user_id',$request->user_id)->first();
            $driver->varification_status = !$driver->varification_status;
            $driver->update();
            DB::commit();
            // Free trial create start
            if($user->state == 'active')
            {
                $sellerServices = SellerService::where('seller_id', $request->user_id)->get();
                foreach($sellerServices as $service)
                {
                    $subscription = Subscription::where(['service_category_id' => $service->service_category_id, 'is_active' => 1])->Where('name', 'like', '%Free trial%')->orderBy('id', 'desc')->first();

                    if ($subscription && $service->status == 1) {
                        $startDate = date('Y-m-d');
                        $endDate   = date('Y-m-d', strtotime('+ 7 day'));
        
                        $data = [
                            'user_id' => $request->user_id,
                            'service_category_id' => $subscription->service_category_id,
                            'subscription_id'  => $subscription->id,
                            'start_date' => $startDate,
                            'end_date' => $endDate,
                            'duration' => $subscription->duration_days,
                            'remaining_notification' => $subscription->remaining_notification,
                            'amount' => $subscription->amount,
                            'discount' => $subscription->discount,
                            'is_active' => $subscription->is_active,
                        ];
        
                        UserSubscription::create($data);
                    }
                }

            }
            // Free trial create end
            return [$seller,$driver];
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }

    public function driverApproveGlobal(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $driver = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/driverapproveglobal', ['transport_driver_id' => $request->transport_driver_id]);
            return $driver;
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function storeOrderList($id, Request $request)
    {
        $shop = Shop::where('id', $id)->first();
        $seller_id = $shop->user_id;
        // return $seller_id;
        // $product_ids = Product::where('shop_id', $id)->pluck('id');
        // // return $product_ids;
        // $data = OrderDetail::with(['order' => function ($query) {
        //     $query->with(['user', 'orderDetails' => function ($query) {
        //         $query->with('product');
        //     }]);
        // }])->whereIn('product_id', $product_ids)->groupBy('order_id')->get();
        // $data = DB::table('orders')
        //             ->orderBy('code', 'desc')
        //             ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        //             // ->join('order_details', 'orders.seller_id', '=', 'order_details.seller_id')
        //             ->where('order_details.seller_id', $shop->user_id)
        //             ->select('orders.id')
        //             ->distinct();
        $data = Order::with(['orderDetails'=>function($q)use($seller_id){
                $q->where('seller_id', $seller_id);
            }, 
            'user'=>function($q){
                $q->select('id', 'name');
            }])
            ->get();
        // return $data;
        // foreach($data as $d){
        //     if(!isset($d->orderDetails[0])) return $data[0];
        // }
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                // $orders = Http::withHeaders([
                //     'Authorization' => 'Bearer ' . $token
                // ])->get($this->getApiUrl() . 'superadmin/storeorderlist/' . $id);
                // $orders = json_decode($orders);
                // $data = [];
                // if ($orders) {
                //     $data = $orders->orders;
                // }
                
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('customer_name', function ($data) {
                        if (isset($data->user->name)) {
                            return $data->user->name;
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('total_cost', function ($data) {
                            $price = 0;
                            foreach($data->orderDetails as $detail)
                            {
                                $price += ($detail->price * $detail->quantity) + $detail->tax + $detail->shipping_cost - $detail->coupon_discount;
                            }
                        return  '$' . $price;
                    })
                    ->editColumn('status', function ($data) {
                        if(isset($data->orderDetails[0]->delivery_status)){
                            $content = '';
                            if ($data->orderDetails[0]->delivery_status == 'pending') {
                                $content .= '<span class="badge badge-danger">Pending</span>';
                            } else if ($data->orderDetails[0]->delivery_status == 'accepted') {
                                $content .= '<span class="badge badge-warning">Accepted</span>';
                            } else if ($data->orderDetails[0]->delivery_status == 'processing') {
                                $content .= '<span class="badge badge-info">Processing</span>';
                            } else if ($data->orderDetails[0]->delivery_status == 'shipped') {
                                $content .= '<span class="badge badge-info">Shipped</span>';
                            } else if ($data->orderDetails[0]->delivery_status == 'delivered') {
                                $content .= '<span class="badge badge-success">Delivered</span>';
                            }
                            return $content;
                        }
                        else return '---';
                    })
                    ->editColumn('action', function ($data) {
                        if(isset($data->orderDetails[0]->seller_id)) return '<a href="' . route('service.store.order.details', ['id' => $data->orderDetails[0]->seller_id, 'order_id' => $data->id]) . '" class="btn btn-sm btn-primary">Details</a>';
                    })
                    ->rawColumns(['customer_name', 'total_cost', 'status', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_service';
        $shop_id = $id;
        return view('superadmin.sellers.manage_service.store_order_list', compact('page', 'shop_id'));
    }

    public function storeOrderDetails($id, $order_id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            /*
            $order_details = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/storeorderdetails/' . $id . '/' . $order_id);

            $order_details = json_decode($order_details);
            $details = null;
            if ($order_details) {
                $details = $order_details->order_details;
            }
            */

            // $details = OrderDetail::with(['product' => function ($query) {$query->with('shop');}, 'order' => function ($query) {
            //     $query->with(['user', 'orderDetails' => function ($query) {
            //         $query->with(['product' => function ($query) {
            //             $query->with(['category', 'taxes']);
            //         }]);
            //     }]);
            // }, 'shop'])->where('seller_id', $id)->where('order_id', $order_id)->get();
            $details = OrderDetail::with(['product' => function ($query) {$query->with('shop');}, 'order' => function ($query) {
                $query->with(['user']);
            }])->where('seller_id', $id)->where('order_id', $order_id)->get();
            // return $details;
            $details = json_decode($details);

            $page = 'manage_service';
            return view('superadmin.sellers.manage_service.store_order_details', compact('page', 'details'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function storeDocumentList($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $document_list = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/storedocumentlist/' . $id);
            $document_list = json_decode($document_list);
            $documents = [];
            $required_docs = [];
            if ($document_list) {
                $documents = $document_list->all_documents;
                $required_docs = $document_list->required_documents;
            }
            $page = 'manage_service';
            return view('superadmin.sellers.manage_service.store_document_list', compact('page', 'documents', 'required_docs'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function serviceOrderList($id, Request $request)
    {
        $token = Cache::get('api_token');
        //$seller_ids = SellerService::where('service_category_id', $id)->pluck('seller_id');
        $product_ids = Product::where('service_category_id', $id)->pluck('id');
        $data = OrderDetail::with(['product', 'order' => function ($query) {
            $query->with(['user', 'orderDetails' => function ($query) {
                $query->with('product');
            }]);
        }, 'shop'])
        ->whereHas('order')
        ->whereIn('product_id', $product_ids)->groupBy('order_id')->get();

        if ($request->ajax()) {
            if ($token) {
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('code', function ($data) {
                        // if ($data->order->user) {
                        //     return $data->order->user->name;
                        // } else {
                        //     return '---';
                        // }
                        return $data->order->code;
                    })
                    ->editColumn('customer_name', function ($data) {
                        if ($data->order->user) {
                            return $data->order->user->name;
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('store_name', function ($data) {
                        if ($data->product->shop) {
                            return $data->product->shop->name;
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('total_cost', function ($data) {
                        // $total_cost = 0;
                        // foreach ($data->order->orderDetails as $details) {
                        //     $total_cost += ((($details->price * $details->quantity) + $details->shipping_cost + $details->packing_cost) - $details->coupon_discount);
                        // }
                        return '$' . $data->order->grand_total;
                    })
                    ->editColumn('status', function ($data) {
                        $content = '';
                        if ($data->order->orderDetails[0]->delivery_status == 'pending') {
                            $content .= '<span class="badge badge-danger">Pending</span>';
                        } else if ($data->order->orderDetails[0]->delivery_status == 'accepted') {
                            $content .= '<span class="badge badge-warning">Accepted</span>';
                        } else if ($data->order->orderDetails[0]->delivery_status == 'processing') {
                            $content .= '<span class="badge badge-info">Processing</span>';
                        } else if ($data->order->orderDetails[0]->delivery_status == 'shipped') {
                            $content .= '<span class="badge badge-info">Shipped</span>';
                        } else if ($data->order->orderDetails[0]->delivery_status == 'delivered') {
                            $content .= '<span class="badge badge-success">Delivered</span>';
                        }
                        return $content;
                    })
                    ->editColumn('action', function ($data) {
                        return '<a href="' . route('service.store.order.details', ['id' => $data->order->orderDetails[0]->seller_id, 'order_id' => $data->order->id]) . '" class="btn btn-sm btn-primary">Details</a>';
                    })
                    ->rawColumns(['customer_name', 'items', 'total_cost', 'status', 'action'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $service = ServiceCategory::where('id', $id)->first();
        $page = 'manage_service';
        $service_id = $id;
        return view('superadmin.sellers.manage_service.service_order_list', compact('page', 'service_id', 'service'));
    }

    //Transport..
    public function transportServiceList()
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_category_list = ServiceCategory::whereIn('category_type', [1,5])->get();
            $page = 'manage_transport_service';
            return view('superadmin.transport.manage_service.service_list', compact('service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function addTransportService()
    {
        $page = 'manage_transport_service';
        return view('superadmin.transport.manage_service.add_service', compact('page'));
    }

    public function addTransportServiceSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'icon' => 'required',
            'category_type' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'color' => $request->color,
            'category_type' => $request->category_type
        ];
        $token = Cache::get('api_token');
        if ($token) {
            $add_service = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('icon')) {
                $add_service = $add_service->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $add_service = $add_service->post($this->getApiUrl() . 'superadmin/addservice', $data);
            $add_service = json_decode($add_service);
            if ($add_service) {
                return redirect()->route('transport.service.list')->with('success_message', $add_service->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editTransportService($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $id);

            $service_category = json_decode($service_category);
            $service = null;
            if ($service_category) {
                $service = $service_category->service;
            }
            $page = 'manage_transport_service';
            return view('superadmin.transport.manage_service.edit_service', compact('service', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editTransportServiceSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category_type' => 'required'
        ]);
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'color' => $request->color,
            'category_type' => $request->category_type
        ];
        $token = Cache::get('api_token');
        if ($token) {
            $update_service = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('icon')) {
                $update_service = $update_service->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $update_service = $update_service->post($this->getApiUrl() . 'superadmin/updateservice', $data);
            $update_service = json_decode($update_service);
            if ($update_service) {
                return redirect()->route('transport.service.list')->with('success_message', $update_service->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function driverList($id, Request $request)
    {
        try{
            if ($request->ajax()) {
                $token = Cache::get('api_token');
                if ($token) {
                    $categoryFilter = SellerService::where('service_category_id', $id)->distinct()->pluck('seller_id');
                    $data = User::with('driver.vehicle_type')->with('seller_services')
                            ->where('user_type','driver')->whereIn('id',$categoryFilter)
                            ->get();

                    foreach ($data as $driver) {
                        foreach ($driver->seller_services as $service) {
                            if ($service->service_category_id == $id) $driver->currentSellerService = $service;
                        }
                    }
                    return Datatables::of($data)
                        ->addIndexColumn()
                        ->editColumn('name', function ($data) {
                            return $data->name;
                        })
                        ->addColumn('rides', function ($data) use ($id) {
                            return '<a href="' . route('transport.service.driver.rides.list', ['id' => $id, 'driver' => $data->id]) . '" style="color:#061880;"><i class="material-icons">two_wheeler</i></a>';
                        })
                        ->addColumn('ratings', function ($data) use ($id) {
                            return '<a href="' . route('transport.service.driver.rating.list', ['id' => $id, 'driver' => $data->id])  . '" style="color:#061880;"><i class="material-icons">star</i></a>';
                        })
                        ->addColumn('documents', function ($data) use ($id) {
                            return '<a href="' . route('transport.service.driver.documents.list', ['id' => $id, 'driver' => $data->id])  . '" style="color:#061880;"><i class="material-icons">description</i></a>';
                        })
                        ->editColumn('action', function ($data) use ($id) {
                            $active = '';
                            $checked = '';
                            if ($data->currentSellerService->status) {
                                $active = 'active';
                                $checked = 'checked';
                            }
                            $switch = '<div class="toggle-btn ' . $active . '">
                                            <input type="checkbox" onclick="approve(' . $data->id . ',' . $id . ')" class="cb-value approve' . $data->id . '" ' . $checked . '/>
                                            <span class="round-btn"></span>
                                        </div>';
                            return $switch;
                        })
                        ->rawColumns(['action', 'rides', 'ratings', 'documents'])
                        ->make(true);
                }
            }
            $service = ServiceCategory::find($id);
            $page = 'manage_transport_service';
            $service_id = $id;
            return view('superadmin.transport.manage_service.driver_list', compact('page', 'service_id', 'service'));
        }catch (\Exception $e) {
            $error = $e->getMessage();
            return view('superadmin.error_page', compact('error'));
        }
    }

    public function transportDashboard($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $dashboard_info = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/transportdashboard/' . $id);
            $dashboard_info = json_decode($dashboard_info);

            $info = null;
            if ($dashboard_info) {
                $info = $dashboard_info->dashboard_info;
            }
            $service_category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $id);

            $service_category = json_decode($service_category);
            $service = null;
            if ($service_category) {
                $service = $service_category->service;
            }
            $page = 'manage_transport_service';
            return view('superadmin.transport.manage_service.transport_dashboard', compact('info', 'service', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function driverRidesList($serviceCategoryId, $driverId, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $drivers = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/' . $serviceCategoryId . '/' . 'rides' . '/' . $driverId);
                $drivers = json_decode($drivers);
                $data = [];
                if ($drivers) {
                    $data = $drivers;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('ride_no', function ($data) {
                        return $data->ride_no;
                    })
                    ->editColumn('customer_name', function ($data) {
                        if (!$data->user) return 'N/A';
                        return $data->user->name;
                    })
                    ->editColumn('driver_name', function ($data) {
                        if (!$data->rider_user) return 'N/A';
                        return $data->rider_user->name;
                    })
                    ->editColumn('total_cost', function ($data) {
                        return $data->total_pay . ' J$';
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 9) return '<span class="btn btn-success">Completed</span>';
                        else if ($data->status == 4) return '<span class="btn btn-danger">Completed</span>';
                        else if ($data->status == 0) return '<span class="btn btn-info">pending</span>';
                        else if ($data->status == 1) return '<span class="btn btn-info">accepted</span>';
                        else if ($data->status == 2) return '<span class="btn btn-info">schedule-accepted</span>';
                        else if ($data->status == 3) return '<span class="btn btn-info">arrived</span>';
                        else if ($data->status == 5) return '<span class="btn btn-info">running</span>';
                        else if ($data->status == 6) return '<span class="btn btn-info">drop</span>';
                        else if ($data->status == 7) return '<span class="btn btn-info">payment</span>';
                        else if ($data->status == 8) return '<span class="btn btn-info">rating</span>';
                        else if ($data->status == 10) return '<span class="btn btn-danger">failed</span>';
                    })
                    ->editColumn('details', function ($data) {
                        return '<a href="' . route('transport.ride.details', ['ride' => $data->id])  . '"><i class="material-icons">info</i></a>';
                    })
                    ->rawColumns(['action', 'status', 'details'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $token = Cache::get('api_token');
        $service_category = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $serviceCategoryId);

        $service_category = json_decode($service_category);
        $service = null;
        if ($service_category) {
            $service = $service_category->service;
        }
        $page = 'manage_transport_service';
        $service_id = $serviceCategoryId;
        return view('superadmin.transport.manage_service.driver_ride_list', compact('page', 'service_id', 'service', 'driverId'));
    }

    public function rideDetails($rideId)
    {
        $token = Cache::get('api_token');
        $rideDetails = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->getApiUrl() . 'superadmin/' . 'ride/' . $rideId);
        $rideDetails = json_decode($rideDetails);
        // return $rideDetails;
        $page = 'manage_transport_service';
        return view('superadmin.transport.manage_service.ride_details', compact('page', 'rideDetails'));
    }

    public function rideList($serviceCategoryId, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $drivers = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/' . $serviceCategoryId . '/rides');
                $drivers = json_decode($drivers);
                $data = [];
                if ($drivers) {
                    $data = $drivers;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('ride_no', function ($data) {
                        return $data->ride_no;
                    })
                    ->editColumn('customer_name', function ($data) {
                        if (!$data->user) return 'N/A';
                        return $data->user->name;
                    })
                    ->editColumn('driver_name', function ($data) {
                        if (!$data->rider_user) return 'N/A';
                        return $data->rider_user->name;
                    })
                    ->editColumn('total_cost', function ($data) {
                        return $data->total_pay . ' J$';
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 9) return '<span class="btn btn-success">Completed</span>';
                        else if ($data->status == 4) return '<span class="btn btn-danger">Cancelled</span>';
                        else if ($data->status == 0) return '<span class="btn btn-warning">pending</span>';
                        else if ($data->status == 1) return '<span class="btn btn-info">accepted</span>';
                        else if ($data->status == 2) return '<span class="btn btn-primary">schedule-accepted</span>';
                        else if ($data->status == 3) return '<span class="btn btn-info">arrived</span>';
                        else if ($data->status == 5) return '<span class="btn btn-info">running</span>';
                        else if ($data->status == 6) return '<span class="btn btn-dark">drop</span>';
                        else if ($data->status == 7) return '<span class="btn btn-info">payment</span>';
                        else if ($data->status == 8) return '<span class="btn btn-info">rating</span>';
                        else if ($data->status == 10) return '<span class="btn btn-danger">failed</span>';
                    })
                    ->editColumn('details', function ($data) {
                        return '<a href="' . route('transport.ride.details', ['ride' => $data->id])  . '" style="color:#061880;"><i class="material-icons">info</i></a>';
                    })
                    ->rawColumns(['action', 'status', 'details'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $token = Cache::get('api_token');
        $service_category = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $serviceCategoryId);

        $service_category = json_decode($service_category);
        $service = null;
        if ($service_category) {
            $service = $service_category->service;
        }
        $page = 'manage_transport_service';
        $service_id = $serviceCategoryId;
        return view('superadmin.transport.manage_service.all_ride_list', compact('page', 'service_id', 'service'));
    }

    public function driverRatingList($servicecategoryId, $driverId, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                /*
                $drivers = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/' . $servicecategoryId . '/' . 'ratings' . '/' . $driverId);
                $drivers = json_decode($drivers);
                $data = [];
                if ($drivers) {
                    $data = $drivers;
                }
                */
                $data = Ride::with('user.driver.user','rider_user','rating')->where('service_category_id',$servicecategoryId)->where('driver_id', $driverId)
                    ->whereHas('rating', function ($q){})->get();

                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('ride_no', function ($data) {
                        return $data->ride_no;
                    })
                    ->editColumn('customer_name', function ($data) {
                        if (!$data->user) return 'N/A';
                        return $data->user->name;
                    })
                    ->editColumn('driver_name', function ($data) {
                        if (!$data->rider_user) return 'N/A';
                        return $data->rider_user->name;
                    })
                    ->addColumn('rating', function ($data) {
                        if (!$data->rating) return 'N/A';
                        return  '<p style="font-size:28px;color:#061880;"><i class="material-icons">star</i> ' . $data->rating->rating . ' </p>';
                    })
                    ->addColumn('comment', function ($data) {
                        if (!$data->rating) return 'N/A';
                        return $data->rating->comment;
                    })
                    ->addColumn('datetime', function ($data) {
                        if (!$data->rating) return 'N/A';
                        return $data->rating->created_at;
                    })
                    ->rawColumns(['action', 'rating'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $token = Cache::get('api_token');
        $service_category = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $servicecategoryId);

        $service_category = json_decode($service_category);
        $service = null;
        if ($service_category) {
            $service = $service_category->service;
        }
        $page = 'manage_transport_service';
        $service_id = $servicecategoryId;
        return view('superadmin.transport.manage_service.driver_rating_list', compact('page', 'service_id', 'service', 'driverId'));
    }

    public function allDrivers(Request $request)
    {
        // $token = Cache::get('api_token');
        // $drivers = Http::withHeaders([
        //     'Authorization' => 'Bearer ' . $token
        // ])->get($this->getApiUrl() . 'superadmin/all-drivers');
        // $drivers = json_decode($drivers);
        // return $drivers;
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $drivers = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/all-drivers');
                $drivers = json_decode($drivers);
                $data = [];
                if ($drivers) {
                    $data = $drivers;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('name', function ($data) {
                        return $data->name;
                    })
                    ->editColumn('action', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->driver->varification_status == 1) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="approve(' . $data->driver->id . ')" class="cb-value approve' . $data->driver->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->rawColumns(['action', 'gender', 'ratings'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }

        $page = 'manage_rider_list';
        return view('superadmin.transport.manage_service.all_driver_list', compact('page'));
    }

    public function allRideList(Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $drivers = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/all-rides');
                $drivers = json_decode($drivers);
                $data = [];
                if ($drivers) {
                    $data = $drivers;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->editColumn('ride_no', function ($data) {
                        return $data->ride_no;
                    })
                    ->editColumn('customer_name', function ($data) {
                        if (!$data->user) return 'N/A';
                        return $data->user->name;
                    })
                    ->editColumn('driver_name', function ($data) {
                        if (!$data->rider_user) return 'N/A';
                        return $data->rider_user->name;
                    })
                    ->editColumn('total_cost', function ($data) {
                        return $data->total_pay . ' J$';
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 9) return '<span class="btn btn-success">Completed</span>';
                        else if ($data->status == 4) return '<span class="btn btn-danger">Cancelled</span>';
                        else if ($data->status == 0) return '<span class="btn btn-warning">pending</span>';
                        else if ($data->status == 1) return '<span class="btn btn-info">accepted</span>';
                        else if ($data->status == 2) return '<span class="btn btn-primary">schedule-accepted</span>';
                        else if ($data->status == 3) return '<span class="btn btn-info">arrived</span>';
                        else if ($data->status == 5) return '<span class="btn btn-info">running</span>';
                        else if ($data->status == 6) return '<span class="btn btn-dark">drop</span>';
                        else if ($data->status == 7) return '<span class="btn btn-info">payment</span>';
                        else if ($data->status == 8) return '<span class="btn btn-info">rating</span>';
                        else if ($data->status == 10) return '<span class="btn btn-danger">failed</span>';
                    })
                    ->editColumn('details', function ($data) {
                        return '<a href="' . route('transport.ride.details', ['ride' => $data->id])  . '" style="color:#061880;"><i class="material-icons">info</i></a>';
                    })
                    ->rawColumns(['action', 'status', 'details'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_ride_list';
        return view('superadmin.transport.manage_service.absulately_all_ride_list', compact('page'));
    }

    public function driverDocumentsList($serviceCategoryId, $driverId)
    {
        try{
            $user = User::with('seller_services.documents.required_document','seller_services.documents.doc_file')->find($driverId);
            $requiredDocuments = RequiredDocument::where('service_category_id',$serviceCategoryId)->get();
            $documents = new \stdClass();
            $documents->user = $user;
            $documents->requiredDocuments = $requiredDocuments;
            $page = 'manage_transport_service';
            return view('superadmin.transport.manage_service.documents', compact('page', 'documents'));
        }catch (\Exception $e) {
            $error = $e->getMessage();
            return view('superadmin.error_page', compact('error'));
        }
    }
    //Transport End..

    //Worker Start..
    public function workerServiceList()
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_category_list = ServiceCategory::whereIn('category_type', [3])->get();
            $page = 'manage_worker_service';
            return view('superadmin.worker.service_list', compact('service_category_list', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    // addWorkerService
    public function addWorkerService()
    {
        $page = 'manage_worker_service';
        return view('superadmin.worker.add_service', compact('page'));
    }

    public function addWorkerServiceSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'icon' => 'required',
            'category_type' => 'required'
        ]);
        $data = [
            'name' => $request->name,
            'color' => $request->color,
            'category_type' => $request->category_type
        ];
        $token = Cache::get('api_token');
        if ($token) {
            $add_service = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('icon')) {
                $add_service = $add_service->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $add_service = $add_service->post($this->getApiUrl() . 'superadmin/addservice', $data);
            $add_service = json_decode($add_service);
            if ($add_service) {
                return redirect()->route('worker.service.list')->with('success_message', $add_service->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editWorkerService($id)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $service_category = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $id);

            $service_category = json_decode($service_category);
            $service = null;
            if ($service_category) {
                $service = $service_category->service;
            }
            $page = 'manage_worker_service';
            return view('superadmin.worker.edit_service', compact('service', 'page'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function editWorkerServiceSubmit(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'category_type' => 'required'
        ]);
        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'color' => $request->color,
            'category_type' => $request->category_type
        ];
        $token = Cache::get('api_token');
        if ($token) {
            $update_service = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ]);
            if ($request->file('icon')) {
                $update_service = $update_service->attach('icon_img', file_get_contents($request->file('icon')), $request->file('icon')->getClientOriginalName());
            }
            $update_service = $update_service->post($this->getApiUrl() . 'superadmin/updateservice', $data);
            $update_service = json_decode($update_service);
            if ($update_service) {
                return redirect()->route('worker.service.list')->with('success_message', $update_service->message);
            } else {
                return redirect()->back()->with('error_message', 'Something went wrong');
            }
        } else {
            return redirect()->route('super.admin.login');
        }
    }
    // 
    public function workerStoreList($id, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $stores = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/storelist/' . $id);
                $stores = json_decode($stores);
                // dd($stores);
                $data = [];
                if ($stores) {
                    $data = $stores;
                }
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('id', function ($data) {
                        return $data->shop->id;
                    })
                    ->editColumn('name', function ($data) {
                        return $data->shop->name;
                    })
                    ->editColumn('logo', function ($data) {
                        if ($data->shop->logo_img) {
                            return '<img src="https://beedamall.com/public/' . $data->shop->logo_img->file_name . '" style="width:60px;"/>';
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('products', function ($data) {
                        if (count($data->shop->total_products) > 0) {
                            return '<a href="' . route('worker.service.store.product.list', ['id' => $data->shop->id]) . '" class="btn btn-sm btn-info">View (' . count($data->shop->total_products) . ')</a>';
                        } else {
                            return count($data->shop->total_products);
                        }
                    })
                    ->editColumn('orders', function ($data) {
                        return '<a href="' . route('service.store.order.list', ['id' => $data->shop->id]) . '" style="color:#061880;"><i class="material-icons">shopping_cart</i></a>';
                    })
                    ->editColumn('documents', function ($data) {
                        return '<a href="' . route('service.store.document.list', ['id' => $data->shop->id]) . '" style="color:#061880;"><i class="material-icons">description</i></a>';
                    })
                    ->editColumn('status', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->status) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="approve(' . $data->id . ')" class="cb-value approve' . $data->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->editColumn('featured', function ($data) {
                        $active = '';
                        $checked = '';
                        if ($data->shop->is_featured) {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn ' . $active . '">
                                        <input type="checkbox" onclick="feature(' . $data->shop->id . ')" class="cb-value feature' . $data->shop->id . '" ' . $checked . '/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->rawColumns(['logo', 'products', 'orders', 'documents', 'status', 'featured'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $token = Cache::get('api_token');
        $service_category = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get($this->getApiUrl() . 'superadmin/servicebyid/' . $id);

        $service_category = json_decode($service_category);
        $service = null;
        if ($service_category) {
            $service = $service_category->service;
        }
        // return $service->category_type;
        $page = 'manage_worker_service';
        $service_id = $id;
        return view('superadmin.worker.store_list', compact('page', 'service_id', 'service'));
    }

    public function workerProductList($id, Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $products = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/storeproductlist/' . $id);
                $products = json_decode($products);
                $data = [];
                if ($products) {
                    $data = $products->products;
                }
                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('product_image', function ($data) {
                        if ($data->thumbnail_image) {
                            return '<img src="'. assetUrl() . $data->thumbnail_image->file_name . '" style="width:60px;"/>';
                        } else {
                            return '---';
                        }
                    })
                    ->editColumn('category', function ($data) {
                        if ($data->category) {
                            return $data->category->name;
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
                    ->rawColumns(['product_image', 'category', 'published', 'tabed', 'featured', 'todays_deal'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_service';
        $shop_id = $id;
        return view('superadmin.sellers.manage_service.store_product_list', compact('page', 'shop_id'));
    }

    //Worker End..

}
