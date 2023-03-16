<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleSubTypeIcon extends Model
{
    use HasFactory;

    protected $fillable = ['vehicle_sub_type_id', 'vehicle_icon_id'];
}
