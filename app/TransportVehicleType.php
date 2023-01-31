<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportVehicleType extends Model
{
    protected $table = 'transport_vehicle_type';

    protected $fillable = [
        'service_category_id',
        'name',
        'icon_name',
        'cost_for_km',
        'cost_per_min',
        'weight_limit',
        'dimension_limit',
        'base_fare',
        'time_fare',
        'no_of_seats',
        'rental_cost_for_km',
        'rental_amount_for_1hour',
        'rental_km_limit_for_1hour',
        'status'
    ];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}

