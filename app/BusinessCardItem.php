<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCardItem extends Model
{
    protected $table = "business_card_items";
    
    public function businessCard()
    {
        return $this->belongsTo(BusinessCard::class, 'business_card_id');
    }
    public function businessCardCategoryItem()
    {
        return $this->belongsTo(BusinessCardCategoryItem::class, 'business_card_item_category_id');
    }
}
