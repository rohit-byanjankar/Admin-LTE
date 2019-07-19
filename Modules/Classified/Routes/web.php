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
Route::prefix('adminpanel')->middleware('admin')->group(function () {
    Route::resource('googleadsense', 'GoogleAdController');
    Route::resource('adminclassified', 'ClassifiedController');
    Route::resource('adminclassifiedcategory', 'ClassifiedCategoryController');
    Route::put('adminclassified/{ad}/approvead', 'ClassifiedController@verifyAd')->name('adminclassified.verify-ad');
});
