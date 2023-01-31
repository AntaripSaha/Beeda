<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ServiceCategory;

class RequiredDocument extends Model
{
    public function service()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function toggleStatus()
    {
        $this->status= !$this->status;
        return $this;
    }
}
