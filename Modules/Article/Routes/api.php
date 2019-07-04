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
    Route::get('/article', function (Request $request) {
        return $request->user();
    });
    Route::get('/articles/all','Api\PostControllerApi@allCategories');
});

Route::prefix('article')->group(function() {
    Route::resource('posts', 'Api\PostControllerApi');
    Route::resource('tags', 'TagsController');
    Route::resource('categories', 'CategoriesController');


    //Listing the posts 

    Route::get('pppp', 'Api\PostControllerApi@index');  
});



