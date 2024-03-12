<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Location;
use App\Http\Controllers\Vehicle;
use App\Http\Controllers\ParkingTicket;
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

Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/tickets',[ParkingTicket::class, 'index']);
Route::get('/vehicles',[Vehicle::class, 'index']);
Route::get('/locations',[Location::class, 'index']);
