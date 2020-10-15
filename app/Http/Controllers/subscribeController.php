<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\subscribe;

class subscribeController extends Controller
{
     public function add_formdata(Request $request){
     $validator = Validator::make($request->all(), [
      'email' =>'required',
       ]);

     if($validator->fails()){
     	return response()->json(['error' => $validator->errors()->all()], 409);
     }
      $form = new subscribe();
     $form->email = $request->email;
      $form->save();

     if($form){
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
