<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationMaster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'location_masters'; 
    protected $primaryKey = 'location_id';
}
