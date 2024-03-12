<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;
class ParkingTickets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'location_id',
        'vehicle_id',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'entry_time' => 'datetime',
        'exit_time' => 'datetime',
    ];
    public $timestamps = false;

    static function getTickets(){
        $parking_data=DB::table('parking_tickets')
                ->join('locations', 'locations.id', '=', 'parking_tickets.location_id')
                ->join('vehicles', 'vehicles.id', '=', 'parking_tickets.vehicle_id')
                ->select('locations.name','vehicles.plate_code','vehicles.plate_number','vehicles.emirates', 'entry_time','exit_time','parking_tickets.status')
                ->get();
        return $parking_data;
    }
}
