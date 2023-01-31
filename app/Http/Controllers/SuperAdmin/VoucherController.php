<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Currency;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Voucher;
use App\Models\VoucherBatch;
use DataTables;
use \Milon\Barcode\DNS1D;
use \Milon\Barcode\DNS2D;
use App\Exports\VoucherExport;
use App\Mail\VoucherGenerationOTP;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class VoucherController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $batches = VoucherBatch::orderBy('id', 'desc')->get();

            $data = $batches;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('batch_no', function ($data) {
                    return '<b style="color:blue">' . $data->batch_no . '</b>';
                })
                ->editColumn('status', function ($data) {
                    return ucfirst($data->status);
                })
                ->editColumn('activated_at', function ($data) {
                    if ($data->activated_at) return 'N/A';
                    return date_format($data->activated_at, "d-M-Y");
                })
                ->editColumn('created_at', function ($data) {
                    return date_format($data->created_at, "d-M-Y");
                })
                ->editColumn('action', function ($data) {
                    return '<a class="btn btn-primary" href ="/voucher/download-vouchers/' .  $data->id  . '  ">Download Vouchers</a>';
                })
                ->rawColumns(['action', 'batch_no'])
                ->make(true);
        }
        $page = 'voucher';
        $currencies = Currency::get();
        return view('superadmin.voucher.index', compact('page', 'currencies'));
    }

    public function voucherDownload($id)
    {
        return Excel::download(new VoucherExport($id), 'VoucherBatch.xlsx');
    }

    public function generateVoucherBatch(Request $request)
    {
        if ($request->otp != $request->otp_confirm) {
            return redirect()->back()->with('success_message', 'Failed: OTP does not match');
        }

        DB::beginTransaction();
        try {
            $voucherBatch = VoucherBatch::create([
                'batch_no' => $this->batchNo(),
                'voucher_count' => $request->quantity,
                'status' => 'active',
                'currency' => $request->currency,
                'reference' => $request->reference,
                'activated_at' => date('Y-m-d H:i:s')
            ]);

            for ($i = 0; $i < $request->quantity; $i++) $this->generateVoucher($voucherBatch->id, $request->currency);
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        DB::commit();
        return redirect()->back()->with('success_message', 'Voucher Batch Generated Successfully');
    }

    public function activeVouchers(Request $request)
    {
        if ($request->ajax()) {
            $vouchers = Voucher::with('batch', 'user','activator')->whereIn('status', ['active', 'redeemed'])->get();
            foreach ($vouchers as $voucher)  $voucher->currencyName = Currency::find($voucher->currency)->name;
            $data = $vouchers;
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('voucher_no', function ($data) {
                    return '<b style="color:blue">' . $data->voucher_no . '</b>';
                })
                ->editColumn('batch_no', function ($data) {
                    return '<b >' . $data->batch->batch_no . '</b>';
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 'active') return '<b style="background-color:#f2c2bb">' . ucfirst($data->status) . '</b>';
                    if (($data->status == 'redeemed')) return '<b style="background-color:#adf0cf">' . ucfirst($data->status) . '</b>';
                    return ucfirst($data->status);
                })
                ->editColumn('currencyName', function ($data) {
                    if (!$data->currencyName) return 'N/A';
                    return $data->currencyName;
                })
                ->editColumn('redeemed_by', function ($data) {
                    if (!$data->redeemed_by) return 'N/A';
                    return '<a href="/superadmin/customer/' . $data->user->id . '/details" target="_blank">' . $data->user->name . '</a>';
                })
                ->editColumn('activated_by', function ($data) {
                    if (!$data->activated_by) return 'N/A';
                    return '<a href="/superadmin/customer/' . $data->activator->id . '/details" target="_blank">' . $data->activator->name . '</a>';
                })
                ->editColumn('redeemed_at', function ($data) {
                    if (!$data->redeemed_by) return 'N/A';
                    return $data->redeemed_at;
                })
                ->editColumn('created_at', function ($data) {
                    return date_format($data->created_at, "d-M-Y");
                })
                ->rawColumns(['voucher_no', 'batch_no', 'status','redeemed_by','activated_by'])
                ->make(true);
        }
        $page = 'active_vouchers';
        return view('superadmin.voucher.active-vouchers', compact('page'));
    }

    public function sendVoucherOTP()
    {
        $users = User::where('user_type', 'admin')->get()->pluck('email');
        $data = [
            'subject' => 'Voucher OTP',
            'otp' => rand(100000, 999999)
        ];
        // Mail::to($users)->send(new VoucherGenerationOTP($data));
        return response()->json([
            'success' => true,
            'otp' => $data['otp'],
            'message' => 'OTP Sent Successfully',
        ]);
    }

    private function generateVoucher($batchId, $currency)
    {
        Voucher::create([
            'batch_id' => $batchId,
            'voucher_no' => $this->voucherNo(),
            'secret_code' => base64_encode($this->secretCode()),
            'activation_key' => $this->activationKey(),
            'activated_at' => date('Y-m-d H:i:s'),
            'currency' => $currency,
            'status' => 'inert'
        ]);
    }

    private function batchNo()
    {
        $batchNo = 'B' . date('ymd') . '-' . rand(100, 999);
        $batch = VoucherBatch::where('batch_no', $batchNo)->first();
        if ($batch)  $this->batchNo();
        return $batchNo;
    }

    private function voucherNo()
    {
        $voucherNo = 'V' . date('ym') . '-' . rand(100000, 999999);
        $batch = Voucher::where('voucher_no', $voucherNo)->first();
        if ($batch)  $this->voucherNo();
        return $voucherNo;
    }

    private function secretCode()
    {
        $secretCode = rand(100, 999) . date('y') . rand(1000, 9999) . date('d') . rand(100, 999);
        $code = Voucher::where('secret_code', $secretCode)->first();
        if ($code)  $this->secretCode();
        return $secretCode;
    }

    private function activationKey()
    {
        // $activationKey = 'AK' . date('ym') . '-' . rand(100000, 999999);
        $activationKey =  rand(100000000, 999999999);
        $key = Voucher::where('activation_key', $activationKey)->first();
        if ($key)  $this->activationKey();
        return $activationKey;
    }

    protected function sendOTP($data)
    {
        \Mail::to($data['to'])->send(new VoucherGenerationOTP($data));
    }
}
