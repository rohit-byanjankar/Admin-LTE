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
    Route::get('/home','UserPostController@userHome');
    Route::resource('userposts', 'UserPostController');
    Route::resource('userevents', 'EventController');
    Route::resource('userannouncements', 'AnnouncementController');
    Route::resource('telephonedir', 'TelephoneController');
