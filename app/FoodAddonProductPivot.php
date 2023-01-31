<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FoodAddon;

class FoodAddonProductPivot extends Model
{
    protected $table = 'food_addon_product_pivot';
    
    public function foodAddon()
    {
        return $this->belongsTo(FoodAddon::class);
    }
}
