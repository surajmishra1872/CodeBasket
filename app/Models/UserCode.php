<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCode extends Model
{
    use HasFactory;

    protected $table = "user_code";
    protected $primaryKey = "code_id";
    public  $timestamps = true;
    protected $guarded = ['code_id'];  
    
}
