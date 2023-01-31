<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorldsBrand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'logo',
        'status'
    ];

    public function shops()
    {
        return $this->belongsToMany(Shop::class, 'worlds_brand_shop_pivot', 'worlds_brand_id', 'shop_id');
    }
}
