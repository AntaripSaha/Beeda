<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageAttribute extends Model
{
    protected $fillable = ['title', 'units', 'required','input_type'];
    
    public function packageAttributeValue()
    {
        return $this->hasMany(PackageAttributeValue::class);
    }

    public function packageTypes()
    {
        return $this->belongsToMany(PackageType::class, 'package_type_attributes','package_attribute_id' ,'package_type_id');
    }
}
