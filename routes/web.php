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
    return view('welcome');
});

Route::get('/weather', 'WeatherController@get');

Route::group(['prefix' => 'order'], function() {
    Route::get('/', 'OrderController@index')->name('list');
    Route::get('/edit/{id}', 'OrderController@edit')->name('edit');
    Route::post('/update/{id}', 'OrderController@update')->name('update');
});