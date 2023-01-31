<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanNotification extends Model
{
    use HasFactory;
    protected $table = "loan_notifications";
    protected $fillable = ['header', 'title', 'body', 'user_id','loan_id'];
}
