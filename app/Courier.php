<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    public function ride()
    {
        return $this->belongsTo(Ride::class)/*->select('id','user_id')*/;
    }

    public function sender()
    {
        return $this->belongsTo(CourierCustomerInfo::class,'sender_info');
    }

    public function receiver()
    {
        return $this->belongsTo(CourierCustomerInfo::class,'receiver_info');
    }
}
