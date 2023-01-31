<?php



namespace App;

use App\Events\AddressCreated;

use Illuminate\Database\Eloquent\Model;

class Address extends Model

{

    protected $fillable = ['set_default'];

    /**
     * The event map for the model.
     *
     * Allows for object-based events for native Eloquent events.
     *
     * @var array
     */
    protected $dispatchesEvents = [
        'created' => AddressCreated::class
    ];

}

