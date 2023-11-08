<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HotelMaster;
use App\Models\LocationMaster;

class HotelController extends Controller
{
    public function view() {
        $hotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                    // ->select('hotel_masters.name', 'hotel_masters.image', 'location_masters.location', 'room_masters.room_type' ,'hotel_room_alloteds.no_of_rooms', 'hotel_room_alloteds.no_of_guests', 'hotel_room_alloteds.rate_per_night', 'hotel_room_alloteds.room_image')
                    ->get();
        $data = compact("hotels");
        return view('home')->with($data);
        // return $hotels;
    }

    public function hotels($id) {
        $hotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id', '=', $id)
                    // ->select('hotel_masters.name', 'hotel_masters.image', 'location_masters.location', 'room_masters.room_type' ,'hotel_room_alloteds.no_of_rooms', 'hotel_room_alloteds.no_of_guests', 'hotel_room_alloteds.rate_per_night', 'hotel_room_alloteds.room_image')
                    ->get();
        $data = compact("hotels");
        return view('hotel')->with($data);
        // return $hotels;
    }

    public function booking($hotelId, $roomId) {
        $hotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id', '=', $hotelId)
                    ->where('hotel_room_alloteds.room_id', '=', $roomId) // Add the additional condition here
                    ->get();
        $data = compact("hotels");
        return view('booking')->with($data);
        // return $hotels;
    }
}
