<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ServiceCategory;
use App\Shop;
use App\Product;

class Banner extends Model
{
    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'custom_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'custom_id');
    }
    
}
