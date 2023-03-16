<?php

namespace App\Traits;

use App\Constants\RevenueTypes;
use App\Models\BusinessSetting;
use App\Models\Currency;
use App\Services\NotificationService;
use App\Transaction;
use App\User;
use App\Constants\LoanStatus;
use App\Constants\UserStates;
use App\Models\BankTransaction;
use App\Models\EmiTerm;
use App\Models\Loan;
use App\Models\LoanInstalmentHistory;
use App\Models\LoanNotification;
use stdClass;
use Carbon\Carbon;
use DB;

trait TransactionTrait
{
    private function usdToUsersCurrency($userId,$amount)
    {
        $user = User::find($userId);
        $filed = is_int($user->currency) ? 'id' : 'symbol';
        $exchangeRate = Currency::where('id',$user->currency)->first()->exchange_rate;
        return $amount * $exchangeRate;
    }
    public function loanTransaction($user_id, $loan_id, $loan_status, $deposit_in, $amount)
    {
        try{
            DB::beginTransaction();
            $notificationService = new NotificationService();
            $user = User::find($user_id);
            $loan = Loan::with(['loan_type'=>function($q){
                $q->select('id', 'basis', 'processing_fee');
            }])->where('id', $loan_id)->first();
            if($user->state != UserStates::ACTIVE) return $this->loanTransferabilityResponse(false, "User is not active");
            if(!$user->currency) return $this->loanTransferabilityResponse(false, "User's currency is not defined.");
            $data = [];

            if($loan_status == LoanStatus::APPROVED)
            {
                if($deposit_in == "Wallet")
                {
                    $user->increment('balance', $amount);
                    $data = [
                        'user_id'       =>  $user_id,
                        'type'          =>  1, //in
                        'ammount'       =>  $user->currency == "$" ? $amount : $this->usdToUsersCurrency($user->id, $amount),
                        'payment_type'  =>  1, //Online
                        'status'        =>  2 //success
                    ];
                    $data['payment_method'] = 'Loan';
                    Transaction::create($data);
                }
                elseif($deposit_in == "Bank")
                {
                    $data = [
                        'user_id'       =>  $user_id,
                        'type'          =>  1,
                        'amount'        =>  $user->currency == "$" ? $amount : $this->usdToUsersCurrency($user->id, $amount),
                        'payment_type'  =>  1,
                        'status'        =>  2
                    ];
                    $data['payment_method'] = 'Loan';
                    BankTransaction::create($data);
                }
                $loan_notification =LoanNotification::create([
                    "header"    =>  "Loan Approved",
                    "title"     =>  'Your $'. $amount .'loan is approved',
                    "body"      =>  'Money is transfered to your '. $deposit_in.'.',
                    "user_id"   =>  $loan->user_id,
                    "loan_id"   =>  $loan_id
                ]);
                // $loan_history = LoanInstalmentHistory::orderBy('id', 'asc')->where('loan_id', $loan_id)->get();

                $emi_term = EmiTerm::find($loan->emi_term_id);
                $terms = $loan->loan_type->basis == "Month" ?  $emi_term->term_month :  daysCount($emi_term->term_month);
                for($i =0 ; $i<(int)$terms; $i++){
                    LoanInstalmentHistory::create([
                        "loan_id" => $loan->id,
                        "main_amount" => $loan->amount/$terms,
                        "payable_amount" => ($loan->amount+ (($loan->amount*$loan->interest_rate)/100))/$terms,
                        "status" => "Pending",
                        "interest_rate" => $loan->interest_rate,
                        "last_date" => $loan->loan_type->basis == "Month" ? Carbon::now()->addMonths($i+1) : Carbon::now()->addDays($i+1),
                    ]);
                }
                Loan::where('id',$loan_id)->update([
                    'approval_date' => now(),
                    'total_payable_amount' => ($loan->amount+ (($loan->amount*$loan->interest_rate)/100) + $loan->loan_type->processing_fee),
                    'ending_date' => Carbon::now()->addMonths($terms),
                ]);
                $notificationService->sendLoanNotification($loan_notification);


            }
            elseif($loan_status == LoanStatus::PROCESSING || $loan_status == LoanStatus::REJECTED || $loan_status == LoanStatus::ON_HOLD)
            {
                $loan_notification = [
                    "header"    =>  'Loan'.  $loan_status,
                    "title"     =>  'Your $'. $amount .' loan is '. $loan_status,
                    "body"      =>  '',
                    "user_id"   =>  $loan->user_id,
                    "loan_id"   =>  $loan_id
                ];
                Loan::where('id',$loan_id)->update(['loan_status' => $loan_status]);
                $notificationService->sendLoanNotification($loan_notification);
            }
            DB::commit();
            return $this->loanTransferabilityResponse(true, "Loan transfered");
        }
        catch(\Exception $e) {
            DB::rollback();
            return $this->loanTransferabilityResponse(false, $e->getMessage());
        }
    }
    private function loanTransferabilityResponse($status,$message)
    {
        $data = new stdClass();
        $data->status = $status;
        $data->message = $message;
        return $data;
    }
}
