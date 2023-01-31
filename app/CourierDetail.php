<?php

namespace App;
use App\RequiredDocument;

use Illuminate\Database\Eloquent\Model;

class CourierDetail extends Model
{
    

    protected $table = 'courier_details';


    public function ride()
    {
        return $this->belongsTo(Ride::class, 'ride_id');
    }
}
