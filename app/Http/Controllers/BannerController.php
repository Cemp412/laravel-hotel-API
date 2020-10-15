<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Validator;

class BannerController extends Controller
{
    public function add(Request $request){
     $add =new Banner();
     $add->name = $request->name;
     $add->text_style = $request->text_style;
     $add->content = $request->content;
     $add->sort_order = $request->order;

     $url="http://127.0.0.1:8000/storage/";
     $file=$request->file('banner_image');
     $extension=$file->getClientOriginalExtension();
     // dd($extension);
      // exit;
      $path=$request->file('banner_image')->storeAs('banners', $add->id.'.'.$extension);
           // dd($extension);
           // exit;  
       $add->banner_image=$path;
       $add->imgpath=$url.$path;
     $add->save();


    if($add){
    	return response()->json($banner=[
    		'status' => 200,
    		'msg' => 'Banner Added Sucessfully...!!',
    	]);
    }else{

    	  return response()->json($banner=[
                'status'=>203,
                'msg'=>'something went wrong'
               ]);
    }
    }


    public function display(Request $request){
    $user =Banner::get();
         //dd($curd);
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'banner' => $user
            ]);
        }
        else{
            return response()->json($data = [
            'status' => 201,
            'msg' => 'Data Not Found',
            ]);
}
    }

    public function show($id){
    	$user =product::find($id);
    	 //dd($curd);
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'banner' => $user
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
