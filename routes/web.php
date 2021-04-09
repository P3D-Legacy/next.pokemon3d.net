<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\MainController@index')->name('index');
Route::get('/bg/{background}', 'App\Http\Controllers\MainController@switchBackground')->name('bgswitch');


Route::name('trainercard.')->prefix('trainercard')->group( function () {
    Route::get('/', 'App\Http\Controllers\TrainercardController@index')->name('index');
    Route::get('/generate', 'App\Http\Controllers\TrainercardController@generate')->name('generate');
    Route::get('/get', 'App\Http\Controllers\TrainercardController@getImage')->name('getUrl');
});
