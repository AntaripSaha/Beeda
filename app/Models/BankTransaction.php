<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankTransaction extends Model
{
    use HasFactory;
    protected $table = "bank_transactions";
    protected $fillable = ['user_id','type','amount','payment_method','status','bank_transfer_id'];
    public function setUserIdAttribute($value)
    {
        $this->attributes['user_id'] = $value;
        $this->attributes['transaction_id'] = $this->generateTransactionId();
    }

    private function generateTransactionId()
    {
        $transactionId = 'TRX'.rand(10000000,99999999);
        $transaction = BankTransaction::where('transaction_id', $transactionId)->first();
        if ($transaction)  $this->generateTransactionId();
        return $transactionId;
    }
}
