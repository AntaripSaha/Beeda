<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletPinResetRequest extends Model
{
    protected $table = "wallet_pin_reset_requests";
    protected $fillable = ['user_id','device','status'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
