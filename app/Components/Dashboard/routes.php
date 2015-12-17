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

Route::get('/backend/auth/login', ['as' => 'backend.auth.getLogin', 'uses' => 'Backend\AuthController@getLogin']);
Route::post('/backend/auth/login', ['as' => 'backend.auth.postLogin', 'uses' => 'Backend\AuthController@postLogin']);
Route::get('/backend/auth/logout', ['as' => 'backend.auth.getLogout', 'uses' => 'Backend\AuthController@getLogout']);

Route::group(['prefix' => 'backend', 'middleware' => 'auth.backend'], function() {

    Route::get('/', function(){ return redirect()->route('backend.home');});
    Route::get('/home', ['as' => 'backend.home', 'uses' => 'Backend\HomeController@index']);

    Route::resource('role', 'Backend\RoleController');
    Route::resource('role.permission', 'Backend\PermissionController', ['only' => ['index', 'store']]);
    Route::get('user/search', ['as' => 'backend.user.search', 'uses' => 'Backend\UserController@getSearch']);
    Route::resource('user', 'Backend\UserController');

    Route::resource('group', 'Backend\CustomerGroupController');
    Route::resource('organize', 'Backend\CustomerOrganizeController');
    Route::resource('country', 'Backend\CountryController');
    Route::resource('country.town', 'Backend\TownController');
    Route::resource('town.district', 'Backend\DistrictController');

});


Route::get('/', function () {
	return redirect()->route('backend.home');
});