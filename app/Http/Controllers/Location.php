<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locations;

class Location extends Controller
{
    public function index(){ 
        $locations=Locations::all();
        
        return view('locations')->with('locations',$locations);
    }
}
