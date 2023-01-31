<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\User;

class PropertySchedule extends Model
{
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
