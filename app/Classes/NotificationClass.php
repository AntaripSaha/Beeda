<?php

namespace App\Classes;

use App\Ride;
use App\UserRideWayPoint;
use App\ServiceSetting;
use App\User;
use App\TransportVehicleType;
use App\SellerService;
use App\TransportDriver;
use App\RunningService;
use App\ServiceCategory;
use Illuminate\Support\Facades\DB;

class NotificationClass
{
    private $transport_service_id_array;
    private $transport_rental_service_id_array;
    private $courier_service_id_array;
    private $delivery_service_id_array;
    private $courier_scooter;
    private $bike_ride;

    public function __construct()
    {
        $this->transport_service_id_array = [1, 2];
        $this->transport_rental_service_id_array = [];
        $this->courier_service_id_array = [19];
        $this->delivery_service_id_array = [];
        //$this->courier_scooter = 10;
        $this->bike_ride = 1;
    }
    public function driverRequestNotification($service_category_id, $request_id)
    {
        
        if ($service_category_id != Null || $request_id != Null) {
            if (in_array($service_category_id, $this->transport_service_id_array)) {
                
//                return $this->driverTransportRequestNotification($service_category_id, $request_id);
                $send_notification = $this->driverTransportRideRequestNotification($service_category_id, $request_id);
                if ($decoded['status'] = json_decode($send_notification) == false) {
                    return $send_notification;
                }
                return $send_notification;
            }
            if (in_array($service_category_id, $this->transport_rental_service_id_array)) {
//                return $this->driverTransportRequestNotification($service_category_id, $request_id);
                $send_notification = $this->driverTransportRentalRideRequestNotification($service_category_id, $request_id);
                if ($decoded['status'] = json_decode($send_notification) == false) {
                    return $send_notification;
                }
                return $send_notification;
            } elseif (in_array($service_category_id, $this->delivery_service_id_array)) {
//                return $this->driverDeliveryRequestNotification($service_category_id, $request_id);
                $send_notification = $this->driverDeliveryRequestNotification($service_category_id, $request_id);
                if ($decoded['status'] = json_decode($send_notification) == false) {
                    return $send_notification;
                }
                return "success";
            } elseif (in_array($service_category_id, $this->courier_service_id_array)) {
                // pending
//                return "not working";
                $send_notification = $this->driverTransportCourierRequestNotification($service_category_id, $request_id);
                if ($decoded['status'] = json_decode($send_notification) == false) {
                    return $send_notification;
                }
            }
        }
        return "";
    }


    //ride request
    public function driverTransportRideRequestNotification($service_category_id, $request_id)
    {
        $ride_request = Ride::select('rides.id as request_id',
            'rides.pickup_datetime',
            'rides.pickup_address', 'rides.is_way_point',
            'rides.ride_type', 'rides.handicap', 'rides.child_seat',
            'rides.pickup_latlong', 'rides.destination_address',
            'rides.destination_latlong', 'rides.payment_type', 'rides.vehicle_type_id', 'service_categories.id as service_category_id', 'service_categories.name as service_cat_name', 'service_categories.icon_image as service_cat_icon')
            ->join('service_categories', 'service_categories.id', '=', 'rides.service_category_id')
            ->where('rides.id', $request_id)->first();
            /* return response()->json([
                'fau' => $ride_request->request_id,
            ]); */
        if ($ride_request != null) {
            $service_setting = ServiceSetting::where('service_category_id', $service_category_id)->first();
            if ($service_setting != Null) {
                $radius = $service_setting->provider_search_radius;
                $timeout = $service_setting->provider_accept_timeout;
            } else {
                $radius = 5;
                $timeout = 60;
            }
//            $expire_date_time = date('Y-m-d h:i:s', strtotime("-10 minutes"));
            $expire_date_time = date('Y-m-d h:i:s', strtotime("-60 minutes"));
            $this->driverTransportAndroidRequestNotification($service_category_id, $expire_date_time, $ride_request, $timeout, $radius);
            $res =$this->driverTransportIosRequestNotification($service_category_id, $expire_date_time, $ride_request, $timeout, $radius);
            //return "success";
            return $res;
        }
    }

    public function driverTransportCourierRequestNotification($service_cat_id, $request_id)
    {
        $ride_request = Ride::select('rides.id as request_id',
            'rides.pickup_datetime',
            'rides.pickup_address',
            'rides.ride_type',
            'rides.is_way_point',
            'rides.pickup_latlong',
            'rides.destination_address',
            'rides.destination_latlong',
            'rides.payment_type',
            'rides.vehicle_type_id',
            'service_categories.id as service_cat_id',
            'service_categories.name as service_cat_name',
            'service_categories.icon_image as service_cat_icon',
            'courier_details.goods_height',
            'courier_details.goods_width',
            'courier_details.goods_weight')
            ->join('service_categories', 'service_categories.id', '=', 'rides.service_category_id')
            ->join('courier_details', 'courier_details.ride_id', '=', 'rides.id')
            ->where('rides.id', $request_id)->first();
        if ($ride_request != null) {
            $service_setting = ServiceSetting::where('service_category_id', $service_cat_id)->first();
            if ($service_setting != Null) {
                $radius = $service_setting->provider_search_radius;
                $timeout = $service_setting->provider_accept_timeout;
            } else {
                $radius = 5;
                $timeout = 60;
            }
            //$expire_date_time = date('Y-m-d h:i:s', strtotime("-10 minutes"));
            $expire_date_time = date('Y-m-d h:i:s', strtotime("-60 minutes"));

            /* $general_settings = GeneralSettings::select('fcm_server_key')->first();
            if ($general_settings == Null || $general_settings->fcm_server_key == Null) {
                return response()->json([
                    'status' => 0,
                    'message' => "Something want wrong!"
                ]);
            } */

            $this->driverTransportCourierAndroidRequestNotification($service_cat_id, $expire_date_time, $ride_request, $timeout, $radius);
            $this->driverTransportCourierIosRequestNotification($service_cat_id, $expire_date_time, $ride_request, $timeout, $radius);
            return "success";
        }
    }


    //ride android request
    public function driverTransportAndroidRequestNotification($service_category_id, $expire_date_time, $ride_request, $timeout, $radius)
    {
        
        $latlong = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $lat = $latlong[0];
        $long = $latlong[1];

        $get_provider_token = User::query()->select('users.id', 'users.device_token')
            ->whereRaw(DB::raw("(6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( current_lat ) )  * cos( radians( current_long ) - radians(" . $long . ") ) + sin( radians(" . $lat . ") ) * sin(radians( current_lat ) ) ) ) < " . $radius))
            ->join('seller_services', 'seller_services.seller_id', '=', 'users.id')
            ->join('service_categories', 'service_categories.id', '=', 'seller_services.service_category_id')
            ->join('transport_driver', 'transport_driver.seller_service_id', '=', 'seller_services.id')
            ->where('service_categories.id', $service_category_id)
            ->where('users.status', 1)
            ->where('users.login_device', 1)
            ->where('seller_services.status', 1)
            ->where('seller_services.current_status', 1)
            ->where('transport_driver.driver_service', 1)
            ->where('transport_driver.vehicle_type_id', $ride_request->vehicle_type_id)
            ->where('transport_driver.last_online_date_time', '>=', $expire_date_time)
            ->whereNotNull('transport_driver.current_lat')
            ->whereNotNull('transport_driver.current_long')
            //->whereNotNull('users.access_token')
            ->whereNotNull('users.device_token');
        if ($ride_request->handicap != 0) {
            $get_provider_token->where('transport_driver.handicap', '=', $ride_request->handicap);
        }
        if ($ride_request->child_seat != 0) {
            $get_provider_token->where('transport_driver.child_seat', '=', $ride_request->child_seat);
        }
        $provider_token = $get_provider_token->get()->pluck('device_token')->toArray();
        
        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        /* $general_settings = GeneralSettings::select('fcm_server_key')->first();
        if ($general_settings == Null || $general_settings->fcm_server_key == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something want wrong!",
            ]);
        } */

        $pickup = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $destination = array_map('trim', explode(",", $ride_request->destination_latlong));
        $way_points[] = [
            "address" => $ride_request->pickup_address,
            "address_lat" => trim($pickup[0]),
            "address_long" => trim($pickup[1])
        ];
        if ($ride_request->is_way_point == 1) {
            $ride_way_point = UserRideWayPoint::query()->where('ride_id', $ride_request->request_id)->first();
            if ($ride_way_point != Null) {
                if ($ride_way_point->way_point_1 != Null && $ride_way_point->lat_long_1 != Null) {
                    $lat_long_1 = array_map('trim', explode(",", $ride_way_point->lat_long_1));
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_1[0]),
                        "address_long" => trim($lat_long_1[1])
                    ];
                }
                if ($ride_way_point->way_point_2 != Null && $ride_way_point->lat_long_2 != Null) {
                    $lat_long_2 = explode(",", $ride_way_point->lat_long_2);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_2[0]),
                        "address_long" => trim($lat_long_2[1])
                    ];
                }
                if ($ride_way_point->way_point_3 != Null && $ride_way_point->lat_long_3 != Null) {
                    $lat_long_3 = explode(",", $ride_way_point->lat_long_3);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_3,
                        "address_lat" => trim($lat_long_3[0]),
                        "address_long" => trim($lat_long_3[1])
                    ];
                }

            }
        }
        $way_points[] = [
            "address" => $ride_request->destination_address,
            "address_lat" => trim($destination[0]),
            "address_long" => trim($destination[1])
        ];

        $server_key = trim($fcm_server_key);

        //To driver Assign
        $title = $ride_request->service_cat_name;
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $notification = [
            'title' => $title,
            'title_code' => 22,
            'sound' => true,
            'description' => "New Request",
            'message_code' => 90,
        ];
        $extraNotificationData = [
            'message' => $notification,
            'request_id' => $ride_request->request_id,
            'service_category_id' => $ride_request->service_category_id,
            'service_category_name' => $ride_request->service_cat_name,
            'service_category_icon' => $ride_request->service_cat_icon != Null ? url('/assets/images/service-category/' . $ride_request->service_cat_icon) : '',
//                'pickup_address' => $ride_request->pickup_address,
//                'pickup_lat_long' => $ride_request->pickup_latlong,
//                'destination_address' => $ride_request->destination_address,
//                'destination_lat_long' => $ride_request->destination_latlong,
            "address_list" => $way_points,
            'notification_type' => $ride_request->ride_type,
            'is_way_points' => $ride_request->is_way_point,
            'schedule_date_time' => $ride_request->pickup_datetime,
            'schedule_display_date_time' => Date('Y-M-d, h:i', strtotime($ride_request->pickup_datetime)),
            'payment_type' => $ride_request->payment_type,
            'request_timeout' => $timeout
        ];
        if (is_array($provider_token) ) {
            /* return response()->json([
                "token" => $provider_token,
            ]); */
            $fcmNotification = [
                'registration_ids' => $provider_token, //multiple token array
                'data' => $extraNotificationData,
            ];
        } else {
            $fcmNotification = [
                'to' => $provider_token,
                'data' => $extraNotificationData,
            ];
        }
//            $fcmNotification = [
//                'to' => "dHmkeJuOhJc:APA91bHBRkVpVmwAVqImD7iyRH3bhd42HlUin5hNAffLIPHu_jxlrBuoarKjn30Lwtd6MkEnxPN5pD26W1Zk6R_I-_XXLHtjpYwJkrIF52gcVTuCOKrdbJktgLVEteeJxgky0uBt5v2w",
//                'data' => $extraNotificationData
//            ];
        $headers = [
            //'Authorization: key=' . "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls",
            //'Authorization: key=' . 'APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls',
            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        //return $result;
        return response()->json([
                "token" => $provider_token,
                "res" => $result
            ]);
    }
    
    public function driverTransportIosRequestNotification($service_category_id, $expire_date_time, $ride_request, $timeout, $radius)
    {
        
        $latlong = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $lat = $latlong[0];
        $long = $latlong[1];

        $get_provider_token = User::query()->select('users.id', 'users.device_token')
            ->whereRaw(DB::raw("(6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( current_lat ) )  * cos( radians( current_long ) - radians(" . $long . ") ) + sin( radians(" . $lat . ") ) * sin(radians( current_lat ) ) ) ) < " . $radius))
            ->join('seller_services', 'seller_services.seller_id', '=', 'users.id')
            ->join('service_categories', 'service_categories.id', '=', 'seller_services.service_category_id')
            ->join('transport_driver', 'transport_driver.seller_service_id', '=', 'seller_services.id')
            ->where('service_categories.id', $service_category_id)
            ->where('users.status', 1)
            ->where('users.login_device', 2)
            ->where('seller_services.status', 1)
            ->where('seller_services.current_status', 1)
            ->where('transport_driver.driver_service', 1)
            ->where('transport_driver.vehicle_type_id', $ride_request->vehicle_type_id)
            ->where('transport_driver.last_online_date_time', '>=', $expire_date_time)
            ->whereNotNull('transport_driver.current_lat')
            ->whereNotNull('transport_driver.current_long')
            //->whereNotNull('users.access_token')
            ->whereNotNull('users.device_token');
            
        if ($ride_request->handicap != 0) {
            $get_provider_token->where('transport_driver.handicap', '=', $ride_request->handicap);
        }
        if ($ride_request->child_seat != 0) {
            $get_provider_token->where('transport_driver.child_seat', '=', $ride_request->child_seat);
        }
        
        $provider_token = $get_provider_token->get()->pluck('device_token')->toArray();
        /* return response()->json([
                "token" => $provider_token,
            ]); */
        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        /* $general_settings = GeneralSettings::select('fcm_server_key')->first();
        if ($general_settings == Null || $general_settings->fcm_server_key == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something want wrong!",
            ]);
        } */

        $pickup = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $destination = array_map('trim', explode(",", $ride_request->destination_latlong));
        $way_points[] = [
            "address" => $ride_request->pickup_address,
            "address_lat" => trim($pickup[0]),
            "address_long" => trim($pickup[1])
        ];
        if ($ride_request->is_way_point == 1) {
            $ride_way_point = UserRideWayPoint::query()->where('ride_id', $ride_request->request_id)->first();
            if ($ride_way_point != Null) {
                if ($ride_way_point->way_point_1 != Null && $ride_way_point->lat_long_1 != Null) {
                    $lat_long_1 = array_map('trim', explode(",", $ride_way_point->lat_long_1));
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_1[0]),
                        "address_long" => trim($lat_long_1[1])
                    ];
                }
                if ($ride_way_point->way_point_2 != Null && $ride_way_point->lat_long_2 != Null) {
                    $lat_long_2 = explode(",", $ride_way_point->lat_long_2);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_2[0]),
                        "address_long" => trim($lat_long_2[1])
                    ];
                }
                if ($ride_way_point->way_point_3 != Null && $ride_way_point->lat_long_3 != Null) {
                    $lat_long_3 = explode(",", $ride_way_point->lat_long_3);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_3,
                        "address_lat" => trim($lat_long_3[0]),
                        "address_long" => trim($lat_long_3[1])
                    ];
                }

            }
        }
        $way_points[] = [
            "address" => $ride_request->destination_address,
            "address_lat" => trim($destination[0]),
            "address_long" => trim($destination[1])
        ];

        $server_key = trim($fcm_server_key);

        //To driver Assign
        $title = $ride_request->service_cat_name;
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $extraNotificationData = [
            'request_id' => $ride_request->request_id,
            'service_category_id' => $ride_request->service_category_id,
            'service_category_name' => $ride_request->service_cat_name,
            'service_category_icon' => $ride_request->service_cat_icon != Null ? url('/public/assets/images/service-category/' . $ride_request->service_cat_icon) : '',
                /* 'pickup_address' => $ride_request->pickup_address,
                'pickup_lat_long' => $ride_request->pickup_latlong,
                'destination_address' => $ride_request->destination_address,
                'destination_lat_long' => $ride_request->destination_latlong, */
            "address_list" => $way_points,
            'notification_type' => $ride_request->ride_type,
            'is_way_points' => $ride_request->is_way_point,
            'schedule_date_time' => $ride_request->pickup_datetime,
            'schedule_display_date_time' => Date('Y-M-d, h:i', strtotime($ride_request->pickup_datetime)),
            'payment_type' => $ride_request->payment_type,
            'request_timeout' => $timeout
        ];
        $notification = [
            'title' => $title,
            'text' => "New Request",
            'sound' => 'default',
            'badge' => '1',
            'addData' => $extraNotificationData,
            "title_loc_key" => 22,
            "body_loc_key" => 90,
        ];
        if (is_array($provider_token)) {
            $arrayToSend = array(
                'registration_ids' => $provider_token,
                'notification' => $notification,
                'priority' => 'high',
            );
        } else {
            $arrayToSend = array(
                'to' => $provider_token,
                'notification' => $notification,
                'priority' => 'high',
            );
        }
            /* $fcmNotification = [
                'to' => "dHmkeJuOhJc:APA91bHBRkVpVmwAVqImD7iyRH3bhd42HlUin5hNAffLIPHu_jxlrBuoarKjn30Lwtd6MkEnxPN5pD26W1Zk6R_I-_XXLHtjpYwJkrIF52gcVTuCOKrdbJktgLVEteeJxgky0uBt5v2w",
                'data' => $extraNotificationData
            ]; */
        $headers = [
            'Authorization: key=' . $server_key,
            //'Authorization: key=' . "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls",
            //'Authorization: key=' . 'APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls',
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
        $result = curl_exec($ch);
        curl_close($ch);

        //return $result;
        return response()->json([
                "token" => $get_provider_token,
                "res" => $result
            ]);
    }
    public function driverTransportCourierAndroidRequestNotification($service_cat_id, $expire_date_time, $ride_request, $timeout, $radius)
    {
        $latlong = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $lat = $latlong[0];
        $long = $latlong[1];

        if ($ride_request->vehicle_type_id == $this->courier_scooter) {
            $vehicle_type_list = TransportVehicleType::where('service_category_id', $this->bike_ride)->get()->pluck('id')->toArray();
            $provider_token = Provider::select('providers.id', 'providers.device_token')
                ->whereRaw(DB::raw("(6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( current_lat ) )  * cos( radians( current_long ) - radians(" . $long . ") ) + sin( radians(" . $lat . ") ) * sin(radians( current_lat ) ) ) ) < " . $radius))
                ->join('provider_services', 'provider_services.provider_id', '=', 'providers.id')
                ->join('service_category', 'service_category.id', '=', 'provider_services.service_cat_id')
                ->join('transport_driver_details', 'transport_driver_details.provider_service_id', '=', 'provider_services.id')
                ->where('service_category.id', $this->bike_ride)
                ->where('providers.status', 1)
                ->where('provider_services.status', 1)
                ->where('provider_services.current_status', 1)
                ->where('transport_driver_details.courier_boy', 1)
                ->whereIN('transport_driver_details.vehicle_type_id', $vehicle_type_list)
                ->where('transport_driver_details.last_online_date_time', '>=', $expire_date_time)
                ->whereNotNull('transport_driver_details.current_lat')
                ->whereNotNull('transport_driver_details.current_long')
                ->whereNotNull('providers.access_token')
                ->whereNotNull('providers.device_token')
                ->get()->pluck('device_token')->toArray();
        } else {
            $provider_token = User::select('users.id', 'users.device_token')
                ->whereRaw(DB::raw("(6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( current_lat ) )  * cos( radians( current_long ) - radians(" . $long . ") ) + sin( radians(" . $lat . ") ) * sin(radians( current_lat ) ) ) ) < " . $radius))
                ->join('seller_services', 'seller_services.seller_id', '=', 'users.id')
                ->join('service_categories', 'service_categories.id', '=', 'seller_services.service_category_id')
                ->join('transport_driver', 'transport_driver.seller_service_id', '=', 'seller_services.id')
                ->where('service_categories.id', $service_cat_id)
                ->where('users.status', 1)
                ->where('seller_services.status', 1)
                ->where('seller_services.current_status', 1)
                ->where('transport_driver.courier_boy', 1)
                ->where('transport_driver.vehicle_type_id', $ride_request->vehicle_type_id)
                ->where('transport_driver.last_online_date_time', '>=', $expire_date_time)
                ->whereNotNull('transport_driver.current_lat')
                ->whereNotNull('transport_driver.current_long')
                //->whereNotNull('providers.access_token')
                ->whereNotNull('users.device_token')
                ->get()->pluck('device_token')->toArray();
        }
        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        $server_key = trim($fcm_server_key);

        $pickup = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $destination = array_map('trim', explode(",", $ride_request->destination_latlong));
        $way_points[] = [
            "address" => $ride_request->pickup_address,
            "address_lat" => trim($pickup[0]),
            "address_long" => trim($pickup[1])
        ];
        if ($ride_request->is_way_point == 1) {
            $ride_way_point = UserRideWayPoint::query()->where('ride_id', $ride_request->request_id)->first();
            if ($ride_way_point != Null) {
                if ($ride_way_point->way_point_1 != Null && $ride_way_point->lat_long_1 != Null) {
                    $lat_long_1 = array_map('trim', explode(",", $ride_way_point->lat_long_1));
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_1[0]),
                        "address_long" => trim($lat_long_1[1])
                    ];
                }
                if ($ride_way_point->way_point_2 != Null && $ride_way_point->lat_long_2 != Null) {
                    $lat_long_2 = explode(",", $ride_way_point->lat_long_2);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_2[0]),
                        "address_long" => trim($lat_long_2[1])
                    ];
                }
                if ($ride_way_point->way_point_3 != Null && $ride_way_point->lat_long_3 != Null) {
                    $lat_long_3 = explode(",", $ride_way_point->lat_long_3);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_3,
                        "address_lat" => trim($lat_long_3[0]),
                        "address_long" => trim($lat_long_3[1])
                    ];
                }

            }
        }
        $way_points[] = [
            "address" => $ride_request->destination_address,
            "address_lat" => trim($destination[0]),
            "address_long" => trim($destination[1])
        ];

        //To driver Assign
        $title = $ride_request->service_cat_name;
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $notification = [
            'title' => $title,
            'title_code' => 22,
            'sound' => true,
            'description' => "New Request",
            'message_code' => 90,
        ];
        $extraNotificationData = [
            'message' => $notification,
            'request_id' => $ride_request->request_id,
            'service_category_id' => $ride_request->service_cat_id,
            'service_category_name' => $ride_request->service_cat_name,
            'service_category_icon' => $ride_request->service_cat_icon != Null ? url('/assets/images/service-category/' . $ride_request->service_cat_icon) : '',

            "address_list" => $way_points,
            'notification_type' => $ride_request->ride_type,
            'is_way_points' => $ride_request->is_way_point,
            'schedule_date_time' => $ride_request->pickup_datetime,
            'schedule_display_date_time' => Date('Y-M-d, h:i', strtotime($ride_request->pickup_datetime)),
            'payment_type' => $ride_request->payment_type,
            'goods_height_width' => $ride_request->goods_height . ' X ' . $ride_request->goods_width,
            'goods_weight' => $ride_request->goods_weight,
            'request_timeout' => $timeout
        ];
        if (is_array($provider_token)) {
            $fcmNotification = [
                'registration_ids' => $provider_token, //multiple token array
                'data' => $extraNotificationData
            ];
        } else {
            $fcmNotification = [
                'to' => $provider_token,
                'data' => $extraNotificationData
            ];
        }
            
        $headers = [
            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }
    public function driverTransportCourierIosRequestNotification($service_cat_id, $expire_date_time, $ride_request, $timeout, $radius)
    {
        $latlong = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $lat = $latlong[0];
        $long = $latlong[1];

        if ($ride_request->vehicle_type_id == $this->courier_scooter) {
            $vehicle_type_list = TransportVehicleType::where('service_cat_id', $this->bike_ride)->get()->pluck('id')->toArray();
            $provider_token = Provider::select('providers.id', 'providers.device_token')
                ->whereRaw(DB::raw("(6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( current_lat ) )  * cos( radians( current_long ) - radians(" . $long . ") ) + sin( radians(" . $lat . ") ) * sin(radians( current_lat ) ) ) ) < " . $radius))
                ->join('provider_services', 'provider_services.provider_id', '=', 'providers.id')
                ->join('service_category', 'service_category.id', '=', 'provider_services.service_cat_id')
                ->join('transport_driver_details', 'transport_driver_details.provider_service_id', '=', 'provider_services.id')
                ->where('service_category.id', $this->bike_ride)
                ->where('providers.status', 1)
                ->where('provider_services.status', 1)
                ->where('provider_services.current_status', 1)
                ->where('transport_driver_details.courier_boy', 1)
                ->whereIN('transport_driver_details.vehicle_type_id', $vehicle_type_list)
                ->where('transport_driver_details.last_online_date_time', '>=', $expire_date_time)
                ->whereNotNull('transport_driver_details.current_lat')
                ->whereNotNull('transport_driver_details.current_long')
                ->whereNotNull('providers.access_token')
                ->whereNotNull('providers.device_token')
                ->get()->pluck('device_token')->toArray();
        } else {
            $provider_token = User::select('users.id', 'users.device_token')
                ->whereRaw(DB::raw("(6371 * acos( cos( radians(" . $lat . ") ) * cos( radians( current_lat ) )  * cos( radians( current_long ) - radians(" . $long . ") ) + sin( radians(" . $lat . ") ) * sin(radians( current_lat ) ) ) ) < " . $radius))
                ->join('seller_services', 'seller_services.seller_id', '=', 'users.id')
                ->join('service_categories', 'service_categories.id', '=', 'seller_services.service_category_id')
                ->join('transport_driver', 'transport_driver.seller_service_id', '=', 'seller_services.id')
                ->where('service_categories.id', $service_cat_id)
                ->where('users.status', 1)
                ->where('seller_services.status', 1)
                ->where('seller_services.current_status', 1)
                ->where('transport_driver.courier_boy', 1)
                ->where('transport_driver.vehicle_type_id', $ride_request->vehicle_type_id)
                ->where('transport_driver.last_online_date_time', '>=', $expire_date_time)
                ->whereNotNull('transport_driver.current_lat')
                ->whereNotNull('transport_driver.current_long')
                //->whereNotNull('providers.access_token')
                ->whereNotNull('users.device_token')
                ->get()->pluck('device_token')->toArray();
        }

        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        
        $server_key = trim($fcm_server_key);

        $pickup = array_map('trim', explode(",", $ride_request->pickup_latlong));
        $destination = array_map('trim', explode(",", $ride_request->destination_latlong));
        $way_points[] = [
            "address" => $ride_request->pickup_address,
            "address_lat" => trim($pickup[0]),
            "address_long" => trim($pickup[1])
        ];
        if ($ride_request->is_way_point == 1) {
            $ride_way_point = UserRideWayPoint::query()->where('ride_id', $ride_request->request_id)->first();
            if ($ride_way_point != Null) {
                if ($ride_way_point->way_point_1 != Null && $ride_way_point->lat_long_1 != Null) {
                    $lat_long_1 = array_map('trim', explode(",", $ride_way_point->lat_long_1));
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_1[0]),
                        "address_long" => trim($lat_long_1[1])
                    ];
                }
                if ($ride_way_point->way_point_2 != Null && $ride_way_point->lat_long_2 != Null) {
                    $lat_long_2 = explode(",", $ride_way_point->lat_long_2);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_1,
                        "address_lat" => trim($lat_long_2[0]),
                        "address_long" => trim($lat_long_2[1])
                    ];
                }
                if ($ride_way_point->way_point_3 != Null && $ride_way_point->lat_long_3 != Null) {
                    $lat_long_3 = explode(",", $ride_way_point->lat_long_3);
                    $way_points[] = [
                        "address" => $ride_way_point->way_point_3,
                        "address_lat" => trim($lat_long_3[0]),
                        "address_long" => trim($lat_long_3[1])
                    ];
                }

            }
        }
        $way_points[] = [
            "address" => $ride_request->destination_address,
            "address_lat" => trim($destination[0]),
            "address_long" => trim($destination[1])
        ];

        //To driver Assign
        $title = $ride_request->service_cat_name;
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $extraNotificationData = [
            'request_id' => $ride_request->request_id,
            'service_category_id' => $ride_request->service_cat_id,
            'service_category_name' => $ride_request->service_cat_name,
            'service_category_icon' => $ride_request->service_cat_icon != Null ? url('/assets/images/service-category/' . $ride_request->service_cat_icon) : '',

            "address_list" => $way_points,
            'notification_type' => $ride_request->ride_type,
            'is_way_points' => $ride_request->is_way_point,
            'schedule_date_time' => $ride_request->pickup_datetime,
            'schedule_display_date_time' => Date('Y-M-d, h:i', strtotime($ride_request->pickup_datetime)),
            'payment_type' => $ride_request->payment_type,
            'goods_height_width' => $ride_request->goods_height . ' X ' . $ride_request->goods_width,
            'goods_weight' => $ride_request->goods_weight,
            'request_timeout' => $timeout
        ];
        $notification = [
            'title' => $title,
            'text' => "New Request",
            'sound' => 'default',
            'badge' => '1',
            'addData' => $extraNotificationData,
            "title_loc_key" => 22,
            "body_loc_key" => 90,
        ];

        if (is_array($provider_token)) {
            $arrayToSend = array(
                'registration_ids' => $provider_token,
                'notification' => $notification,
                'priority' => 'high',
            );
        } else {
            $arrayToSend = array(
                'registration_ids' => $provider_token,
                'notification' => $notification,
                'priority' => 'high',
            );
        }

        $headers = [
            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
        $result = curl_exec($ch);
        curl_close($ch);

        //return $result;
        return response()->json([
                "token" => $provider_token,
                "res" => $result
            ]);
    }
    public function driverAcceptedTransportRequestNotification($request_id, $driver_service_id, $driver_id, $currency)
    {
        $driver_s_id = (int)$driver_service_id;
        /* return response()->json([
                    "driver_id" => $driver_id,
                    "driver_id_type" => gettype($driver_id),
                    "driver_service_id" => $driver_service_id,
                    "driver_service_id_type" => gettype($driver_service_id),
                ]); */
        
        $ride = Ride::query()->where('id', $request_id)->first();
        if ($ride != Null) {
            if ($ride->status == 1) {
                return response()->json([
                    "status" => 0,
                    "message" => "Sorry, You are too late to the accept ride",
                    "message_code" => 23,
                ]);
            } elseif ($ride->status == 4) {
                return response()->json([
                    "status" => 0,
                    "message" => "Sorry, Your ride request is cancelled by user",
                    "message_code" => 24,
                ]);
            } elseif ($ride->status == 10) {
                return response()->json([
                    "status" => 0,
                    "message" => "Sorry, Your ride request is failed",
                    "message_code" => 25,
                ]);
            }
            $get_driver_id = $driver_id;
            /* $get_driver_id = TransportDriver::query()->select('transport_driver.id', 'users.name as driver_name', 'users.email')
                ->join('seller_services', 'seller_services.id', 'transport_driver.seller_service_id')
                ->join('users', 'users.id', 'seller_services.seller_id')
                ->where('transport_driver.seller_service_id', $driver_s_id)
                ->where('users.status', 1)
                ->where('seller_services.status', 1)
                ->where('seller_services.current_status', 1)
                ->first();
                return response()->json([
                    "get_driver_id" => $get_driver_id,
                ]); */
            if ($get_driver_id != Null) {
                
                //offline driver status
                $driver_service = SellerService::query()->where('id', $driver_service_id)->first();
                if ($driver_service != Null) {
                    $user = User::query()->where('id', $ride->user_id)->first();
                    if ($user == Null) {
                        return response()->json([
                            "status" => 0,
                            "message" => "User not found",
                            "message_code" => 9,
                        ]);
                    }

                    if ($ride->ride_type == 0) {
                        $driver_service->current_status = 0;
                        $driver_service->save();
                        //$ride->driver_name = $get_driver_id->driver_name; //$get_driver_id->name;
                        $ride->status = 1;
                    } else {
                        //$ride->driver_name = $get_driver_id->driver_name;
                        $ride->status = 2;
                    }

                    //set driver id in ride booking
                    $ride->driver_id = $driver_id;
                    $ride->save();

                    $notification_log = $this->userTransportNotification($ride->id, $user->device_token, $ride->status, $user->login_device);
                    \Log::info($notification_log);
                    $user_profile_url = url('/public/assets/img/profile-images/customer');
                    $ride_details = Ride::query()->select('rides.id as ride_id',
                        'rides.ride_no as booking_no',
                        'rides.service_category_id as service_category_id',
                        DB::raw("(CASE WHEN users.avatar != '' THEN (CASE WHEN CHAR_LENGTH(users.avatar) >= 25 THEN users.avatar ELSE concat('$user_profile_url','/',users.avatar) END) ELSE '' END) as user_profile_image"),
                        'users.name as user_name',
                        'users.phone',
                        'rides.pickup_address as pickup_address',
                        'rides.pickup_latlong as pickup_latlong',
                        'rides.destination_address as destination_address',
                        'rides.destination_latlong as destination_latlong',
                        'rides.pickup_datetime as pickup_datetime',
                        'rides.total_pay as total_amount',
                        'rides.payment_type as payment_type',
                        'rides.is_way_point as is_way_point',
                        'rides.way_point_status as way_point_status',
                        'rides.status as ride_status')
                        ->join('users', 'users.id', '=', 'rides.user_id')
                        ->where('rides.id', $ride->id)->first();
                    if ($ride->ride_type == 0) {
                        $get_user = Ride::query()->select('user_id')->where('id', $ride_details->ride_id)->first();
                        if ($get_user != Null) {
                            RunningService::query()->where('seller_id', $driver_id)->where('user_id', $get_user->user_id)->where('service_category_id', $ride_details->service_category_id)->where('ride_id', $ride_details->id)->delete();
                            $provider_running_service = new RunningService();
                            $provider_running_service->seller_id = $driver_id;
                            $provider_running_service->user_id = $get_user->user_id;
                            $provider_running_service->service_category_id = $ride_details->service_category_id;
                            $provider_running_service->ride_id = $ride_details->ride_id;
                            $provider_running_service->save();
                        }
                    }
                    if ($ride_details != Null) {
                        $pickup = array_map('trim', explode(",", $ride_details->pickup_latlong));
                        $destination = array_map('trim', explode(",", $ride_details->destination_latlong));
                        $way_points[] = [
                            "address" => $ride_details->pickup_address,
                            "address_lat" => trim($pickup[0]),
                            "address_long" => trim($pickup[1])
                        ];
                        if ($ride_details->is_way_point == 1) {
                            $ride_way_point = UserRideWayPoint::query()->where('ride_id', $ride_details->id)->first();
                            if ($ride_way_point != Null) {
                                if ($ride_way_point->way_point_1 != Null && $ride_way_point->lat_long_1 != Null) {
                                    $lat_long_1 = array_map('trim', explode(",", $ride_way_point->lat_long_1));
                                    $way_points[] = [
                                        "address" => $ride_way_point->way_point_1,
                                        "address_lat" => trim($lat_long_1[0]),
                                        "address_long" => trim($lat_long_1[1])
                                    ];
                                }
                                if ($ride_way_point->way_point_2 != Null && $ride_way_point->lat_long_2 != Null) {
                                    $lat_long_2 = explode(",", $ride_way_point->lat_long_2);
                                    $way_points[] = [
                                        "address" => $ride_way_point->way_point_1,
                                        "address_lat" => trim($lat_long_2[0]),
                                        "address_long" => trim($lat_long_2[1])
                                    ];
                                }
                                if ($ride_way_point->way_point_3 != Null && $ride_way_point->lat_long_3 != Null) {
                                    $lat_long_3 = explode(",", $ride_way_point->lat_long_3);
                                    $way_points[] = [
                                        "address" => $ride_way_point->way_point_3,
                                        "address_lat" => trim($lat_long_3[0]),
                                        "address_long" => trim($lat_long_3[1])
                                    ];
                                }

                            }
                        }
                        $way_points[] = [
                            "address" => $ride_details->destination_address,
                            "address_lat" => trim($destination[0]),
                            "address_long" => trim($destination[1])
                        ];
                        $ride_details_arr = [
                            "ride_id" => $ride_details->ride_id,
                            "user_id" => $user->id,
                            "user_fcm_token" => $user->device_token,
                            "booking_no" => $ride_details->booking_no,
                            "service_category_id" => $ride_details->service_category_id,
                            "user_profile_image" => $ride_details->user_profile_image,
                            "user_name" => $ride_details->user_name,
                            "contact_number" => $ride_details->contact_number,
                            "address_list" => $way_points,
                            "flat_no" => '',
                            "landmark" => '',
                            "pickup_datetime" => $ride_details->pickup_datetime,
                            "total_amount" => round($ride_details->total_amount * $currency, 2),
                            "payment_type" => $ride_details->payment_type,
                            "ride_status" => $ride_details->ride_status,
                            "way_point_status" => $ride_details->way_point_status,
                        ];

                        $service_category = ServiceCategory::where('id', $ride->service_category_id)->first();
                        if ($service_category != Null) {
                            
                        }

                        return response()->json([
                            "status" => 1,
                            "message" => "success!",
                            "message_code" => 1,
                            "driver_current_status" => $driver_service->current_status,
                            "ride_details" => $ride_details_arr,
                            "noti_log" => $notification_log
                        ]);
                    }
                    else {
                        return response()->json([
                            "status" => 0,
                            "message" => "ride details not found!",
                            "message_code" => 26,
                        ]);
                    }

                    /* return response()->json([
                        "status" => 1,
                        "message" => "success!",
                        "ride_id" => $ride->id,
                        "service_category_id" => $ride->service_category_id,
                        "driver_current_status" => $driver_service->current_status
                    ]); */
                } else {
                    return response()->json([
                        "status" => 0,
                        "message" => "driver service not found!",
                        "message_code" => 9,
                    ]);
                }
            }
            else {
                return response()->json([
                    "status" => 0,
                    "message" => "Something went wrong! Driver Problem!",
                    "message_code" => 9,
                ]);
            }
        } else {
            return response()->json([
                "status" => 0,
                "message" => "ride not found!",
                "message_code" => 26,
            ]);
        }
    }
    //user notification
    public function userTransportNotification($ride_id, $device_token, $ride_status, $login_device)
    {
        /* return response()->json([
                'ride_id' => $ride_id,
                'device_token' => $device_token,
                'ride_status' => $ride_status,
                "login_device" => $login_device
            ]); */
        if ($ride_id == Null || $device_token == Null || $ride_status == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something's wrong!",
                'message_code' => 9
            ]);
        }
        /* $general_settings = GeneralSettings::select('fcm_server_key')->first();
        if ($general_settings == Null || $general_settings->fcm_server_key == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something want wrong!",
                'message_code' => 9
            ]);
        } */
        $ride = Ride::where('id', $ride_id)->first();
        if ($ride == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something's wrong!",
                'message_code' => 9
            ]);
        }
        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        $server_key = trim($fcm_server_key);
        $title = "Rider";
        $title_code = 91;
        if ($ride_status == 1) {
            $message = "Driver Accepted Ride.";
            $message_code = 16;
        } elseif ($ride_status == 2) {
            $message = "Driver Accepted Schedule Ride.";
            $message_code = 45;
        } elseif ($ride_status == 3) {
            $message = "Driver arrived to pickup location.";
            $message_code = 46;
        } elseif ($ride_status == 4) {
            $message = trim(ucwords(strtolower($ride->cancel_by))) . " cancel the ride.";
            if (trim(ucwords(strtolower($ride->cancel_by))) == "Admin") {
                $message_code = 113;
                $title_code = 65;
            } else {
                $message_code = 20;
                $title_code = 65;
            }
        } elseif ($ride_status == 5) {
            $message = "Driver start the ride.";
            $message_code = 19;
        } elseif ($ride_status == 6) {
            $message = "Arrived to destination location.";
            $message_code = 48;
        } elseif ($ride_status == 9) {
            $message = "Driver completed the ride.";
            $message_code = 49;
        }
        /* elseif ($ride_status == 10) {
            $message = "Your ride is failed.";
        } */
        else {
            return response()->json([
                'status' => 0,
                'message' => "Something's wrong!",
                'message_code' => 9
            ]);
        }
        //notification type 0= simple , 1= communication
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        if ($login_device == 1) {
            $extraNotificationData = [
                'title' => $title,
                'title_code' => $title_code - 0,
                'sound' => true,
                'notification_type' => 1,
                'order_id' => $ride_id,
                'order_status' => $ride_status - 0,
                'message' => $message,
                'message_code' => $message_code,
                'service_category_id' => $ride->service_category_id,
                'booking_type' => $ride->ride_type
            ];
            $arrayToSend = [
                'to' => $device_token, //single token
                'data' => $extraNotificationData
            ];
        } elseif ($login_device == 2) {
            $extraNotificationData = [
                'notification_type' => 1,
                'order_id' => $ride_id,
                'order_status' => $ride_status - 0,
                'service_category_id' => $ride->service_category_id,
                'booking_type' => $ride->ride_type
            ];
            $fcmNotification = [
                'title' => $title,
                "title_loc_key" => $title_code - 0,
                "body_loc_key" => $message_code,
                'text' => $message,
                'sound' => 'default',
                'badge' => '1',
                'addData' => $extraNotificationData
            ];
            $arrayToSend = array(
                'to' => $device_token,
                'notification' => $fcmNotification,
                'priority' => 'high',
            );
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Something want wrong!",
                'message_code' => 9
            ]);
        }

        $headers = [
            'Authorization: key=' . $server_key,
            //'Authorization: key=AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls',
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
        $result = curl_exec($ch);
        curl_close($ch);
        //return $result;
        return response()->json([
                'res' => $result,
            ]);
    }
    public function userTransportCancelNotification($ride_id, $device_token, $ride_status, $login_device)
    {
        /* return response()->json([
                'ride_id' => $ride_id,
                'device_token' => $device_token,
                'ride_status' => $ride_status,
                "login_device" => $login_device
            ]); */
        if ($ride_id == Null || $device_token == Null || $ride_status == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something's wrong!",
                'message_code' => 9
            ]);
        }
        /* $general_settings = GeneralSettings::select('fcm_server_key')->first();
        if ($general_settings == Null || $general_settings->fcm_server_key == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something want wrong!",
                'message_code' => 9
            ]);
        } */
        $ride = Ride::where('id', $ride_id)->first();
        if ($ride == Null) {
            return response()->json([
                'status' => 0,
                'message' => "Something's wrong!",
                'message_code' => 9
            ]);
        }
        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        $server_key = trim($fcm_server_key);
        $title = "Rider";
        /* $title_code = 91;
        if ($ride_status == 1) {
            $message = "Driver Accepted Ride.";
            $message_code = 16;
        } elseif ($ride_status == 2) {
            $message = "Driver Accepted Schedule Ride.";
            $message_code = 45;
        } elseif ($ride_status == 3) {
            $message = "Driver arrived to pickup location.";
            $message_code = 46;
        } elseif ($ride_status == 4) { */
        $cancel_by = User::find($ride->cancel_by);
        $message = trim(ucwords(strtolower($cancel_by->name))) . " cancel the ride.";
        if (trim(ucwords(strtolower($ride->cancel_by))) == "Admin") {
            $message_code = 113;
            $title_code = 65;
        } else {
            $message_code = 20;
            $title_code = 65;
        }
        /* } elseif ($ride_status == 5) {
            $message = "Driver start the ride.";
            $message_code = 19;
        } elseif ($ride_status == 6) {
            $message = "Arrived to destination location.";
            $message_code = 48;
        } elseif ($ride_status == 9) {
            $message = "Driver completed the ride.";
            $message_code = 49;
        } */
        /* elseif ($ride_status == 10) {
            $message = "Your ride is failed.";
        } 
        else {
            return response()->json([
                'status' => 0,
                'message' => "Something's wrong!",
                'message_code' => 9
            ]);
        }*/
        //notification type 0= simple , 1= communication
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

        if ($login_device == 1) {
            $extraNotificationData = [
                'title' => $title,
                'title_code' => $title_code - 0,
                'sound' => true,
                'notification_type' => 2,
                'order_id' => $ride_id,
                'order_status' => $ride_status - 0,
                'message' => $message,
                'message_code' => $message_code,
                'service_category_id' => $ride->service_category_id,
                'booking_type' => $ride->ride_type
            ];
            $arrayToSend = [
                'to' => $device_token, //single token
                'data' => $extraNotificationData
            ];
        } elseif ($login_device == 2) {
            $extraNotificationData = [
                'notification_type' => 1,
                'order_id' => $ride_id,
                'order_status' => $ride_status - 0,
                'service_category_id' => $ride->service_category_id,
                'booking_type' => $ride->ride_type
            ];
            $fcmNotification = [
                'title' => $title,
                "title_loc_key" => $title_code - 0,
                "body_loc_key" => $message_code,
                'text' => $message,
                'sound' => 'default',
                'badge' => '1',
                'addData' => $extraNotificationData
            ];
            $arrayToSend = array(
                'to' => $device_token,
                'notification' => $fcmNotification,
                'priority' => 'high',
            );
        } else {
            return response()->json([
                'status' => 0,
                'message' => "Something want wrong!",
                'message_code' => 9
            ]);
        }

        $headers = [
            'Authorization: key=' . $server_key,
            //'Authorization: key=AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls',
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
        $result = curl_exec($ch);
        curl_close($ch);
        //return $result;
        return response()->json([
                'res' => $result,
            ]);
    }


    public function scheduleRideNotification($user, $ride)
    {
        //$this->driverTransportAndroidRequestNotification($service_category_id, $ride_request, $timeout);
        //$this->driverTransportIosRequestNotification($service_category_id, $ride_request, $timeout);
        $title = "Schedule Ride Notification";
        $fcm_server_key = "AAAA-y0R-34:APA91bGj6xzHgEDmIFqx6sa-QL2wsPwvBMJpYxu1YxhvoE5wIblPmbnHHEku0Y-IMoqyg8-WSnyPdZxvdW0AXmj3ywqJzyB0fON23iS-U9n-gjHCD9xFlJ9RIwIMWgeF6ttCviuArvls";
        $server_key = trim($fcm_server_key);
        $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
        $title_code = 91;
        $notification = [
            "title" => $title,
            "service_category_id" => $ride->service_category_id,
            "title_code" => 22,
            "order_id" =>$ride->id,
            "booking_type" => $ride->ride_type,
            "order_status" => $ride->status,
            "sound" => true,
            "description" => "New Request",
            "message_code" => 90,
        ];
        $extraNotificationData = [
            'message' => $notification
        ];
        if($user->login_device ==1){
            $fcmNotification = [
                'to' => $user->device_token, 
                'data' => $extraNotificationData,
            ];
        }
        if($user->login_device ==2){
            // $fcmNotification = array(
            //     'to' => $user->device_token,
            //     'notification' => $notification,
            //     'priority' => 'high',
            // );
            $extraNotificationData = [
                'notification_count' => 2,
                'notification_type' => 1,
                'order_id' => $ride->id,
                'order_status' => $ride->status - 0,
                'service_category_id' => $ride->service_category_id,
                'booking_type' => $ride->ride_type
            ];
            $fcmNotification = [
                'title' => $title,
                "title_loc_key" => $title_code - 0,
                "body_loc_key" => 45,
                'text' => "Schedule ride time just started.",
                'sound' => 'default',
                'badge' => '1',
                'addData' => $extraNotificationData
            ];
            $fcmNotification = array(
                'to' => $user->device_token,
                'notification' => $fcmNotification,
                'priority' => 'high',
            );
        }
    
        // $fcmNotification = [
        //     'to' => $user->device_token,
        //     'notification' => $extraNotificationData,
        //     'priority' => 'high',
        // ];     
        $headers = [
            'Authorization: key=' . $server_key,
            'Content-Type: application/json'
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    
}