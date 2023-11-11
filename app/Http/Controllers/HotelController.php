<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\HotelMaster;
use App\Models\LocationMaster;

class HotelController extends Controller
{
    public function view() {
        $hotels = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->select('hotel_masters.*', 'location_masters.*', DB::raw('(SELECT MIN(rate_per_night) FROM hotel_room_alloteds WHERE hotel_id = hotel_masters.hotel_id) AS rate_per_night'))
                    ->get();
        return $hotels;
    }

    public function hotels($id) {
        
        $hotels = DB::table('hotel_masters')
                    ->join('location_masters', 'location_masters.location_id', 'hotel_masters.location_id')
                    ->join('hotel_room_alloteds', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                    ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                    ->select(
                        'hotel_masters.*',
                        'location_masters.location',
                        'room_masters.room_id',
                        'room_masters.room_type',
                        DB::raw('(SELECT MIN(hotel_room_alloteds.rate_per_night) FROM hotel_room_alloteds WHERE hotel_room_alloteds.hotel_id = hotel_masters.hotel_id) AS rate_per_night'),
                        'hotel_room_alloteds.no_of_rooms',
                        'hotel_room_alloteds.no_of_guests',
                        'hotel_room_alloteds.room_image'
                    )
                    ->where('hotel_masters.hotel_id', '=', $id)
                    ->orderBy('rate_per_night')
                    ->limit(1)
                    ->get();

        $rooms = DB::table('hotel_masters')
                        ->join('hotel_room_alloteds', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                        ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                        ->where('hotel_masters.hotel_id','=',$id)
                        ->get();
        $data = compact("hotels","rooms");
        // return $data;
        return view('hotel')->with($data);
    }

    public function booking($hotelId, $roomId) {
        $hotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id', '=', $hotelId)
                    ->where('hotel_room_alloteds.room_id', '=', $roomId) 
                    ->get();

        $showAlert = false;
        $data = compact("hotels", "hotelId", "roomId", "showAlert");
        // return $data;
        session()->put('room', $hotels[0]->room_type);
        return view('booking')->with($data);
    }

    public function bookingMessage(Request $request, $hotelId, $roomId) {
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required | email',
                'number' => 'required'
            ]
        );
        $hotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id', '=', $hotelId)
                    ->where('hotel_room_alloteds.room_id', '=', $roomId) 
                    ->get();

        $showAlert = false;

        if ($request->has('paybtn')) {
            $showAlert = true;
        }
        // return redirect()->back()->with('showAlert', $showAlert);
        $data = compact('showAlert', 'hotelId', 'roomId','hotels');
        // return $data;
        return view('booking', $data);
    }
}
