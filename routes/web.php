<?php
// Route::view('/', 'welcome');
Route::get('/', function(){
    return view('welcome');
   
});
Route::get('/mail', function(){
    // return view('email.registration');
    return "no";
   
});
Auth::routes();


Route::get('/login/writer', 'Auth\LoginController@showWriterLoginForm');
Route::get('/register/writer', 'Auth\RegisterController@showWriterRegisterForm');

Route::prefix('admin')->group(function(){

Route::get('/login', 'Auth\LoginController@showAdminLoginForm');
Route::get('/register', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login', 'Auth\LoginController@adminLogin');
Route::post('/register', 'Auth\RegisterController@createAdmin');
Route::get('/dashboard', 'AdminController@index');
Route::get('/', 'AdminController@index');
Route::post('/logout', 'Auth\AdminLoginController@logout');


// new route difine no use construct middleware bcose all link use via api

// Route::resource('course', 'Admin\CourseController'); //->middleware('auth:admin');







});

Route::post('/register/writer', 'Auth\RegisterController@createWriter');
Route::post('/login/writer', 'Auth\LoginController@writerLogin');


// Route::view('/home', 'home')->middleware('auth');
Route::get('/home', function(){
   return view('home');
})->middleware('auth');

// Route::view('/writer', 'writer');
Route::get('/writer', function(){
   return view('writer');
});