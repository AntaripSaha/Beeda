<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class WalletToBank extends Model
{
    protected $table = "wallet_to_bank";
    protected $fillable = ['user_id','amount','bank','account','ifsc','name','status'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

