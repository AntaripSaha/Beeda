<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class TransactionSeller extends Model
{
    protected $table = "transaction_seller";
    
    protected $fillable = [
        'user_id', 'shop_id', 'shop_owner_id', 'payment_type', 'amount', 'type', 'payment_method'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function shop() {
        return $this->belongsTo(Shop::class);
    }
}

