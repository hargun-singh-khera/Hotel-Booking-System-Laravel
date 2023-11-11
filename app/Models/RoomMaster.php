<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMaster extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'room_masters'; 
    protected $primaryKey = 'room_id';
}
