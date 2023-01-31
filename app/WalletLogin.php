<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletLogin extends Model
{
    protected $table = "wallet_logins";
    protected $fillable = ['user_id','device_token','login_time'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
