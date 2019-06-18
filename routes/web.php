<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
   
   return view('auth.login');
});

Route::get('/website/posts', function () {
	
   return view('front.posts');
});

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
});



//REGISTER
Auth::routes();
Route::get('register','RegisterController@show');
Route::post('register','RegisterController@register');
Route::get('logout','\App\Http\Controllers\Auth\LoginController@logout');
