<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EcommerceSubscription extends Model
{
    use SoftDeletes;

    protected $table = 'ecommerce_subscriptions';
    protected $fillable = ['service_category_id', 'name', 'duration', 'duration_days', 'remaining_notification', 'amount', 'discount', 'is_active', 'product_listing', 'options'];
}
