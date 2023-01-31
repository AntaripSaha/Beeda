<?php

namespace App;

use App\Shop;
use App\Seller; 


use Illuminate\Database\Eloquent\Model;

class SellerService extends Model
{
    protected $fillable = ['seller_id', 'service_category_id'];
    
    
    public function service_category(){
        return $this->belongsTo(ServiceCategory::class)->with('documents');
    }

    public function shop(){
        return $this->hasOne(Shop::class, 'seller_service_id');
    }

    public function seller(){
        return $this->hasOne(Seller::class, 'user_id', 'seller_id');
    }

    public function documents(){
        return $this->hasMany(AllDocument::class, 'seller_service_id');
    }

    public function required_documents()
    {
        return $this->hasMany(RequiredDocument::class, 'service_category_id');
    }
    
}
