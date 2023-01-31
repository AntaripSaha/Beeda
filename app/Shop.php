<?php

namespace App;
use App\User;
use App\SellerService;
use App\Upload;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'user_id',
        'seller_service_id',    
        'name',
        'radius',
        'eta_delivery_time',
        'description',
        'logo',
        'banner',
        'address',
        'slug',
        'address_lat',
        'address_long'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function seller_service()
    {
        return $this->belongsTo(SellerService::class);
    }

    public function logo_img()
    {
        return $this->belongsTo(Upload::class, 'logo');
    }

    public function banner_img()
    {
        return $this->belongsTo(Upload::class, 'banner');
    }

    public function totalProducts()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'shop_id');
    }

    public function product_categories()
    {
        return $this->hasMany(Product::class, 'shop_id')->select('shop_id', 'category_id')->groupBy('category_id')->with(['category'=>function($query){
                $query->select(['id','name']);
        }]);
    }

    public function product_reviews()
    {
        return $this->hasMany(Product::class, 'shop_id')->select(['shop_id'])->withCount('review_counter');
    }

    public function avg_rating()
    {
        return $this->products()
        ->selectRaw('avg(rating) as rating, shop_id')
        ->groupBy('shop_id');
    }

    public function product_ratings()
    {
        return $this->hasMany(Product::class, 'shop_id')->select(['shop_id'])->withCount('rating_counter');
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class, 'cuisine_shop_pivot', 'shop_id', 'cuisine_id');
    }
}

