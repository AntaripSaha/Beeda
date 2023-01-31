<?php

namespace App\Models;

use App\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanDocument extends Model
{
    use HasFactory;
    protected $table = "loan_documents";
    public function loan()
    {
        return $this->belongsTo(Loan::class, 'loan_id');
    }
    public function image()
    {
        return $this->belongsTo(Upload::class, 'document_image');
    }
    public function document_name()
    {
        return $this->belongsTo(LoanRequiredDocument::class, 'loan_required_document_id');
    }
}
