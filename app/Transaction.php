<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transactions";
    protected $fillable = ['user_id','type','ammount','payment_method','payment_type','status','associate','service_category_id','bank_transfer_id','voucher_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function service_category() {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function associate() {
        return $this->belongsTo(User::class,'associate');
    }
    public function associated_user()
    {
        return $this->belongsTo(User::class, 'associate');
    }
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $value;
        $this->attributes['transaction_id'] = $this->generateTransactionId();
    }

    private function generateTransactionId()
    {
        $transactionId = 'TRX'.rand(10000000,99999999);
        $transaction = Transaction::where('transaction_id', $transactionId)->first();
        if ($transaction)  $this->generateTransactionId();
        return $transactionId;
    }
}