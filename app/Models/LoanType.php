<?php

namespace App\Models;

use App\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    use HasFactory;
    protected $table = "loan_types";
    protected $fillable = [
        'loan_type',
        'basis',
        'image',
        'image_background',
        'max_amount_background',
        'max_amount',
        'max_emi_term_id',
        'interest_rate',
        'processing_fee',
        'type',
        'status',
        'late_penalty_percentage',
        'advance_pay_decrease_percentage',
        'min_emi_percentage'
    ];
    public function loan_image(){
        return $this->belongsTo(Upload::class, 'image');
    }
    public function max_emi_term(){
        return $this->belongsTo(EmiTerm::class, 'max_emi_term_id');
    }
    public function documents(){
        return $this->hasMany(LoanRequiredDocument::class);
    }
}
