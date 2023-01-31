<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    protected $table = 'rides';

    public function driver(){
        return $this->belongsTo(User::class, 'driver_id');
    }
    /* public function promo_code(){
        return $this->belongsTo(CouponUsage::class, 'promo_code');
    } */
    public function service_category(){
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rider_user(){
        return $this->belongsTo(User::class, 'driver_id');
    }

    public function rating(){
        return $this->hasOne(TransportRatings::class);
    }
    public function ride_route(){
        return $this->hasOne(RideRoute::class);
    }

    public function vehicle_type(){
        return $this->belongsTo(TransportVehicleType::class, 'vehicle_type_id');
    }
    public function BookingCountDistanceAmount($km, $cost_per_km, $base_fare, $time_fare, $eta)
    {
        $km = explode(' ', $km);
        $this->base_fare = round(($base_fare), 2);
        $this->save();
        $this->total_distance_amount = round(($km[0] * $cost_per_km), 2);
        $this->save();

        $eta = explode(' ', $eta);
        $eta_count = intval($eta[0]);
        $this->time_fare_amount = round(($eta_count * $time_fare), 2);
        $this->save();

    }
    public function BookingCostCount($base_fare, $total_distance_amount, $promo_code_discount, $get_tax, $admin_commission, $min_fare_amount,$time_fare_amount)
    {
        //ride calculation
//        $step_1 = $base_fare + $total_distance_amount; //ride amount
        $step_1 = $base_fare + $total_distance_amount + $time_fare_amount; //ride amount
        $step_2 = $step_1 - $promo_code_discount; //promo code discount
        $step_3 = round((($step_2 * $get_tax) / 100), 2); //tax count
        $step_4 = $step_2 + $step_3; //count ride amount
        $adjustment_amount = 0;
        if ($step_4 < $min_fare_amount) {
            $adjustment_amount = round(($min_fare_amount - $step_4), 2); //adjust amount
        }
        $step_5 = round(($step_4 + $adjustment_amount), 2); //add adjust amount

        $this->tax = $step_3;
        $this->save();
        $this->total_pay = $step_5;
        $this->save();
        $this->adjustment_amount = $adjustment_amount;
        $this->save();

        //commission calculation
        $driver_amount = $step_1 + $adjustment_amount;
        $commission = round((($driver_amount * $admin_commission) / 100), 2);
        $driver_new_amount = $driver_amount - $commission;
        $admin_commission = $commission - $promo_code_discount;

        $this->driver_amount = round($driver_new_amount, 2);
        $this->save();

        $this->admin_commission = round($admin_commission, 2);
        $this->save();
    }
}

