<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessSetting;
use App\Constants\BusinessSettingTypes;
use App\Currency;

class SettingController extends Controller
{
    public function rewardPoint()
    {
        $data = BusinessSetting::where('type',BusinessSettingTypes::DOLLAR_AGAINST_ONE_REWARD)->first();
        $currencies = Currency::get();
        $page = 'reward_point_settings';
        return view('superadmin.settings.reward-point',compact('data','page','currencies'));
    }

    public function rewardPointUpdate(Request $request)
    {
        Currency::find($request->currency)->update(['reward_point_exchange_rate'=>$request->exchange_rate]);
        BusinessSetting::where('type',BusinessSettingTypes::DOLLAR_AGAINST_ONE_REWARD)->update(['value'=>$request->required_purchase]);
        return redirect()->back()->with('success_message','Reward Point Settings Updated Successfully');
    }
}
