<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletLoginAttempt extends Model
{
    protected $table = "wallet_login_attempts";
    protected $fillable = ['user_id','device'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
