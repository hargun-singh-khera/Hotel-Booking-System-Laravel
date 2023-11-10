<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HotelRoomAlloted;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{
    public function search(Request $request) {
        $data = $request->input();
        $request->session()->put('locations', $data['locations']);
        $request->session()->put('checkin', $data['checkin']);
        $request->session()->put('checkout', $data['checkout']);
        $request->session()->put('guests', $data['guests']);
        $request->session()->put('rooms', $data['rooms']);
        // echo "Location: " .session('locations') ."<br/>";
        // echo "Check IN: " . session('checkin') ."<br/>";
        // echo "Check Out: " . session('checkout') ."<br/>";
        // echo "Guests: " . session('guests') ."<br/>";
        // echo "Rooms: " . session('rooms') ."<br/>";

        $search = $request['locations'] ?? "";
        // echo "Search query: " .$search;
        $locations = app(LocationController::class)->view();
        if($search != "" && $search != "Where to?") {
            $hotels = DB::table('hotel_room_alloteds')
                            ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                            ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                            ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                            ->where('location_masters.location_id', '=', $search)
                            ->get();
        }
        else {
            $hotels = DB::table('hotel_room_alloteds')
                            ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', '=', 'hotel_masters.hotel_id')
                            ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                            ->join('room_masters', 'room_masters.room_id', '=', 'hotel_room_alloteds.room_id')
                            ->get();
        }
        $data = compact('locations','hotels');
        // return $data;
        return view('home')->with($data);

        // return redirect('/');
    }
}
