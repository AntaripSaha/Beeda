<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConnectionList extends Model
{
    protected $table = "connection_lists";
    
    public function businessCard()
    {
        return $this->belongsTo(BusinessCard::class, 'business_card_id');
    }
    public function connectedbusinessCard()
    {
        return $this->belongsTo(BusinessCard::class, 'connected_business_card_id');
    }
}
