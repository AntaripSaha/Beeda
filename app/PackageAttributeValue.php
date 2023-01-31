<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageAttributeValue extends Model
{
    protected $fillable = ['package_attribute_id', 'title', 'value','icon'];

    public function packageAttribute()
    {
        return $this->belongsTo(PackageAttribute::class);
    }
}
