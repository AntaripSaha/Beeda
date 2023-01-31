<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginActivity extends Model
{
    protected $table = 'login_activities';
    protected $fillable = ['user_id','token','device_name', 'device_type', 'location', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
