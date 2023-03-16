<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EcommerceSubscriptionOption extends Model
{
    protected $table = 'ecommerce_subscription_options';
    protected $fillable = ['title', 'status'];  
}

