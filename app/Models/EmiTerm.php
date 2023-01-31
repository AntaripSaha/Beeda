<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmiTerm extends Model
{
    use HasFactory;
    protected $table = "emi_terms";
    public function loans(){
        return $this->hasMany(Loan::class);
    }
}
