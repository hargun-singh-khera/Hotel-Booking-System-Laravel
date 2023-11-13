<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTypeMaster extends Model
{
    use HasFactory;
    protected $table = 'user_type_masters'; 
    protected $primaryKey = 'user_type_id';
}
