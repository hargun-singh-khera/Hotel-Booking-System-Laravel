<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelRoomAlloted extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'hotel_room_alloteds'; 
    protected $primaryKey = 's_no';
}
