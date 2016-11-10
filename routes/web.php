<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/countries', [
    'uses' => 'CountryController@getCountries',
    'as' => 'countries'
]);

Route::get('/countries/{countryId}', [
    'uses' => 'CountryController@getCountry',
    'as' => 'getcountry'
]);

Route::get('/countries/{countryId}/cities', [
    'uses' => 'CountryController@getCities',
    'as' => 'getcities'
]);

Route::get('/countries/{countryId}/cities/{cityId}', [
    'uses' => 'CityController@getCity',
    'as' => 'getcities'
]);

Route::get('/countries/{countryId}/cities/{cityId}/hotels', [
    'uses' => 'HotelController@getHotels',
    'as' => 'gethotel'
]);

Route::get('/countries/{countryId}/cities/{cityId}/cheapesthotel', [
    'uses' => 'CityController@getCheapestHotel',
    'as' => 'getcheapestHotel'
]);

Route::get('/countries/{countryId}/cheapesthotel', [
    'uses' => 'CountryController@getCheapestHotel',
    'as' => 'getcheapestHotel'
]);

Route::get('/ip', [
    'uses' => 'UserController@getLocation',
    'as' => 'getlocation'
]);

Route::get('/fetchCountries', [
    'uses' => 'CountryController@fetchCountries',
    'as' => 'loadcountries'
]);