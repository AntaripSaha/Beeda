<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCard extends Model
{
    protected $table = "business_cards";
    
    public function avatar(){
        return $this->belongsTo(Upload::class, 'photo');
    }

    public function getBanner(){
        return $this->belongsTo(Upload::class, 'banner');
    }

    // public function businessAvatar(){
    //     return $this->belongsTo(Upload::class, 'business_photo');
    // }

    // public function businessBanner(){
    //     return $this->belongsTo(Upload::class, 'business_banner');
    // }

    public function links(){
        return $this->hasMany(BusinessCardItem::class);
    }
}
