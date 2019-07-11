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

Route::middleware('auth:api')->group(function() {
    Route::get('home', 'api\FrontControllerApi@index');
    Route::get('account', 'api\FrontControllerApi@account')->name('account');
    Route::post('profilechange', 'api\ProfileControllerApi@change')->name('profilechange');
    Route::post('deactivate', 'api\ProfileControllerApi@deactivate')->name('deactivate');
    Route::post('changepassword', 'api\PasswordControllerApi@change');

    Route::resource('telephonedir', 'api\TelephoneControllerApi');
    Route::resource('userannouncements', 'api\UserAnnouncementControllerApi');
    Route::resource('userevents', 'api\UserEventControllerApi');
    Route::resource('userposts', 'api\UserPostControllerApi');
    Route::resource('postscategory', 'api\PostCategoryControllerApi');
    Route::get('cat/{id}', 'api\PostCategoryControllerApi@getCategory')->name('cat');

});