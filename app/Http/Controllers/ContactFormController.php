<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\ContactForm;

class ContactFormController extends Controller
{
    public function add_formdata(Request $request){
        
     $validator = Validator::make($request->all(), [
      
      'fname' => 'required',
      'lname' => 'required',
      'email' => 'required',
      'comment' =>'required',  
    ]);

     if($validator->fails()){
     	return response()->json(['error' => $validator->errors()->all()], 409);
     }

     $contact = new ContactForm();
     
     $contact->fname = $request->fname;
     $contact->lname = $request->lname;
     $contact->email = $request->email;
     $contact->comment = $request->comment;
     $contact->save();

     if($contact){
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

    public function allData(Request $req)
    {
        $user=ContactForm::get();
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'user'=> $user  
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data not Found'
            ]);
        }
    }
}





    

