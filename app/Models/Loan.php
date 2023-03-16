<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;
    protected $table = "loans";
    protected $fillable =
        [
            'total_payable_amount',
            'approval_date',
            'total_payable_amount',
            'ending_date'
        ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function loan_type(){
        return $this->belongsTo(LoanType::class, 'loan_type_id');
    }
    public function emi_term(){
        return $this->belongsTo(EmiTerm::class, 'emi_term_id');
    }
    public function loan_document(){
        return $this->hasMany(LoanDocument::class);
    }
    public function installment_history(){
        return $this->hasMany(LoanInstalmentHistory::class);
    }
}
