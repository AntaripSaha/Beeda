<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSubscription extends Model
{
    use SoftDeletes;

    protected $table = 'user_subscriptions';
    protected $fillable = ['user_id', 'service_category_id', 'subscription_id', 'start_date', 'end_date', 'duration', 'remaining_notification', 'amount', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}

