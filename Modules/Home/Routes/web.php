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
    Route::get('/home', 'FrontController@index');
    Route::get('account', 'FrontController@account')->name('account');
    Route::post('changepassword', 'PasswordController@change');
    Route::post('profilechange', 'ProfileController@change')->name('profilechange');


    Route::resource('userposts', 'UserPostController');
    Route::resource('postscategories', 'PostCategoryController');
    Route::get('cat/{id}','PostCategoryController@getCategory')->name('cat');
    Route::resource('userevents', 'UserEventController');
    Route::resource('userannouncements', 'UserAnnouncementController');
    Route::resource('telephonedir', 'TelephoneController');

    
