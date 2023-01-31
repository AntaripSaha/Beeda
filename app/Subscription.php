<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Subscription extends Model
{
    use SoftDeletes;

    protected $table = 'subscriptions';
    protected $fillable = ['service_category_id', 'name', 'duration', 'duration_days', 'remaining_notification', 'amount', 'discount', 'is_active'];
}
