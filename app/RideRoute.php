<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RideRoute extends Model
{
    protected $table = 'ride_route';

    public function get_coordinates($origin_waypoint, $destination)
    {
        $details = "https://maps.googleapis.com/maps/api/directions/json?origin=".$origin_waypoint."&destination=".$destination."&mode=DRIVING&key=AIzaSyBjA92EIcwcbIYVa78x-yJK9gQNnzF6rXI";
        $json = file_get_contents($details);
        return $json;
    }
    public function ride(){
        return $this->belongsTo(Ride::class, 'ride_id');
    }
}
