<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSubType extends Model
{
    use HasFactory;
    
    protected $fillable = ['vehicle_type_id', 'name', 'image', 'status', 'has_color', 'has_other_info', 'has_number_of_seats', 'has_baby_seat', 'has_handicap_access', 'has_ride_category', 'has_max_load_weight', 'has_user_seat'];

    public function vehicleType()
    {
        return $this->belongsTo(VehicleType::class);
    }
}
