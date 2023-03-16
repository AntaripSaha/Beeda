<?php

namespace App\Http\Controllers;

use App\Constants\ServiceCategoryType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use App\Models\User;
use App\SellerService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use ApiUrl;

    public function login()
    {
        return view('login.login');
    }

    public function loginPost(Request $request)
    {
        $validate = $request->validate([
            'contact_number' => 'required',
            'password' => 'required'
        ]);
        $data = [
            'phone' => $request->full_number,
            'password' => $request->password,
            'device_token' => $request->device_token
        ];
        $login = Http::post($this->getApiUrl().'auth/seller-login', $data);
        $response = json_decode($login);
        if($response && $response->status == false)
        {
            return redirect()->route('login.login')->with('error_message', $response->message);
        }
        else if($response && $response->status == true)
        {
            $response = $response->data;
            $modifiedRequest = ['phone' => $request->full_number, 'password' => $request->password];
            Auth::attempt($modifiedRequest);
            // set token in cookie
            setToken($response->access_token);
            $token = getToken();
            session()->put('user_info', $response);


            $seller_services = SellerService::with(['service_category', 'shop'=>function($query){
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

    public function logout()
    {
        session()->forget('user_info');
        $logout = Http::withHeaders([
            'Authorization' => 'Bearer ' . getToken()
        ])->post($this->getApiUrl() . 'auth/logout');
        forgetToken();
        auth()->logout();
        return redirect()->route('home.index');
    }
}
