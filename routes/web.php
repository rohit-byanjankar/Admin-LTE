<?php

use Modules\Article\Entities\Post;
use Illuminate\Support\Facades\Input;
use Modules\Events\Entities\Event;
use Modules\Classified\Entities\Classified;
use Modules\Classified\Entities\ClassifiedCategory;

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
})->middleware('guest');

Route::middleware('auth')->group(function () {
    Route::get('/adminpanel', 'HomeController@index')->middleware('admin');
    Route::post('/search', 'HomeController@search')->name('search');
});

Route::resource('adminpanel/settings','SettingsController')->middleware('admin');
Route::resource('adminpanel/registrar','RegistrarController')->middleware('admin');
Route::get('deactivated','RegisterController@userDeactivated')->middleware('auth');
Route::post('deactivated','RegisterController@reActivatedEmail');

//REGISTER
Auth::routes();
Route::post('register', 'RegisterController@register');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//extra
Route::get('aboutUs','HomeController@aboutUs');
