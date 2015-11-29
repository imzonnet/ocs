<?php

/**
 * OCS Controller
 */

Route::group(['prefix' => 'backend/ocs', 'middleware' => 'auth.backend'], function() {

	Route::resource('product', 'Backend\ProductController');
	Route::resource('service', 'Backend\ServiceController');
	Route::get('order/find', ['as' => 'order.find', 'uses' => 'Backend\OrderController@getCustomer']);
	Route::post('order/find', ['as' => 'order.find', 'uses' => 'Backend\OrderController@getCustomer']);
	Route::resource('order', 'Backend\OrderController');
	Route::resource('order.detail', 'Backend\OrderDetailController');
	Route::resource('status', 'Backend\OrderStatusController');

});