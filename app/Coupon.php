<?php



namespace App;



use Illuminate\Database\Eloquent\Model;
use App\ServiceCategory;


class Coupon extends Model

{

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'coupon_pivots', 'coupon_id', 'shop_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'coupon_pivots', 'coupon_id', 'user_id');
    }

}

