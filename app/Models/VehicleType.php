<?php

namespace App\Models;

use App\ServiceCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'status'];

    public function serviceCategories()
    {
        return $this->belongsToMany(ServiceCategory::class, 'service_vehicle_type_pivots', 'vehicle_type_id', 'service_category_id');
    }
}
