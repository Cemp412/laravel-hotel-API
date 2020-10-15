<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('add', 'ApiController@add_api');

//Hotel websites Api

//service Api
Route::post('add_services', 'AddservicesController@add_service');
Route::get('display', 'AddservicesController@display_services');

//Contact Form Api
Route::post('add', 'ContactFormController@add_formdata');
Route::get('allData','ProductController@allData');

//Subscribe Form Api
Route::post('subscribe_form', 'SubscribeController@add_formdata');

//Room Booking Api
Route::post('add_room', 'RoombookingController@add_room');


//****** Routes for banner Api
Route::post('add_banner', 'BannerController@add');
Route::get('banner', 'BannerController@display');


// ********** Routes for about area
Route::post('add_aboutarea', 'about\About_areaController@add');
Route::get('aboutarea', 'about\About_areaController@display');


// *************Route for api slider
Route::post('add_aboutslider', 'about\About_sliderController@add');
Route::get('sliders', 'about\About_sliderController@sliders');
//Extra Api
// Route::post('add','ProductController@add');
// Route::get('allData','ProductController@allData');