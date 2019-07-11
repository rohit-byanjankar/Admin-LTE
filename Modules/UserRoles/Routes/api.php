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
    Route::resource('role','api\RolesControllerApi');
    Route::get('rolePermission', 'api\PermissionControllerApi@selectRole');
    Route::get('rolePermission/{role}', 'api\PermissionControllerApi@getPermission');
    Route::post('role-permission-save', 'api\PermissionControllerApi@checkPermissionPost')->name('permission-post');

    Route::get('users', 'Api\UsersControllerApi@index')->name('users.index');
    Route::get('users/profile', 'Api\UsersControllerApi@edit')->name('users.edit-profile');
    Route::put('users/profile', 'Api\UsersControllerApi@update')->name('users.update-profile');
    Route::put('users/{user}/make-admin', 'Api\UsersControllerApi@makeAdmin')->name('users.make-admin');
    Route::put('users/{user}/verify-user', 'Api\UsersControllerApi@verifyUser')->name('users.verify-user');
});