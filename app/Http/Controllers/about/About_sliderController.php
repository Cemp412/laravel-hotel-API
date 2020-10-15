<?php

namespace App\Http\Controllers\about;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\about\About_slider;

class About_sliderController extends Controller
{
     public function add(Request $request){
    $add =new About_slider();
     $add->heading1 = $request->heading1;
     $add->content1 = $request->content1;
     $add->heading2 = $request->heading2;
     $add->content2 = $request->content2;
     
     

     // Image 1
     $url="http://127.0.0.1:8000/storage/";
     $file=$request->file('img');
     $extension=$file->getClientOriginalExtension();
     // dd($extension);
      // exit;
      $path=$request->file('img')->storeAs('About/about_area', $add->id.'.'.$extension);
           // dd($extension);
           // exit;  
       $add->img=$path;
       $add->imgpath=$url.$path;

       $add->save();

       if($add){
    	return response()->json($slider=[
    		'status' => 200,
    		'msg' => 'About Slider and Content has been Added Sucessfully...!!',
    	]);
    }else{

    	  return response()->json($slider=[
                'status'=>203,
                'msg'=>'something went wrong'
               ]);
    }
}

    public function sliders(Request $request){
    $user =About_slider::get();
         //dd($curd);
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'slider' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found',
            ]);
}
    }
}
