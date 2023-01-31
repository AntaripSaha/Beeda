<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = "cards";
    protected $fillable = ['user_id','name','card_no','month', 'year','cvv','type','status'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
