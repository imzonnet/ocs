<?php

/**
 * OCS Controller
 */

Route::group(['prefix' => 'backend/ocs', 'middleware' => 'auth.backend'], function() {

	Route::resource('product', 'Backend\ProductController');
	Route::resource('service', 'Backend\ServiceController');

});