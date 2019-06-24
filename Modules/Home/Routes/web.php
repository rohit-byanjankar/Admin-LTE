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
    Route::get('/home','UserPostController@userHome')->middleware('auth');
    Route::resource('userposts', 'UserPostController')->middleware('auth');
    Route::resource('userevents', 'EventController')->middleware('auth');
    Route::resource('userannouncements', 'AnnouncementController')->middleware('auth');
    Route::resource('telephonedir', 'TelephoneController')->middleware('auth');
