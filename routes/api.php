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
Route::resource('clients','Api\ClientController')->except(['create', 'edit']);
Route::resource('pastries','Api\PastryController')->except(['create', 'edit']);
Route::resource('orders','Api\OrderController')->except(['create', 'edit']);

