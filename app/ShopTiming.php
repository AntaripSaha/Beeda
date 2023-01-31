<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopTiming extends Model
{
    protected $table = 'shop_timing';
    protected $fillable = ['shop_id', 'day', 'shop_open_time', 'shop_close_time'];
}
