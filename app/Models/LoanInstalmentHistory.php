<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanInstalmentHistory extends Model
{
    use HasFactory;
    protected $table = "loan_installment_histories";
    protected $fillable = ['loan_id', 'main_amount', 'paid_amount', 'interest_rate', 'card_id', 'payable_amount','last_date', 'min_percentage', 'status'];
}
