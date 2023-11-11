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
        session()->put('filtered', 'true');
        $search = $request['locations'] ?? "";
        $locations = app(LocationController::class)->view();
        if($search != "" && $search != "Where to?") {
            $hotels = DB::table('hotel_masters')
                            ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                            ->select('hotel_masters.*', 'location_masters.*', DB::raw('(SELECT MIN(rate_per_night) FROM hotel_room_alloteds WHERE hotel_id = hotel_masters.hotel_id) AS rate_per_night'))
                            ->where('location_masters.location_id', '=', $search)
                            ->get();
                // return $hotels;
        }
        else {
            $hotels = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', '=', 'location_masters.location_id')
                    ->select('hotel_masters.*', 'location_masters.*', DB::raw('(SELECT MIN(rate_per_night) FROM hotel_room_alloteds WHERE hotel_id = hotel_masters.hotel_id) AS rate_per_night'))
                    ->get();
            // return $hotels;
        }
        $data = compact('locations','hotels');
        // return $data;
        return view('home')->with($data);
    }
}
