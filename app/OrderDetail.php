<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;

class OrderDetail extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function pickup_point()
    {
        return $this->belongsTo(PickupPoint::class);
    }

    public function refund_request()
    {
        return $this->hasOne(RefundRequest::class);
    }
    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    public function affiliate_log()
    {
        return $this->hasMany(AffiliateLog::class);
    }
    public function shop(){
        return $this->hasOne(Shop::class, 'user_id', 'seller_id');
    }

    public function orderAddons()
    {
        return $this->hasMany(OrderAddon::class);
    }
    
}
