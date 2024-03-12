<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicles;

class Vehicle extends Controller
{
    public function index(){
        $vehicles=Vehicles::all();
        
        return view('vehicles')->with('vehicles',$vehicles);
    }
}
