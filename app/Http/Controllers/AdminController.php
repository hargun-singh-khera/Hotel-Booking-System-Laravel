<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\RoomMaster;
use App\Models\LocationMaster;
use App\Models\HotelMaster;
use App\Models\HotelRoomAlloted;

class AdminController extends Controller
{
    public function addRoom(Request $request) {
        $request->validate(
            [
                'room_type' => 'required'
            ]
        );
        $room = new RoomMaster;
        $room->room_type = $request['room_type'];
        $room->save();
        $showAlert = false;
        $isUpdate = false;
        $title = "Add Entry";
        $url = url('/admin/room_master');
        if ($request->has('button')) {
            $showAlert = "New Room has been added successfully.";
        }
        $rooms = RoomMaster::all();
        $data = compact('rooms', 'showAlert', 'isUpdate', 'title', 'url');
        return view('admin.room_master')->with($data);
    }

    public function showRooms() {
        $rooms = RoomMaster::all();
        $title = "Add Entry";
        $showAlert = false;
        $isUpdate = false;
        $url = url('/admin/room_master');
        $data = compact('rooms', 'title', 'showAlert', 'isUpdate', 'url');
        return view('admin.room_master')->with($data);
    }

    public function editRoom(Request $request, $id) {
        $room = RoomMaster::find($id);
        $rooms = RoomMaster::all();
        $title = "Save Entry";
        $isUpdate = false;
        $showAlert = false;
        if(is_null($rooms)) {
            return redirect('admin.room_master');
        }
        else {
            if ($request->has('update')) {
                $isUpdate = true;
            }
            $url = url('/admin/room_master/update') ."/".$id;
            $data = compact('rooms', 'title', 'showAlert', 'room', 'url', 'isUpdate');
            return view('admin.room_master')->with($data);
        }
    }

    public function updateRoom(Request $request, $id) {
        $rooms = RoomMaster::all();
        $updateRoom = RoomMaster::find($id);
        $updateRoom->room_type = $request['room_type'];
        $updateRoom->save();
        $isUpdate = true;
        $showAlert = false;
        $title = "Add Entry";
        $url = url('/admin/room_master');
        $data = compact('rooms', 'title', 'showAlert', 'isUpdate', 'url');
        // return $data;
        return redirect(route('admin.room_master'))->with($data);
    }

    public function deleteRoom($id) {
        $room = RoomMaster::find($id);
        if(!is_null($room)) {
            $room->delete();
        }
        $showAlert = "Room has been deleted successfully.";
        $url = url('/admin/room_master/');
        $isUpdate = false;
        $title = "Add Entry";
        $rooms = RoomMaster::all();
        $data = compact('showAlert', 'url', 'isUpdate', 'title', 'rooms');
        return view('admin.room_master')->with($data);
    }

    public function addLocation(Request $request) {
        $request->validate(
            [
                'location' => 'required'
            ]
        );
        $location = new LocationMaster;
        $location->location = $request['location'];
        $location->save();
        $showAlert = false;
        $isUpdate = false;
        $url = url('/admin/location_master');
        if ($request->has('button')) {
            $showAlert = "New Location has been added successfully.";
        }
        $locations = LocationMaster::all();
        $title = "Add Entry";
        $data = compact('locations', 'title', 'showAlert', 'url', 'isUpdate');
        return view('admin.location_master')->with($data);
    }

    public function showLocations(Request $request) {
        $url = url('/admin/location_master');
        $locations = LocationMaster::all();
        $title = "Add Entry";
        $showAlert = false;
        $isUpdate = false;

        $data = compact('locations', 'title', 'showAlert','url','isUpdate');
        return view('admin.location_master')->with($data);
    }

    public function editLocation(Request $request, $id) {
        $location = LocationMaster::find($id);
        $locations = LocationMaster::all();
        $title = "Save Entry";
        $isUpdate = false;
        $showAlert = false;
        if(is_null($locations)) {
            return redirect('admin.location_master');
        }
        else {
            if ($request->has('update')) {
                $isUpdate = true;
            }
            else {
                echo "No Update";
            }
            $url = url('/admin/location_master/update') ."/".$id;
            $data = compact('locations', 'title', 'showAlert', 'location', 'url', 'isUpdate');
            return view('admin.location_master')->with($data);
        }
    }

    public function updateLocation(Request $request, $id) {
        $updateLocation = LocationMaster::find($id);
        $updateLocation->location = $request['location'];
        $updateLocation->save();
        return redirect(route('admin.location_master'));
    }

    public function deleteLocation($id) {
        $location = LocationMaster::find($id);
        if(!is_null($location)) {
            $location->delete();
        }
        $showAlert = "Location has been deleted successfully.";
        $url = url('/admin/location_master/');
        $isUpdate = false;
        $title = "Save Entry";
        $locations = LocationMaster::all();
        $data = compact('showAlert', 'url', 'isUpdate', 'title', 'locations');
        return view('admin.location_master')->with($data);
    }

    public function addHotels(Request $request) {
        $file = $request->file('image')->getClientOriginalName();
        $hotel = new HotelMaster;
        $hotel->name = $request['hotelname'];
        $hotel->image = $file;
        $hotel->location_id = $request['location'];
        $hotel->save();
        return redirect()->back();
    }

    public function showHotels() {
        $locations = LocationMaster::all();
        $hotels = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', 'location_masters.location_id')
                    ->get();
        $locations = LocationMaster::all();
        $url = url('/admin/hotel_master');
        $title = "Add Entry";
        $isUpdate = false;
        $showAlert = false;
        $data = compact('hotels', 'title', 'showAlert', 'url', 'isUpdate', 'locations');
        return view('admin.hotel_master')->with($data);
    }

    public function editHotel(Request $request, $id) {
        $hotel = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', 'location_masters.location_id')
                    ->where('hotel_masters.hotel_id','=',$id)
                    ->get();
                    
        $hotels = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', 'location_masters.location_id')
                    ->get();

        $locations = LocationMaster::where('location_id','!=',$hotel[0]->location_id)->get();
        $title = "Save Entry";
        $isUpdate = false;
        $showAlert = false;
        if(is_null($hotel)) {
            return redirect('admin.hotel_master');
        }
        else {
            if ($request->has('update')) {
                $isUpdate = true;
            }
            $url = url('/admin/hotel_master/update') ."/".$id;
            $data = compact('hotels', 'title', 'showAlert', 'hotel', 'url', 'isUpdate', 'locations');
            // return $data;
            return view('admin.hotel_master')->with($data);
        }
    }

    public function updateHotel(Request $request, $id) {
        $hotel = HotelMaster::find($id);
        $hotel->name = $request['hotelname'];
        $hotel->location_id = $request['location'];
        $title = "Add Entry";
        $isUpdate = false;
        $showAlert = false;
        $hotel->save();
        $hotel = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', 'location_masters.location_id')
                    ->where('hotel_masters.hotel_id','=',$id)
                    ->get();
        $hotels = DB::table('hotel_masters')
                    ->join('location_masters', 'hotel_masters.location_id', 'location_masters.location_id')
                    ->get();
        $locations = LocationMaster::all();
        $url = url('/admin/hotel_master/update') ."/".$id;
        
        $data = compact('hotels', 'title', 'showAlert', 'hotel', 'url', 'isUpdate', 'locations');
        return redirect(route('admin.hotel_master'))->with($data);
    }

    public function deleteHotel($id) {
        // return $id;
        $hotel = HotelMaster::find($id);
        if(!is_null($hotel)) {
            $hotel->delete();
        }
        return redirect()->back();
    }
    
    public function showRoomAllotToHotels(Request $request) {
        $selectedHotelId = $request['selectedHotelId'];
        $request->session()->put('selectedHotelId', $selectedHotelId);
        $roomToHotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'location_masters.location_id', 'hotel_masters.hotel_id')
                    ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id','=',$selectedHotelId)
                    ->get();

        
        $rooms = RoomMaster::all();
        $hotels = HotelMaster::all();
        $url = url('/admin/room_allot');
        $title = "Add Entry";
        $isUpdate = false;
        $showAlert = false;
        // $hotels = HotelMaster::where('hotel_id','!=',$selectedHotelId)->get();
        // return $hotels;
        // die;
        if(session()->has('selectedHotelId')) {
            $hotel = HotelMaster::where('hotel_id','=',session('selectedHotelId'))->get();
        }

        $data = compact('roomToHotels', 'hotels' ,'rooms', 'selectedHotelId', 'url', 'title', 'isUpdate', 'showAlert');
        // echo "<pre>";
        // print_r($hotels->toArray());
        // die;
        // return $data;
        return view('admin.room_allot')->with($data);
    }

    public function roomAllotToHotel(Request $request) {
        $file = $request->file('image')->getClientOriginalName();
        $selectedHotelId = $request['hotelId'];
        $hotel = new HotelRoomAlloted;
        $hotel->hotel_id = $selectedHotelId;
        $hotel->room_id = $request['roomtype'];
        $hotel->room_image = $file;
        $hotel->no_of_rooms = $request['noofrooms'];
        $hotel->no_of_guests = $request['noofguests'];
        $hotel->rate_per_night = $request['ratepernight'];
        $hotel->save();
        return redirect()->back();
    }

    public function editRoomAllotToHotel(Request $request, $hotelId, $roomId) {
        $selectedHotelId = $request['selectedHotelId'];
        $hotelId = $request['hotelId'];
        $roomId = $request['roomId'];
        $isUpdate = false;
        $roomToHotels = DB::table('hotel_room_alloteds')
                            ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                            ->join('location_masters', 'location_masters.location_id', 'hotel_masters.hotel_id')
                            ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                            ->where('hotel_room_alloteds.hotel_id','=',$hotelId)
                            ->get();
        
        
        $updateRoomToHotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'location_masters.location_id', 'hotel_masters.hotel_id')
                    ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id','=',$hotelId)
                    ->where('hotel_room_alloteds.room_id','=',$roomId)
                    ->get();
                    
        $title = "Save Entry";
        $rooms = RoomMaster::all();
        $hotels = HotelMaster::all();
        $showAlert = false;
        if(is_null($updateRoomToHotels)) {
            return redirect('admin.room_allot');
        }
        else {
            if ($request->has('update')) {
                $isUpdate = true;
            }
            $url = url('/admin/room_allot/update') ."/".$hotelId. "/".$roomId;
            $data = compact('roomToHotels', 'title', 'updateRoomToHotels', 'url', 'rooms', 'hotels', 'selectedHotelId', 'showAlert', 'isUpdate');
            // return $data;
            // echo "<pre>";
            // print_r($data);
            // die;
            return view('admin.room_allot')->with($data);
        }
    }

    public function updateRoomAllotToHotel(Request $request, $hotelId, $roomId) {
        $selectedHotelId = $request['selectedHotelId'];
        // $updatedHotelId = $request['updatedHotelId'];
        // dd($hotelId);
        $roomToHotels = HotelRoomAlloted::where('hotel_id', '=', $hotelId)->where('room_id', '=', $roomId)->first();                
        $roomToHotels->hotel_id = $hotelId;
        $roomToHotels->room_id = $roomId;
        $roomToHotels->no_of_rooms = $request['noofrooms'];
        $roomToHotels->no_of_guests = $request['noofguests'];
        $roomToHotels->rate_per_night = $request['ratepernight'];
        $roomToHotels->save();
        $title = "Add Entry";
        $isUpdate = false;
        // $showAlert = false;
        $rooms = RoomMaster::all();
        $hotels = HotelMaster::all();
        
        $roomToHotels = DB::table('hotel_room_alloteds')
                            ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                            ->join('location_masters', 'location_masters.location_id', 'hotel_masters.hotel_id')
                            ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                            ->where('hotel_room_alloteds.hotel_id','=',$hotelId)
                            ->get();
        
        
        $updateRoomToHotels = DB::table('hotel_room_alloteds')
                    ->join('hotel_masters', 'hotel_room_alloteds.hotel_id', 'hotel_masters.hotel_id')
                    ->join('location_masters', 'location_masters.location_id', 'hotel_masters.hotel_id')
                    ->join('room_masters', 'room_masters.room_id', 'hotel_room_alloteds.room_id')
                    ->where('hotel_room_alloteds.hotel_id','=',$hotelId)
                    ->where('hotel_room_alloteds.room_id','=',$roomId)
                    ->get();
        
        $url = url('/admin/room_allot/update') ."/".$hotelId. "/".$roomId;
        $data = compact('roomToHotels', 'title', 'updateRoomToHotels', 'url', 'rooms', 'hotels', 'selectedHotelId', 'isUpdate');
        // return $data;
        return redirect(route('admin.room_allot'))->with($data);
    }

    public function deleteRoomAllotToHotel($hotelId, $roomId) {
        $hotel = HotelRoomALloted::where('hotel_id','=',$hotelId)->where('room_id','=',$roomId)->first();
        // return $hotel;
        $showAlert = false;
        if(!is_null($hotel)) {
            $hotel->delete();
        }
        return redirect()->back();
    }

    public function deleteUser(Request $request, $id) {
        $user = User::find($id);
        $showAlert = false;
        if(!is_null($user)) {
            if($request->has('delete')) {
                $showAlert = "User account has been deleted successfully.";
            }
            $user->delete();
        }
        $customers = User::all();
        $data = compact('user', 'showAlert', 'customers');
        return view('admin.user_master')->with($data);
    }

    public function showUsers() {
        $customers = User::all();
        $showAlert = false;
        $data = compact('customers', 'showAlert');
        // return $data;
        return view('admin.user_master')->with($data);
    }

    public function adminLogin() {
        return view('admin.login');
    }

    public function adminDashboard() {
        return view('admin.dashboard');
    }
}
