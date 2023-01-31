<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class PropertyWishlist extends Model
{
    public function property()
    {
        return $this->belongsTo(Property::class);
    }    
}
