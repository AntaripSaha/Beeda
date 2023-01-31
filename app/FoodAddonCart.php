<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App;
use App\FoodAddon;

class FoodAddonCart extends Model
{
  public function addon()
  {
      return $this->belongsTo(FoodAddon::class);
  }  
}
