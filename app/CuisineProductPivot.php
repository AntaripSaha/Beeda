<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Cuisine;

class CuisineProductPivot extends Model
{
    protected $table = 'cuisine_product_pivot';   

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    } 
    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }
}
