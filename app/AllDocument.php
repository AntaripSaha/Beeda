<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Upload;
use App\RequiredDocument;

class AllDocument extends Model
{
    public function doc_file()
    {
        return $this->belongsTo(Upload::class, 'document_file');
    }

    public function required_document()
    {
        return $this->belongsTo(RequiredDocument::class, 'required_document_id');
    }
}
