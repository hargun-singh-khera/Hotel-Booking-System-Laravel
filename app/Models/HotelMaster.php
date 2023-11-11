<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelMaster extends Model
{
    use HasFactory;
    // protected $primaryKey = "id";
    // public function locations() {
    //     return $this->hasMany('App\Models\LocationMaster', 'location_id', 'location_id');
    // }
    public $timestamps = false;

}
