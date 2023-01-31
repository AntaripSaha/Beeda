<?php

namespace App;
use App\RequiredDocument;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $table = 'service_categories';
    protected $fillable = [
        'name', 'icon_image', 'slug', 'display_order','category_type', 'status'
    ];

    public function documents()
    {
        return $this->hasMany(RequiredDocument::class);
    }
}

