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

Route::middleware(['admin'])->group(function(){
    Route::prefix('adminpanel')->group(function() {
        Route::resource('roles', 'RolesController');
        Route::get('rolePermission','PermissionController@selectRole');
        Route::get('rolePermission/{role}','PermissionController@getPermission');
        Route::post('role-permission-save', 'PermissionController@checkPermissionPost')->name('permission-post');

        Route::get('users', 'UsersController@index')->name('users.index');
        Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
        Route::put('users/profile', 'UsersController@update')->name('users.update-profile');
        Route::put('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
        Route::put('users/{user}/verify-user', 'UsersController@verifyUser')->name('users.verify-user');
        Route::put('users/{user}/deactivate-user', 'UsersController@deactivate')->name('users.deactivate-user');

    });
});
