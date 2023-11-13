<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\AdminController;
use App\Models\Customer;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [LocationController::class, 'view']);
// Route::get('/', [HotelController::class, 'view']);

Route::group(['middleware'=>'web'], function() {
    Route::get('/', function () {
        $locationController = app(LocationController::class);
        $hotelController = app(HotelController::class);
    
        $locations = $locationController->view();
        $hotels = $hotelController->view();
    
        return view('home', compact('locations', 'hotels'));
    });
    
    Route::post('/', [FilterController::class, 'search']);
    
    Route::get('/contact', [ContactController::class, 'index']);
    Route::post('/contact', [ContactController::class, 'register']);
    
    Route::get('/signup', [RegistrationController::class, 'index']);
    Route::post('/signup', [RegistrationController::class, 'register']);
    
    Route::get('/login', [UserAuth::class, 'index']);
    
    Route::get('/logout', [UserAuth::class, 'logout']);
    
    Route::post('/login', [UserAuth::class, 'login']);
    
    Route::get('/hotel/{id}', [HotelController::class, 'hotels']);
    Route::get('/hotel/{hotelId}/room/{roomId}/booking', [HotelController::class, 'booking']);
    Route::post('/hotel/{hotelId}/room/{roomId}/booking', [HotelController::class, 'bookingMessage']);

});

Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard']);

Route::get('/admin/hotel_master', [AdminController::class, 'showHotels'])->name('admin.hotel_master');
Route::post('/admin/hotel_master', [AdminController::class, 'addHotels']);
Route::get('/admin/hotel_master/edit/{id}', [AdminController::class,'editHotel'])->name('admin.hotel_edit');
Route::post('/admin/hotel_master/update/{id}', [AdminController::class,'updateHotel'])->name('admin.hotel_update');
Route::get('/admin/hotel_master/delete/{id}', [AdminController::class,'deleteHotel'])->name('admin.hotel_delete');

Route::get('/admin/login', [AdminController::class, 'adminLogin']);
Route::post('/admin/login', [AdminController::class, 'adminDashboard']);

Route::get('/admin/room_allot', [AdminController::class, 'showRoomAllotToHotels'])->name('admin.room_allot');
Route::post('/admin/room_allot', [AdminController::class, 'roomAllotToHotel']);
Route::any('/admin/room_allot/show', [AdminController::class, 'showRoomAllotToHotels'])->name('admin.room_allot_show');
Route::get('/admin/room_allot/edit/{hotelId}/{roomId}}', [AdminController::class,'editRoomAllotToHotel'])->name('admin.room_allot_edit');
Route::post('/admin/room_allot/update/{hoteld}/{roomId}', [AdminController::class,'updateRoomAllotToHotel'])->name('admin.room_allot_update');
Route::get('/admin/room_allot/delete/{hotelId}/{roomId}', [AdminController::class,'deleteRoomAllotToHotel'])->name('admin.room_allot_delete');

Route::get('/admin/room_master', [AdminController::class,'showRooms'])->name('admin.room_master');
Route::post('/admin/room_master', [AdminController::class, 'addRoom']);
Route::get('/admin/room_master/edit/{id}', [AdminController::class,'editRoom'])->name('admin.room_edit');
Route::post('/admin/room_master/update/{id}', [AdminController::class,'updateRoom'])->name('admin.room_update');
Route::get('/admin/room_master/delete/{id}', [AdminController::class,'deleteRoom'])->name('admin.room_delete');

Route::get('/admin/location_master', [AdminController::class,'showLocations'])->name('admin.location_master');
Route::get('/admin/location_master/edit/{id}', [AdminController::class,'editLocation'])->name('admin.location_edit');
Route::post('/admin/location_master/update/{id}', [AdminController::class,'updateLocation'])->name('admin.location_update');
Route::get('/admin/location_master/delete/{id}', [AdminController::class,'deleteLocation'])->name('admin.location_delete');
Route::post('/admin/location_master', [AdminController::class, 'addLocation']);

Route::get('/admin/user_master', [AdminController::class, 'showUsers']);
Route::get('/admin/user_master/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.delete_user');



