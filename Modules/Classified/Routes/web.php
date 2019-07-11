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
Route::resource('classified', 'ClassifiedController');
Route::resource('classifiedcategory', 'ClassifiedCategoryController');

Route::get('adcat/{id}', 'ClassifiedCategoryController@getCategory')->name('adcat');


