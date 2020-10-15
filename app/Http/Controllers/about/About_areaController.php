<?php

namespace App\Http\Controllers\about;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\about\About_area;


class  About_areaController extends Controller
{
     public function add(Request $request){
     $add =new About_area();
     $add->sub_heading = $request->subheading;
     $add->heading = $request->heading;
     $add->content = $request->content;
     $add->link = $request->link;
     

     // Image 1
     $url="http://127.0.0.1:8000/storage/";
     $file=$request->file('img1');
     $extension=$file->getClientOriginalExtension();
     // dd($extension);
      // exit;
      $path=$request->file('img1')->storeAs('About/about_area/img1', $add->id.'.'.$extension);
           // dd($extension);
           // exit;  
       $add->img1=$path;
       $add->imgpath1=$url.$path;




    // Extra img code

          $url="http://127.0.0.1:8000/storage/";
          $file=$request->file('image');
          $extension=$file->getClientOriginalExtension();
          // dd($extension);
          // exit;
          $path=$request->file('image')->storeAs('user_images', $p->id.'.'.$extension);
          // dd($extension);
          // exit;

          $p->image=$path;
          $p->image_path=$url.$path;
          $p->save();
          //php artisan storage:link
          //config=>filesystem.php(local,public)

          //storing image
          


    // Image 2
       $url="http://127.0.0.1:8000/storage/";
     $file=$request->file('img2');
     $exe=$file->getClientOriginalExtension();
     // dd($extension);
      // exit;
      $root=$request->file('img2')->storeAs('About/about_area/img2', $add->id.'.'.$exe);
           // dd($extension);
           // exit;  
       $add->img2=$root;
       $add->imgpath2=$url.$root;

     $add->save();


    if($add){
    	return response()->json($area=[
    		'status' => 200,
    		'msg' => 'About Area Content has been Added Sucessfully...!!',
    	]);
    }else{

    	  return response()->json($area=[
                'status'=>203,
                'msg'=>'something went wrong'
               ]);
    }
    }


    public function display(Request $request){
    $user =About_area::get();
         //dd($curd);
        if($user->count()){
            return response()->json($data = [
            'status' => 200,
            'msg'=>'Success',
            'area' => $user
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
