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
    Route::apiResource('classified','api\ClassifiedControllerApi');
    Route::post('classified/{id}','api\ClassifiedControllerApi@update');
    Route::resource('classifiedcategory','api\ClassifiedCategoryControllerApi');
    Route::put('adminclassified/{ad}/approved', 'ClassifiedController@verifyAd')->name('adminclassified.verify-ad');
});