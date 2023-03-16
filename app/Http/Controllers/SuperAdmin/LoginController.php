<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;

class LoginController extends Controller
{
    use ApiUrl;

    public function login()
    {
        return view('superadmin.login.login');
    }

    public function loginSubmit(Request $request)
    {
        $validate = $request->validate([
            'contact_number' => 'required',
            'password' => 'required'
        ]);
        $data = [
            'phone' => $request->contact_number,
            'password' => $request->password,
        ];
        $login = Http::post($this->getApiUrl().'auth/seller-login', $data);
        $response = json_decode($login);
        if($response && $response->status)
        {
            setToken($response->data->access_token);
            session()->put('super_user_info', $response->data);
            return redirect()->route('super.admin.dashbaord')->with('success_message', $response->message);

        }
        else
        {
            return redirect()->back()->with('error_message', $response->message);
        }
    }

    public function logout()
    {
        session()->forget('super_user_info');
        $logout = Http::withHeaders([
            'Authorization' => 'Bearer ' . getToken()
        ])->post($this->getApiUrl() . 'auth/logout');
        forgetToken();
        return redirect()->route('super.admin.login');
    }
}
