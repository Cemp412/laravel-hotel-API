<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Apimodel;

class ApiController extends Controller
{
    public function add_api(Request $request){
     $validator = Validator::make($request->all(), [
      'name' =>'required',
      'category' => 'required',
      'brand' => 'required',
      'desc' => 'required',
      'price' => 'required',  
    ]);

     if($validator->fails()){
     	return response()->json(['error' => $validator->errors()->all()], 409);
     }

     $api = new Apimodel();
     $api->name = $request->name;
     $api->category = $request->category;
     $api->brand = $request->brand;
     $api->desc = $request->desc;
     $api->price = $request->price;
     $api->save();

     if($api){
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


}
