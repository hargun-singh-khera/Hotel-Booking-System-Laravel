<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationMaster;

class LocationController extends Controller
{
    public function view() {
        $locations = LocationMaster::all();
        return $locations;
    }
}
