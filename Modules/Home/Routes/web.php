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
    Route::get('userProfile/{id}', 'FrontController@show')->name('user-profile');
    Route::post('changepassword', 'PasswordController@change');
    Route::post('profilechange', 'ProfileController@change')->name('profilechange');
    Route::post('deactivate', 'ProfileController@deactivate')->name('deactivate');

    Route::resource('userposts', 'UserPostController');

    Route::resource('postscategories', 'PostCategoryController');
    Route::get('cat/{id}', 'PostCategoryController@getCategory')->name('cat');

    Route::resource('userevents', 'UserEventController');

    Route::resource('userannouncements', 'UserAnnouncementController');
    Route::get('latestannouncements', 'UserAnnouncementController@pindex')->name('latestannouncements');


    Route::resource('telephonedir', 'TelephoneController');
    Route::get('telephonecategory/{id}', 'TelephoneCategoryController@getCategory')->name('telephonecat');


    Route::resource('classified', 'ClassifiedController');
    Route::resource('classifiedcategory', 'ClassifiedController');

    Route::get('adcat/{id}', 'ClassifiedCategoryController@getCategory')->name('adcat');

});


    
