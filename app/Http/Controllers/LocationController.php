<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationMaster;

class LocationController extends Controller
{
    public function view() {
        $locations = LocationMaster::all()->toArray();
        $data = compact('locations');
        return view('layouts.filter')->with($data);
        // echo print_r($data);
    }
}
