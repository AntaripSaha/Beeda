<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\PropertyFeature;
use App\Models\PropertyWishlist;
use App\Upload;
use App\User;

class Property extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function thumbnail()
    {
        return $this->belongsTo(Upload::class, 'thumbnail_img');
    }

    public function meta_image()
    {
        return $this->belongsTo(Upload::class, 'meta_img');
    }

    public function property_features()
    {
        return $this->hasMany(PropertyFeature::class);
    }

    public function address_image()
    {
        return $this->belongsTo(Upload::class, 'address_img');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wishList()
    {
        return $this->hasOne(PropertyWishlist::class);
    }
}
