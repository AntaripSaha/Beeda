<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Upload;

class Video extends Model
{
    use HasFactory;
    protected $table = 'videos';

    
    public function videolink()
    {
        return $this->belongsTo(Upload::class, 'video');
    }
    
    public function imageLink()
    {
        return $this->belongsTo(Upload::class, 'image');
    }
}
