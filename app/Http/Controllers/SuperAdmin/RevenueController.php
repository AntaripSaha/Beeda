<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Revenue;
use Illuminate\Http\Request;
use DB;
use App\Constants\RevenueTypes;
use App\Models\BusinessSetting;
use Yajra\DataTables\Facades\DataTables;

class RevenueController extends Controller
{
    protected $revenueSettings = [
        RevenueTypes::SALE,
        RevenueTypes::WALLET_TO_BANK,
        RevenueTypes::WALLET_TO_MARCHANT,
        RevenueTypes::WALLET_TO_WALLET_TRANSFER,
        RevenueTypes::WALLET_TO_WALLET_TRANSFER_LIMIT,
        RevenueTypes::WALLET_TO_MARCHANT_TRANSFER_LIMIT,
    ];

    public function index(Request $request)
    {
        try{
            if ($request->ajax())
            {
                $revenues = Revenue::with('user')->orderBy('id','desc')->get();
                $data = [];
                if ($revenues) {
                    $data = $revenues;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        if(!$data->user) return 'N/A';
                        return '<a href="/superadmin/customer/' . $data->user->id . '/details" target="_blank">' . $data->user->name . '</a>';
                    })
                    ->addColumn('context', function ($data) {
                        if($data->context == RevenueTypes::SALE) return 'Sales Fee';
                        if($data->context == RevenueTypes::WALLET_TO_BANK) return 'Wallet To Bank Transafer Fee';
                        if($data->context == RevenueTypes::WALLET_TO_MARCHANT) return 'Wallet To Marchant Transafer Fee';
                        if($data->context == RevenueTypes::WALLET_TO_WALLET_TRANSFER) return 'Wallet To Wallet Transafer Fee';
                    })
                    ->editColumn('amount', function ($data) {
                        return number_format($data->amount, 2);
                    })
                    ->addColumn('amount_in_cents', function ($data) {
                        return number_format(($data->amount * 100), 2);
                    })
                    ->editColumn('created_at', function ($data) {
                        return date('F j, Y, g:i a', strtotime($data->created_at));
                    })
                    ->rawColumns(['user'])
                    ->addIndexColumn()
                    ->make(true);
            }
            $totalRevenueFromSales = Revenue::where('context',RevenueTypes::SALE)->sum('amount');
            $totalRevenueFromTransactions = Revenue::where('context','!=',RevenueTypes::SALE)->sum('amount');
            $totalRevenue = Revenue::sum('amount');
            $page = 'revenue';
            return view('superadmin.revenue.index', compact('page','totalRevenue','totalRevenueFromSales','totalRevenueFromTransactions'));
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }

    public function settings()
    {
        try{
            $settings = BusinessSetting::whereIn('type',$this->revenueSettings)->get();
            $data = [];
            foreach ($settings as $setting) $data[$setting->type] = [$setting->value,$setting->id];
            $page = 'revenue_settings';
            return view('superadmin.revenue.settings', compact('page','data'));
        }catch (\Exception $e) {
            return failedResponse($e->getMessage());
        }
    }

    public function updateSettings(Request $request)
    {
        try{
            DB::beginTransaction();
            foreach($this->revenueSettings as $setting){
                $businessSettings = BusinessSetting::where('type',$setting)->first();
                $businessSettings->value = $request[$setting];
                $businessSettings->update();
            }
            DB::commit();
            return redirect()->back()->with('success_message', 'Settings updated successfully');
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error_message', 'Something went wrong');
        }
    }
}
