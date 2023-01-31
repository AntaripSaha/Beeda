<?php



namespace App;



use Illuminate\Database\Eloquent\Model;



class Currency extends Model

{

    protected $fillable = [
        'name', 'code', 'symbol', 'exchange_rate', 'reward_point_exchange_rate', 'status','ratio'
    ];

}

