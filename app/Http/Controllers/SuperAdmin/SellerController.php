<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Models\SellerDocument;
use App\Models\SellerRequiredDocument;
use Yajra\DataTables\Facades\DataTables;
use App\User;
use App\Seller;
use Illuminate\Support\Facades\Auth;
class SellerController extends Controller
{
    use ApiUrl;
    public function sellerList(Request $request)
    {

        $data = User::with('seller_shops','seller')->where('user_type', 'seller')->orWhere('state', 'seller_not_verified')->get();
        if($request->ajax())
        {
            $token = getToken();
            if($token)
            {

                return Datatables::of($data)
                    // ->addIndexColumn()
                    ->editColumn('name', function($data){
                        return '<a href="/seller-details/'. $data->id .'" title="View Details" style="color:#061880;" onclick="deleteCoupon('.$data->id.')">'.$data->name.'</a>';
                    })
                    ->editColumn('store_name', function($data){
                        $shop_names = '';
                        foreach($data->seller_shops as $shop)
                        {
                            $shop_names .= $shop->name."<br>";
                        }
                        return $shop_names;
                    })
                    ->editColumn('documents', function($data){
                        return '<a href="' . route('seller.document.list', ['id' => $data->id]) . '" style="color:#061880;"><i class="material-icons">description</i></a>';
                    })
                    ->editColumn('status', function($data){
                        $active = '';
                        $checked = '';
                        if($data->seller && $data->seller->verification_status == 1)
                        {
                            $active = 'active';
                            $checked = 'checked';
                        }
                        $switch = '<div class="toggle-btn '.$active.'">
                                        <input type="checkbox" onclick="approve('.$data->id.')" class="cb-value approve'.$data->id.'" '.$checked.'/>
                                        <span class="round-btn"></span>
                                    </div>';
                        return $switch;
                    })
                    ->rawColumns(['store_name', 'documents', 'status', 'name'])
                    ->make(true);

            }
            else
            {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'manage_seller';
        return view('superadmin.sellers.manage_seller.seller_list', compact('page'));
    }

    public function sellerDocumentList($id)
    {
        $token = getToken();
        if ($token) {
            $documents = SellerDocument::with(['seller', 'document_name', 'document_img'])
                ->select('id', 'seller_id', 'seller_required_document_id', 'document_image')
                ->where('seller_id', $id)->get();
            $required_docs = SellerRequiredDocument::all();
            $page = 'manage_service';
            return view('superadmin.sellers.manage_seller.seller_document_list', compact('page', 'documents', 'required_docs'));
        } else {
            return redirect()->route('super.admin.login');
        }
    }

    public function approveSeller(Request $request)
    {
        $token = getToken();
        if ($token) {

            $seller = Seller::where('user_id', $request->seller_id)->first();
            $seller->verification_status = !$seller->verification_status;
            $seller->update();
            if ($seller->verification_status) {
                $user = User::where('id', $request->seller_id)->first();
                $user->state = 'active';
                $user->user_type = 'seller';
                $user->save();
                SellerDocument::where('seller_id', $request->seller_id)->update(['status'=> 1]);
            }
            return 1;
        } else {
            return redirect()->route('super.admin.login');
        }
    }
    public function details(Request $request,$id)
    {
        try{
            $user = User::with('transactions','orders')->find($id);
            $page = 'manage_seller';
            return view('superadmin.sellers.manage_seller.details',compact('page','user'));
        }catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e->getMessage());
        }
    }
    public function login($id){
        session()->forget('user_info');
        $logout = Http::withHeaders([
            'Authorization' => 'Bearer ' . getToken()
        ])->post($this->getApiUrl() . 'auth/logout');
        Cache::forget('api_token');
        auth()->logout();
        // $user = User::find($id);
        // $data = [
        //     'phone' => $user->full_number,
        // ];
        $data = [
            'id' => $id,
        ];
        $login = Http::post($this->getApiUrl().'auth/login-as-seller', $data);
        $response = json_decode($login);
        // dd($response->status);
        if($response && $response->status == false)
        {
            return redirect()->route('login.login')->with('error_message', $response->message);
        }
        else if($response && $response->status == true)
        {
            $response = $response->data;
            // $modifiedRequest = ['phone' => $response->phone, 'password' => $response->password];
            // Auth::attempt($modifiedRequest);

            Cache::put('api_token', $response->access_token);
            $token = getToken();
            session()->put('user_info', $response);
            $seller_services = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'sellerservices/'.session()->get('user_info')->user_id);
            $seller_services = json_decode($seller_services)->seller_services;
            $selected_services_ids = [];
            $total_shops = 0;
            foreach($seller_services as $service)
            {
                if($service->shop != null || $service->service_category_id == 34)
                {
                    $total_shops++;
                }
                $selected_services_ids[] = $service->service_category_id;
            }
            if(count($selected_services_ids) > 0 && $total_shops >= 1)
            {
                return redirect()->route('dashboard.index')->with('success_message', 'You are logged in successfully');
            }
            else
            {
                if ($response->state == 'email_not_verified')
                {
                    return redirect()->route('register.storeEmailVerifyGet');
                } elseif ($response->state == 'phone_not_verified') {
                    return redirect()->route('register.storePhoneVerifyGet');
                } else {
                    return redirect()->route('register.storeRegisterGet');
                }

            }


        }
        else
        {
            return redirect()->route('login.login')->with('error_message', 'Phone number or password is incorrect');
        }
    }
}
