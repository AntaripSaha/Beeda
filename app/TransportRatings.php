<?php

namespace App;
use App\RequiredDocument;

use Illuminate\Database\Eloquent\Model;

class TransportRatings extends Model
{
    

    protected $table = 'driver_rating';

    /* protected $fillable = [
        'name', 'icon_image', 'slug', 'display_order','category_type', 'status'
    ]; */
    // blic function ride(){
    //     return $this->hasOne(Ride::class);
    // }
}
