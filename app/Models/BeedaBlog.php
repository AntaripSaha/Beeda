<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BeedaBlog extends Model
{
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function thumbnail()
    {
        return $this->belongsTo(Upload::class, 'thumbnail');
    }

    public function img()
    {
        return $this->belongsTo(Upload::class, 'banner');
    }

    public function metaImg()
    {
        return $this->belongsTo(Upload::class, 'meta_img');
    }

}

