<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Upload;

class ProductStock extends Model
{
    
    public function product(){
    	return $this->belongsTo(Product::class);
    }

    public function product_image()
    {
        return $this->belongsTo(Upload::class, 'image');
    }
}
