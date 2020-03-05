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

Route::post('weather/fetch', 'WeatherController@fetch');

Route::get('weather/fetch/{city?}', 'WeatherController@fetch');

Route::get('cities/find/{name?}', 'CitiesController@find');
