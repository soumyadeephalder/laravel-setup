<?php

use Illuminate\Http\Request;

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
Route::get('/', function(){
    return "welcome";
   
});
Route::prefix('v2')->group(function(){
	Route::resource('student', 'Api\StudentController');
	Route::post('login', 'Api\StudentController@login');
	Route::post('otp/verification', 'Api\StudentController@otpVerification');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
