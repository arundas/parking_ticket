<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingTickets;
use App\Models\Vehicles;

class ParkingTicket extends Controller
{
    public function index(){
        $tickets=ParkingTickets::getTickets();
        return view('tickets')->with('tickets',$tickets);
    }
    public function entry(Request $data){
        $vehicle=new Vehicles;
        $vehicle_info=Vehicles::where('plate_code',$data->plate_code)
                        -> where('plate_number',$data->plate_number)
                        -> where('emirates',$data->emirates)
                        ->pluck('id');
        if($vehicle_info && isset($vehicle_info[0])){
            if (!ParkingTickets::where('location_id', $data->location_id )
                        -> where('vehicle_id',$vehicle_info[0])
                        -> where('exit_time',NULL)
                        -> where('status',1)
                        ->exists()) {
                            $ticket=new ParkingTickets;
                            $ticket->location_id=$data->location_id;
                            $ticket->vehicle_id=$vehicle_info[0];
                            $ticket->entry_time=$data->time;
                            $ticket->status=1;
                            $ticket->save();
                            return response()->json(["message"=>"Entry Noted"],201);
            }else{

                return response()->json(["message"=>"Invalid Entry"],200);
            }
            
        }else{
            return response()->json(["message"=>"Invalid Vehicle"],200);
        }
        
    }
    public function exit(Request $data){

        $vehicle=new Vehicles;
        $vehicle_info=Vehicles::where('plate_code',$data->plate_code)
                        -> where('plate_number',$data->plate_number)
                        -> where('emirates',$data->emirates)
                        ->pluck('id');
        if($vehicle_info && isset($vehicle_info[0])){
            if (ParkingTickets::where('location_id', $data->location_id )
                        -> where('vehicle_id',$vehicle_info[0])
                        -> where('status',1)
                        ->exists()) {
                            ParkingTickets::where('location_id', $data->location_id )
                            -> where('vehicle_id',$vehicle_info[0])
                            -> where('status',1)
                            ->update(['status'=>2,'exit_time'=>$data->time]);
            return response()->json(["message"=>"Exit Noted"],201);
        }else{
            return response()->json(["message"=>"Invalid Exit Ticket"],200);
        }
            
        }else{
            return response()->json(["message"=>"Invalid Vehicle"],200);
        }
        
    }
}
