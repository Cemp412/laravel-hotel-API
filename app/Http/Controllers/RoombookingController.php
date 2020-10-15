<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Roombooking;

class RoombookingController extends Controller
{
    public function add_room(Request $request){
     $validator = Validator::make($request->all(),[
        'check_in' => 'required',
        'check_out' => 'required',
        'adults' => 'required',
        'children' => 'required',
        'room_type' => 'required',
        'no_of_rooms' => 'required',
        'email'     =>'required',
        'number'    => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
    ]);

     if($validator->fails()){
     	return response()->json(['error'=>$validator->errors()->all()], 409);
     }
     else{
     	 $r =new Roombooking();
     	 $r->check_in = $request->check_in;
     	 $r->check_out = $request->check_out;
     	 $r->adults = $request->adults;;
     	 $r->children = $request->children;
     	 $r->room_type = $request->room_type;
     	 $r->no_of_rooms = $request->no_of_rooms;
     	 $r->email = $request->email;
     	 $r->number = $request->number;
     	 $r->save();

     	 if($r){
     	 	return response()->json($data = [
     	 		'status' => 200,
     	 	    'msg' => 'Room booked successfully',]);

     	 }
        else{
                return response()->json($data=[
                'status'=>203,
                'msg'=>'something went wrong'
               ]);
            } 
     }
    }
}
