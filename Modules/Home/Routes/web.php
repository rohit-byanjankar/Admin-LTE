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
    Route::get('/home', 'FrontController@index')->middleware('auth');
    Route::get('account', 'FrontController@account')->name('account')->middleware('auth');
    Route::post('changepassword', 'PasswordController@change')->middleware('auth');
    Route::post('profilechange', 'ProfileController@change')->name('profilechange')->middleware('auth');
    Route::post('deactivate', 'ProfileController@deactivate')->name('deactivate')->middleware('auth');


    Route::resource('userposts', 'UserPostController')->middleware('auth');
    Route::resource('postscategories', 'PostCategoryController')->middleware('auth');
    Route::resource('userevents', 'UserEventController')->middleware('auth');
    Route::resource('userannouncements', 'UserAnnouncementController')->middleware('auth');
    Route::resource('telephonedir', 'TelephoneController')->middleware('auth');
    Route::get('cat/{id}','PostCategoryController@getCategory')->name('cat')->middleware('auth');


    
