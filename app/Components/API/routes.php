<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api', 'middleware' => 'auth.backend'], function() {


    Route::get('address/town/{country_id}', ['as' => 'api.address.town' ,'uses' => 'UserController@getTowns']);
    Route::get('address/district/{town_id}', ['as' => 'api.address.district' ,'uses' => 'UserController@getDistricts']);

});
