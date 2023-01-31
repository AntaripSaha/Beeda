<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VoucherBatch;

class Voucher extends Model
{
    protected $fillable = [
        'batch_id', 'voucher_no', 'secret_code', 'activation_key', 'activated_by', 'activated_at', 'currency',
        'value', 'status', 'redeemed_by', 'redeemed_at', 'created_at', 'updated_at'
    ];

    public function batch()
    {
        return $this->belongsTo(VoucherBatch::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'redeemed_by');
    }

    public function activator()
    {
        return $this->belongsTo(User::class, 'activated_by');
    }

    public function currency()
    {
        return $this->belongsTo(\App\Currency::class, 'currency');
    }
}

