<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LocationMaster;

class LocationController extends Controller
{
    public function view() {
        $locations = LocationMaster::all();
        // return $locations->toArray();
        // $data = compact('locations');
        // return $data;
        // return view('layouts.filter')->with($data);
        // echo print_r($data);
        return $locations;
    }
}
