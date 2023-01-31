<?php

namespace App\RealtimeDataHelper;

use App\Constants\NotificationType;
use App\Constants\ReceiverType;
use App\Constants\ServiceCategoryType;
use App\Events\OrderCreated;
use App\Events\OrderStatusUpdated;
use App\Events\PropertyScheduleCreated;

class WebSocketUtility 
{

    public function send($serviceCategory, $notificationType, $receiverType, $data = [])
    {
        if($receiverType == ReceiverType::SELLER)
        {
            $this->sendToSeller($serviceCategory, $notificationType, $data);
        }
        elseif($receiverType == ReceiverType::USER)
        {
            $this->sendToUser($serviceCategory, $notificationType, $data);
        }
        elseif($receiverType == ReceiverType::ADMIN)
        {
            $this->sendToAdmin($serviceCategory, $notificationType, $data);
        }
    }

    private function sendToSeller($serviceCategory, $notificationType, $data)
    {
        if($serviceCategory == ServiceCategoryType::BEEDA_MALL && $notificationType == NotificationType::ORDER_CREATED)
        {
            broadcast(new OrderCreated($data));
        }
        if($serviceCategory == ServiceCategoryType::ALL && $notificationType == NotificationType::ORDER_CREATED)
        {
            broadcast(new OrderCreated($data));
        }
        else if($serviceCategory == ServiceCategoryType::REAL_ESTATE && $notificationType == NotificationType::PROPERTY_SCHEDULE_CREATED)
        {
            broadcast(new PropertyScheduleCreated($data));
        }
    }

    private function sendToUser($serviceCategory, $notificationType, $data)
    {
        if($serviceCategory == ServiceCategoryType::ALL && $notificationType == NotificationType::ORDER_STATUS_UPDATED)
        {
            broadcast(new OrderStatusUpdated($data));
        }
    }

    private function sendToAdmin($serviceCategory, $notificationType, $data)
    {
        
    }
    public function sendLoanNotification($loan){
        
    }
    
}
