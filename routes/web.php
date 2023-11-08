<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LocationController;
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

Route::get('/', [LocationController::class, 'view']);
Route::get('/', [HotelController::class, 'view']);

Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'register']);

Route::get('/signup', [RegistrationController::class, 'index']);
Route::post('/signup', [RegistrationController::class, 'register']);

Route::get('/login', function () {
    return view('login');
});

// Route::get('/signup', function () {
//     return view('signup');
// });

Route::get('/hotel/{id}', [HotelController::class, 'hotels']);
Route::get('/hotel/{hotelId}/room/{roomId}/booking', [HotelController::class, 'booking']);


Route::get('/admin/dashboard', function () {
    return view('admin/dashboard');
});

Route::get('/admin/hotel_master', function () {
    return view('admin/hotel_master');
});

Route::get('/admin', function () {
    return view('admin/login');
});

Route::get('/admin/room_allot', function () {
    return view('admin/room_allot');
});

Route::get('/admin/room_master', function () {
    return view('admin/room_master');
});

Route::get('/admin/user_master', [RegistrationController::class, 'view']);
Route::get('/admin/user_master/delete/{id}', [RegistrationController::class, 'delete']);

Route::get('/admin/location_master', function () {
    return view('admin/location_master');
});

