<?php

namespace App\RealtimeDataHelper;

use App\Constants\NotificationType;
use App\Constants\ReceiverType;
use App\Constants\ServiceCategoryType;
use App\Events\OrderCreated;
use App\User;

class FirebaseUtility 
{

    public function send($serviceCategory, $notificationType, $receiverType, $data = [])
    {
        
        if($serviceCategory == ServiceCategoryType::BEEDA_MALL && $notificationType == NotificationType::ORDER_CREATED && $receiverType == ReceiverType::SELLER)
        {
            $this->sendOrderNotification($data);
        }

        // if($serviceCategory == ServiceCategoryType::ALL && $notificationType == NotificationType::ORDER_STATUS_UPDATED && $receiverType == ReceiverType::USER)
        // {
        //     $this->sendOrderNotification($data);
        // }

        else if($serviceCategory == ServiceCategoryType::REAL_ESTATE && $notificationType == NotificationType::PROPERTY_SCHEDULE_CREATED && $receiverType == ReceiverType::SELLER)
        {
            $this->sendOrderNotification($data);
        }
    }
    public function sendLoanNotification($loan){
        $firebaseToken = User::where('id', $loan->user_id)->pluck('device_token');
        $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "header"            =>  $loan->header,
                "title"             =>  $loan->title,
                "body"              =>  $loan->body,
                "loan_id"           =>  $loan->loan_id,
                "content_available" => true,
                "priority"          => "high",
            ]
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        return $response;
    }

    public function sendOrderNotification($receiver_ids)
    {
        $firebaseTokens = User::whereIn('id', $receiver_ids)->pluck('device_token');
        $SERVER_API_KEY = env('FIREBASE_SERVER_KEY');

        $data = [
            "registration_ids" => $firebaseTokens,
            "notification" => [
                "title" =>'Order',
                "body" => 'You have a new order',
                "icon" => "https://www.pinclipart.com/picdir/middle/213-2134500_shopping-cart-logo-png-clipart.png",
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);
        return $response;
    }

    public function sendRideNotification($receiver_ids,$data)
    {
        try{
                $firebaseTokens = User::whereIn('id', $receiver_ids)->pluck('device_token');
                $SERVER_API_KEY = env("FIREBASE_SERVER_KEY");
                $headers = [
                    'Authorization: key=' . $SERVER_API_KEY,
                    'Content-Type: application/json',
                ];
                $data['extra']['title'] = $data['title'];
                $data['extra']['body'] = $data['body'];
                $arrayToSend = array(
                    'registration_ids' => $firebaseTokens,
                    'priority' => 'high',
                    "content_available" => true,
                    "apns-priority" => 10,
                    'data' => $data['extra']
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayToSend));
    
                $response = curl_exec($ch);
                return $response;
            }catch(\Exception $e){
                return $e->getMessage();
            }
    }
    
}
