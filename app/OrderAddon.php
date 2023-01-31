<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FoodAddon;
class OrderAddon extends Model
{
    public function addon()
    {
        return $this->belongsTo(FoodAddon::class);
    }
}
