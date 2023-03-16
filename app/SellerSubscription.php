<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SellerSubscription extends Model
{
    use SoftDeletes;

    protected $table = 'seller_subscriptions';
    protected $fillable = ['user_id', 'service_category_id', 'subscription_id', 'start_date', 'end_date', 'duration', 'remaining_notification', 'amount', 'is_active'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function subscription()
    {
        return $this->belongsTo(EcommerceSubscription::class);
    }
}
