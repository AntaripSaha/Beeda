<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    protected $fillable = ['title', 'description', 'has_fragile_items', 'need_assistance','has_liability'];

    public function packageAttributes()
    {
        return $this->belongsToMany(PackageAttribute::class, 'package_type_attributes', 'package_type_id', 'package_attribute_id');
    }

    public function packageTypeVehicles()
    {
        return $this->belongsToMany(TransportVehicleType::class, 'package_type_vehicles', 'package_type_id', 'transport_vehicle_type_id');
    }
}
