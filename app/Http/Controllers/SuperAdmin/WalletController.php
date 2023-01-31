<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use App\Http\Traits\ApiUrl;
use Yajra\DataTables\Facades\DataTables;
use App\WalletPinResetRequest;
use App\Models\User;
use App\Transaction;

class WalletController extends Controller
{
    use ApiUrl;

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $transections = Transaction::with('user')->with('service_category')->orderBy('id','desc')->get();
                foreach($transections as $transection)
                {
                    $associateUser = null;
                    if($transection->associate) $associateUser = User::find($transection->associate);
                    $transection->associateUser = $associateUser;
                }
                $data = [];
                if ($transections) {
                    $data = $transections;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        if($data->user) return  '<a href="/superadmin/customer/' . $data->user->id . '/details" target="_blank">' . $data->user->name . '</a>';
                        return 'N/A';
                    })
                    ->addColumn('service_category_name', function ($data) {
                        if (!$data->service_category_id) return 'N/A';
                        return $data->service_category->name;
                    })
                    ->addColumn('associate_user', function ($data) {
                        if (!$data->associateUser) return 'N/A';
                        return  '<a href="/superadmin/customer/' . $data->associateUser->id . '/details" target="_blank">' . $data->associateUser->name . '</a>';
                    })
                    ->editColumn('type', function ($data) {
                        if ($data->type == 1) return '<span class="badge badge-info">In</span>';
                        return '<span class="badge badge-primary">Out</span>';
                    })
                    ->editColumn('payment_method', function ($data) {
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
                    ->rawColumns(['action', 'type', 'payment_type', 'payment_method','associate_user','user'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }

        $page = 'wallet_index';
        return view('superadmin.wallet.index', compact('page'));
    }

    public function bankTransfer(Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $transections = Http::withHeaders([
                    'Authorization' => 'Bearer ' . $token
                ])->get($this->getApiUrl() . 'superadmin/wallet/bank-transfer');
                $transections = json_decode($transections);
                $data = [];
                if ($transections) {
                    $data = $transections;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        return $data->user->name;
                    })
                    ->editColumn('status', function ($data) {
                        if ($data->status == 1) return '<span class="badge badge-warning">Pending</span>';
                        elseif ($data->status == 2) return '<span class="badge badge-success">Approved</span>';
                        return '<span class="badge badge-danger">Rejected</span>';
                    })
                    ->editColumn('amount', function ($data) {
                        return number_format($data->amount, 2);
                    })
                    ->addColumn('action', function ($data) {
                        if ($data->status == 2) return '<button type="button" class="btn btn-success">Approved</button>';
                        if ($data->status == 3) return '<button type="button" class="btn btn-danger">Rejected</button>';
                        $switch = '<select id="status-' . $data->id . '" class="form-select form-control" style="cursor: pointer" onchange="changeStatus(' . $data->id . ')">
                            <option value="1" ' . ($data->status == 1 ? 'selected' : '') . ' >Pending</option>
                            <option value="2" ' . ($data->status == 2 ? 'selected disabled' : '') . '>Approved</option>
                            <option value="3" ' . ($data->status == 3 ? 'selected disabled' : '') . '>Rejected</option>
                      </select>';
                        return $switch;
                    })
                    ->rawColumns(['action', 'status'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }
        $page = 'bank_transfer';
        return view('superadmin.wallet.bank_transfer', compact('page'));
    }

    public function bankTransferStatus(Request $request)
    {
        $token = Cache::get('api_token');
        if ($token) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->post($this->getApiUrl() . 'superadmin/wallet/bank-transfer/status', [
                'id' => $request->id,
                'status' => $request->status
            ]);
            return $response;
        }
        return redirect()->route('super.admin.login');
    }

    public function qrCode()
    {
        $token = Cache::get('api_token');
        if ($token) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token
            ])->get($this->getApiUrl() . 'superadmin/wallet/all-sellers');
            $sellers = json_decode($response);
            $page = 'qr-code';
            return view('superadmin.wallet.qr-code', compact('sellers', 'page'));
        }
    }

    public function pinResetRequests(Request $request)
    {
        if ($request->ajax()) {
            $token = Cache::get('api_token');
            if ($token) {
                $pinResetRequests = WalletPinResetRequest::with('user')->orderBy('id', 'desc')->get();
                if ($pinResetRequests) {
                    $data = $pinResetRequests;
                }
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($data) {
                        if(!$data->user) return 'N/A';
                        if($data->user) return  '<a href="/superadmin/customer/' . $data->user->id . '/details" target="_blank">' . $data->user->name . '</a>';
                    })
                    ->editColumn('device', function ($data) {
                        if ($data->device==1) return '<span class="badge badge-warning">Android</span>';
                        return '<span class="badge badge-success">IOS</span>';
                    })
                    ->editColumn('created_at', function ($data) {
                        return date('d-M-Y | h:i a', strtotime($data->created_at));
                    })
                    ->addColumn('action', function ($data) {
                        if($data->status=='Pending')
                        {
                            return '<a href="details/' . $data->id .'" onclick="return confirm("Are you sure?")" class="btn btn-dark">Transaction History</a>'. 
                            '<a href="approve-pin-request/' . $data->id .'" onclick="return confirm("Are you sure?")" class="btn btn-primary">Approve Pin Reset Request</a>';
                        }  
                        return '<a href="details/' . $data->id .'" onclick="return confirm("Are you sure?")" class="btn btn-dark">Transaction History</a>'.
                        '<div  class="badge badge-success">Approved</div>';
                    })
                    ->rawColumns(['action','device','user'])
                    ->make(true);
            } else {
                return redirect()->route('super.admin.login');
            }
        }

        $page = 'wallet_pin_reset_requests';
        return view('superadmin.wallet.pin_request_request', compact('page'));
    }

    public function approvePinRequest($id)
    {
        $pinRequest = WalletPinResetRequest::find($id);
        $user = User::find($pinRequest->user_id);
        $user->pin = null;
        $user->update();
        $pinRequest->status = 'Approved';
        $pinRequest->update();
        return redirect()->back()->with('success_message', 'Pin reset request approved successfully!');
    }

    public function details(Request $request,$id)
    {
        if ($request->ajax()) {
            $pinRequest = WalletPinResetRequest::with('user')->find($id);
            $transactions = Transaction::with('user','associated_user')->where('user_id', $pinRequest->user_id)->orderBy('id', 'desc')->get();
            $data = [];
            if ($transactions) {
                $data = $transactions;
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
                ->addColumn('associated_user', function ($data) {
                    if (!$data->associated_user) return 'N/A';
                    return $data->associated_user->name;
                })
                ->editColumn('type', function ($data) {
                    if ($data->type == 1) return '<span class="badge badge-success">In</span>';
                    return '<span class="badge badge-danger">Out</span>';
                })
                ->editColumn('payment_method', function ($data) {
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
        $pinRequest = WalletPinResetRequest::with('user')->find($id);
        
        $page = 'wallet_pin_reset_requests';
        return view('superadmin.wallet.transaction_history',compact('pinRequest','page'));
    }

    public function transactionDetails(Request $request,$id)
    {
        if ($request->ajax()) {
            $transactions = Transaction::with('user','associated_user')->where('user_id', $id)->orderBy('id', 'desc')->get();
            $data = [];
            if ($transactions) {
                $data = $transactions;
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
                ->addColumn('associated_user', function ($data) {
                    if (!$data->associated_user) return 'N/A';
                    return $data->associated_user->name;
                })  
                ->editColumn('type', function ($data) {
                    if ($data->type == 1) return '<span class="badge badge-success">In</span>';
                    return '<span class="badge badge-danger">Out</span>';
                })
                ->editColumn('payment_method', function ($data) {
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
        $user = User::find($id);
        
        $page = 'manage_customer';
        return view('superadmin.wallet.users_transaction_history',compact('user','page'));
    }
}
