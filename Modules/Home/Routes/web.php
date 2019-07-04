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
Route::middleware(['auth','checkDeactivate'])->group(function() {
    Route::get('/home', 'FrontController@index');
    Route::get('account', 'FrontController@account')->name('account');
    Route::post('changepassword', 'PasswordController@change');
    Route::post('profilechange', 'ProfileController@change')->name('profilechange');
    Route::post('deactivate', 'ProfileController@deactivate')->name('deactivate');

    Route::resource('userposts', 'UserPostController');
    Route::resource('postscategories', 'PostCategoryController');
    Route::resource('userevents', 'UserEventController');
    Route::resource('userannouncements', 'UserAnnouncementController');
    Route::resource('telephonedir', 'TelephoneController');
    Route::get('cat/{id}', 'PostCategoryController@getCategory')->name('cat');
});


    
