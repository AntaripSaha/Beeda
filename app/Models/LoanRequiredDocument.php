<?php

namespace App\Models;

use App\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanRequiredDocument extends Model
{
    use HasFactory;
    protected $table = "loan_required_documents";
    protected $fillable = [
        'name',
        'demo_image',
        'loan_type_id',
        'status',
    ];
    public function image()
    {
        return $this->belongsTo(Upload::class, 'demo_image');
    }
}
