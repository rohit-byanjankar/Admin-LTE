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

Route::prefix('adminpanel')->group(function() {
    Route::resource('purchase','PurchaseController');
    Route::resource('sales','SalesController');
    Route::resource('ledger','LedgerController');
});
