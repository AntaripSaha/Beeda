<?php

namespace App\Http\Controllers;

use App\Constants\EmailTypes;
use App\Constants\SmsTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Models\User;
use App\Services\EmailDispatchService;
use App\Services\SmsDispatchService;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    use ApiUrl;

    private $emailDispatchService;

    public function __construct(EmailDispatchService $emailDispatchService, SmsDispatchService $smsDispatchService)
    {
        $this->emailDispatchService = $emailDispatchService;
        $this->smsDispatchService = $smsDispatchService;
    }

    public function register()
    {
        return view('register.register');
    }

    public function registerPost(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required | email',
            'contact_numbers' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'phone' => $request->full_number,
            'select_country_code' => $request->country_code,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'password' => $request->password,
            'device_token' => $request->device_token,
            'select_language' => $request->selected_lang?$request->selected_lang:'en'
        ];
        $register = Http::post($this->getApiUrl().'auth/seller_signup', $data);
        $response = json_decode($register);
        if($response && !$response->status)
        {
            return redirect()->back()->with('error_message', $response->message[0]);
        }
        if($response->message == "successfully!")
        {
            setToken($response->data->access_token);
            session()->put('user_info', $response->data);
//            if ($response->data->state == 'email_not_verified')
//            {
//                $user = User::find($response->data->user_id);
//                $this->emailDispatchService->send(EmailTypes::OTP_MAIL,'pial.coder@gmail.com',$user);
//                return redirect()->route('register.storeEmailVerifyGet');
//            } elseif ($response->data->state == 'phone_not_verified') {
//                return redirect()->route('register.storePhoneVerifyGet');
//            }
//            else {
                return redirect()->route('register.storeRegisterGet', ['page_type' => 'service']);
//            }
        }
        return redirect()->back()->with('error_message', $response->message);
    }

    public function storeEmailVerifyGet(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $user = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/info/'.session()->get('user_info')->user_id);
            $user = json_decode($user)->data[0];

            if ($user->state == 'active')
            {
                return redirect()->route('dashboard.index');
            } elseif ($user->state == 'phone_not_verified') {

                return redirect()->route('register.storePhoneVerifyGet');
            } else {
                return view('store_register.store_email_verify', compact('user'));
            }

        } else {
            return redirect()->route('login.login');
        }
    }

    public function storePhoneVerifyGet(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $user = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/info/'.session()->get('user_info')->user_id);
            $user = json_decode($user)->data[0];

            if ($user->state == 'active')
            {
                return redirect()->route('dashboard.index');
            } elseif ($user->state == 'email_not_verified') {
                return redirect()->route('register.storeEmailVerifyGet');
            } else {
                return view('store_register.store_phone_verify', compact('user'));
            }

        } else {
            return redirect()->route('login.login');
        }
    }

    public function resent_otp(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $verifyOtp = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'auth/signup/send-otp', ['type' => $request->type]);
            $response = json_decode($verifyOtp);

            return response()->json([
                'status' => $response->status,
                'message' =>$response->message
            ]);
        }
    }

    public function storeEmailVerify(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $verifyOtp = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'auth/signup/verify-otp', ['type' => 'email', 'device_type' => 'web', 'verification_code' => $request->verification_code]);
            $response = json_decode($verifyOtp);

            return $response && $response->status == true ?
            redirect()->route('register.storePhoneVerifyGet')->with('success_message', $response->message) :
            redirect()->route('register.storeEmailVerifyGet')->with('error_message', $response->message);

        } else {
            return redirect()->route('login.login');
        }
    }

    public function storePhoneVerify(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $verifyOtp = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'auth/signup/verify-otp', ['type' => 'phone','verification_code' => $request->verification_code]);
            $response = json_decode($verifyOtp);

            return $response && $response->status == true ?
            redirect()->route('register.storeRegisterGet', ['page_type' => 'service'])->with('success_message', $response->message) :
            redirect()->route('register.storePhoneVerifyGet')->with('error_message', $response->message);

        } else {
            return redirect()->route('login.login');
        }
    }

    public function updatePersonalDetails(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $data = [
                'id' => $request->user_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'contact_number' => $request->contact_number,
                'gender' => $request->gender
            ];
            $user_update = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'seller_profile/update', $data);
            $user_update = json_decode($user_update);
            if($user_update)
            {
                $message = $user_update->message;
            }
            else
            {
                $message = 'Something went wrong';
            }
            $user = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/info/'.session()->get('user_info')->user_id);
            $user = json_decode($user)->data[0];
            $services = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'store-service-category');
            $services = json_decode($services)->data->Sercice_Categorise;
            $seller_services = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'sellerservices/'.session()->get('user_info')->user_id);
            $seller_services = json_decode($seller_services)->seller_services;
            $selected_services_ids = [];
            foreach($seller_services as $service)
            {
                $selected_services_ids[] = $service->service_category_id;
            }
            $page_type = 'service';
            return redirect()->route('register.storeRegisterGet', ['page_type' => $page_type])->with('success_message', $message);
        }
        else
        {
            return redirect()->route('login.login');
        }
    }

    public function storeRegisterGet($page_type = null)
    {
        $token = getToken();
        if($token)
        {
            $user = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'seller/info/'.session()->get('user_info')->user_id);
            $user = json_decode($user)->data[0];
            $services = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'store-service-category');
            $services = json_decode($services)->data->Sercice_Categorise;

            $seller_services = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->get($this->getApiUrl().'sellerservices/'.session()->get('user_info')->user_id);
            $seller_services = json_decode($seller_services)->seller_services;
            $selected_services_ids = [];
            foreach($seller_services as $service)
            {
                $selected_services_ids[] = $service->service_category_id;
            }
            return view('store_register.store_register', compact('user', 'services', 'seller_services', 'selected_services_ids', 'page_type'));
        }
        else
        {
            return redirect()->route('login.login');
        }

    }

    public function addServices(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $data = [
                'seller_id' => $request->service_user_id,
                'service_category_id' => $request->service_category_id
            ];
            $store_services = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'add-seller-service-category', $data);
            $page_type = 'store';
            return redirect()->route('register.storeRegisterGet', ['page_type' => $page_type])->with('success_message', 'Service category added successfully');
        }
        else
        {
            return redirect()->route('login.login');
        }
    }

    public function getServiceDocument($id)
    {
        $token = getToken();
        if($token)
        {
            $service_documents = Http::withHeaders([
                'Authorization' => 'Bearer '.$token
            ])->post($this->getApiUrl().'service-category-info/'.$id);
        }
        return response()->json(['service_documents'=>json_decode($service_documents)]);
    }

    public function addStoreDetails(Request $request)
    {
        $token = getToken();
        if($token)
        {
            $store_details = Http::withHeaders([
                'Authorization' => 'Bearer '.$token,
            ]);

            if (isset($request->pickup_status) && $request->pickup_status == 'on') {
                $pickup_status = 1;
            } else {
                $pickup_status = 0;
            }

            // ->attach('store_logo', file_get_contents($request->file('store_logo')), $request->file('store_logo')->getClientOriginalName())
            // ->attach('store_banner', file_get_contents($request->file('store_banner')), $request->file('store_banner')->getClientOriginalName())
            // ->attach('store_banner_mobile', file_get_contents($request->file('store_banner_mobile')), $request->file('store_banner_mobile')->getClientOriginalName());

            if($request->service_document_files && count($request->service_document_files)>0)
            {
                foreach($request->service_document_files as $key => $value)
                {
                    $store_details = $store_details->attach('service_document_files['.$key.']', file_get_contents($value), $value->getClientOriginalName());
                }
            }

            $test_file = public_path().'/'.'test.png';
            $test_file = str_replace("/public","", $test_file);
            $store_details = $store_details->attach('test_img', file_get_contents($test_file), 'test.png');
//            dd($request->user_id);
            $store_details = $store_details->post($this->getApiUrl().'shop/add_seller_shop', [
                ['name' => 'user_id', 'contents' => $request->user_id],
                ['name' => 'service_category_id', 'contents' => $request->service_category_id],
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
                ['name' => 'crop_logo', 'contents' => $request->crop_logo],
                ['name' => 'crop_desktop_logo', 'contents' => $request->crop_desktop_logo],
                ['name' => 'crop_mobile_logo', 'contents' => $request->crop_mobile_logo],
                ['name' => 'request_agent', 'contents' => 'web']
            ]);
            $store_details = json_decode($store_details);

            if($store_details->result && $store_details->result == true)
            {
                return redirect()->back()->with('success_message', $store_details->message);
            } else {
                return redirect()->back()->with('error_message', $store_details->message);
            }

            return redirect()->back();
        }
        else
        {
            return redirect()->route('login.login');
        }
    }
}
