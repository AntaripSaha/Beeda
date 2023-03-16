<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use Yajra\DataTables\Facades\DataTables;

class WalletController extends Controller
{
    use ApiUrl;

    public function index(Request $request)
    {
        $token = getToken();
        $wallet = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post($this->getApiUrl() . 'my-wallet/seller', [
            'user_id' => session()->get('user_info')->user_id
        ]);
        $wallet = json_decode($wallet);
        $parent = 'seller';
        $page = 'seller-wallet';
        return view('store_owner.wallet.wallet', compact('page', 'parent', 'wallet'));
    }

    public function personalAccount(Request $request)
    {
        if ($request->ajax()) {
            $token = getToken();
            if ($token) {
                $transections = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/wallet/index');
                $transections = json_decode($transections);
                $data = [];
                if ($transections) {
                    foreach ($transections as $transection)  if ($transection->user_id == session()->get('user_info')->user_id) array_push($data, $transection);
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        return $data->user->name;
                    })
                    ->addColumn('service_category_name', function ($data) {
                        if (!$data->service_category_id) return 'N/A';
                        return $data->service_category->name;
                    })
                    ->addColumn('associate_user', function ($data) {
                        if (!$data->associateUser) return 'N/A';
                        return $data->associateUser->name;
                    })
                    ->editColumn('type', function ($data) {
                        if ($data->type == 1) return '<span class="badge badge-info">In</span>';
                        return '<span class="badge badge-primary">Out</span>';
                    })
                    ->editColumn('payment_method', function ($data) {
                        // if (!$data->payment_method) return 'N/A';
                        // if ($data->payment_method == 1) return '<span class="badge badge-warning">Debit Card</span>';
                        // if ($data->payment_method == 2) return '<span class="badge badge-warning">Credit Card</span>';
                        // return '<span class="badge badge-warning">Other</span>';
                        return '<span class="badge badge-success">'.$data->payment_method.'</span>';
                    })
                    ->editColumn('payment_type', function ($data) {
                        if (!$data->payment_type) return 'N/A';
                        if ($data->payment_type == 1) return '<span class="badge badge-success">Online</span>';
                        if ($data->payment_type == 2) return '<span class="badge badge-info">Offline</span>';
                        if ($data->payment_type == 3) return '<span class="badge badge-info">Account Transfer</span>';
                        if ($data->payment_type == 4) return '<span class="badge badge-info">Bank Trabsfer</span>';
                        return '<span class="badge badge-warning">Other</span>';
                    })
                    ->editColumn('ammount', function ($data) {
                        return number_format($data->ammount, 2);
                    })
                    ->editColumn('created_at', function ($data) {
                        return date('d-M-Y', strtotime($data->created_at));
                    })
                    ->rawColumns(['action', 'type', 'payment_type', 'payment_method'])
                    ->make(true);
            }
        }
    }

    public function storeAccount(Request $request)
    {
        if ($request->ajax()) {
            $token = getToken();
            if ($token) {
                $transections = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/wallet/store-account');
                $transections = json_decode($transections);
                $data = [];
                if ($transections) {
                    foreach ($transections as $transection)  if ($transection->user_id == session()->get('user_info')->user_id) array_push($data, $transection);
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        return $data->user->name;
                    })
                    ->addColumn('shop_name', function ($data) {
                        if (!$data->shop) return 'N/A';
                        return $data->shop->name;
                    })
                    ->editColumn('type', function ($data) {
                        if ($data->type == 1) return '<span class="badge badge-info">In</span>';
                        return '<span class="badge badge-primary">Out</span>';
                    })
                    ->editColumn('payment_method', function ($data) {
                        // if (!$data->payment_method) return 'N/A';
                        // if ($data->payment_method == 1) return '<span class="badge badge-warning">Debit Card</span>';
                        // if ($data->payment_method == 2) return '<span class="badge badge-warning">Credit Card</span>';
                        // return '<span class="badge badge-warning">Other</span>';
                        return '<span class="badge badge-success">'.$data->payment_method.'</span>';
                    })
                    ->editColumn('payment_type', function ($data) {
                        if (!$data->payment_type) return 'N/A';
                        if ($data->payment_type == 1) return '<span class="badge badge-success">Online</span>';
                        if ($data->payment_type == 2) return '<span class="badge badge-info">Offline</span>';
                        if ($data->payment_type == 3) return '<span class="badge badge-info">Account Transfer</span>';
                        if ($data->payment_type == 4) return '<span class="badge badge-info">Bank Trabsfer</span>';
                        return '<span class="badge badge-warning">Other</span>';
                    })
                    ->editColumn('ammount', function ($data) {
                        return number_format($data->amount, 2);
                    })
                    ->editColumn('created_at', function ($data) {
                        return date('d-M-Y', strtotime($data->created_at));
                    })
                    ->rawColumns(['action', 'type', 'payment_type', 'payment_method'])
                    ->make(true);
            }
        }
    }

    public function qrCode()
    {
        $token = getToken();
        $wallet = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post($this->getApiUrl() . 'my-wallet/seller', [
            'user_id' => session()->get('user_info')->user_id
        ]);
        $wallet = json_decode($wallet);
        $parent = 'seller';
        $page = 'seller-wallet-qr';
        return view('store_owner.wallet.qr-code', compact('page', 'parent', 'wallet'));
    }
}
