<?php

namespace App\Services;

use App\Constants\ServiceCategoryType;
use App\RealtimeDataHelper\FirebaseUtility;
use App\RealtimeDataHelper\WebSocketUtility;

class NotificationService
{
    public function sendNotification($serviceCategory, $notificationType, $receiverType, $data)
    {
           if(env('WEBSOCKET_SERVICE'))
           {
              $webSocket =  new WebSocketUtility;
              $webSocket->send($serviceCategory, $notificationType, $receiverType, $data);
           }
           else if(env('FIREBASE_SERVICE'))
           {
                $firebase = new FirebaseUtility;
                $firebase->send($serviceCategory, $notificationType, $receiverType, $data);
           }
    }
    public function sendLoanNotification($loan_notification)
    {
           if(env('WEBSOCKET_SERVICE'))
           {
              $webSocket =  new WebSocketUtility;
              $webSocket->sendLoanNotification($loan_notification);
           }
           else if(env('FIREBASE_SERVICE'))
           {
                $firebase = new FirebaseUtility;
                $firebase->sendLoanNotification($loan_notification);
                
           }
    }
}
