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

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('categories', 'CategoriesController');
    Route::resource('tags', 'TagsController');
    
    Route::resource('posts', 'PostsController');
    Route::get('rolePermission','PermissionController@selectRole');
    Route::post('rolePermission/{role}','PermissionController@getPermission');

    Route::get('trashed-posts', 'PostsController@trashed')->name('trashed-posts.index');
    
    Route::put('restore-post/{post}', 'PostsController@restore')->name('restore-posts');

    Route::post('role-permission-save', 'PostsController@checkPermissionPost')->name('permission-post');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('users', 'UsersController@index')->name('users.index');
    Route::get('users/profile', 'UsersController@edit')->name('users.edit-profile');
    Route::post('users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
    Route::put('users/profile', 'UsersController@update')->name('users.update-profile');


});

//REGISTER
Route::get('register','RegisterController@show');
Route::post('register','RegisterController@register');
