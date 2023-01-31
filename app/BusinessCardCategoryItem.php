<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCardCategoryItem extends Model
{
    protected $table = 'business_card_category_items';
    
    public function businessCardCategory()
    {
        return $this->belongsTo(BusinessCardCategory::class, 'business_card_categories');
    }

    public function getLogo(){
        return $this->belongsTo(Upload::class, 'logo');
    }

    public function banner(){
        return $this->belongsTo(Upload::class, 'banner');
    }
}
