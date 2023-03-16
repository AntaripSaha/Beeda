<?php

namespace App\Models;

use App\Models\SellerRequiredDocument;
use Illuminate\Database\Eloquent\Model;

class SellerDocument extends Model
{
    protected $table = "seller_documents";

    protected $fillable = [
        'seller_id', 'seller_required_document_id', 'document_image', 'status'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class)->select('id', 'name');
    }

    public function document_img()
    {
        return $this->belongsTo(Upload::class, 'document_image')->select('id', 'file_name');
    }
    public function document_name()
    {
        return $this->belongsTo(SellerRequiredDocument::class, 'seller_required_document_id')->select('id', 'name');
    }
}