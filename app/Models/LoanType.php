<?php

namespace App\Models;

use App\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{
    use HasFactory;
    protected $table = "loan_types";
    public function loan_image(){
        return $this->belongsTo(Upload::class, 'image');
    }
    public function max_emi_term(){
        return $this->belongsTo(EmiTerm::class, 'max_emi_term_id');
    }
}
