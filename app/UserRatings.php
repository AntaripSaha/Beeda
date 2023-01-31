<?php

namespace App;
use App\RequiredDocument;

use Illuminate\Database\Eloquent\Model;

class UserRatings extends Model
{
    

    protected $table = 'user_rating';

    /* protected $fillable = [
        'name', 'icon_image', 'slug', 'display_order','category_type', 'status'
    ]; */
    // blic function ride(){
    //     return $this->hasOne(Ride::class);
    // }
}
