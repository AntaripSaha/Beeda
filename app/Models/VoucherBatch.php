<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Voucher;

class VoucherBatch extends Model
{

    protected $fillable = ['batch_no', 'status', 'currency', 'voucher_count', 'activated_at', 'reference', 'created_at', 'updated_at'];

    public function vouchers()
    {
        return $this->hasMany(Voucher::class, 'batch_id');
    }

    public function currency()
    {
        return $this->belongsTo(\App\Currency::class, 'currency');
    }
}
