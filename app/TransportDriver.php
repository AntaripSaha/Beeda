<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportDriver extends Model
{
    protected $table = 'transport_driver';
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function vehicle_type(){
        return $this->belongsTo(TransportVehicleType::class, 'vehicle_type_id');
    }
    public function ratings(){
        return $this->hasMany(TransportRatings::class, 'driver_id');
    }
    public function avg_driver_rating(){
        return $this->ratings()
        ->selectRaw('avg(rating) as rating, driver_id')
        ->groupBy('driver_id');
    }
}
