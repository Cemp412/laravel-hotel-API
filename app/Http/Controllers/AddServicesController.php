<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\add_services;

class AddServicesController extends Controller
{
     public function add_service(Request $request){
     $validator = Validator::make($request->all(), [
     
      'card_title' => 'required',
      'card_text' => 'required',
      'text_muted' => 'required',
      'image' => 'required',  
    ]);

     if($validator->fails()){
     	return response()->json(['error' => $validator->errors()->all()], 409);
     }

     $service = new add_services();
    
     $service->card_title = $request->card_title;
     $service->card_text = $request->card_text;
     $service->text_muted = $request->text_muted;

     $url = "http://127.0.0.1:8000/storage/";
     $file = $request->file('image');
     $extension=$file->getClientOriginalExtension();

          // dd($extension);
          // exit;
     $path=$request->file('image')->storeAs('services', $service->id.'.'.$extension);
           // dd($extension);
           // exit;    
          $service->image=$path;
          $service->imgpath=$url.$path;
     
         $service->save();

     if($service){
     	return response()->json($data = [
     		'status' => 200,
     	    'msg' => 'user registration successful',
     	]);
     }else{
     	 return response()->json($data = [
     	     'status' => 203,
     	      'msg' => 'something went wrong',
     	  ]);
     }
    }


     public function display_services(Request $req)
    {
         

         $user=add_services::get();
        
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'product' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found'
            ]);
        }
    }
}


