<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCardCategory extends Model
{
    protected $table = "business_card_categories";

    public function business_card_category_item()
    {
        return $this->hasMany(BusinessCardCategoryItem::class, 'busines_card_category_id');
    }
}
