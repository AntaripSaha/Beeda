<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    protected $fillable = [
        'user_id', 'service_category_id', 'amount', 'context'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function totalAmount()
    {
        return self::sum('amount');
    }

    public static function totalAmountByUser($userId)
    {
        return self::where('user_id', $userId)->sum('amount');
    }
}