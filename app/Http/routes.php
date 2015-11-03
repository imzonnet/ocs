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

Route::get('/entrust', function() {
    $owner = new App\Role();
    $owner->name         = 'owner';
    $owner->display_name = 'Project Owner'; // optional
    $owner->description  = 'User is the owner of a given project'; // optional
    $owner->save();

    $admin = new App\Role();
    $admin->name         = 'admin';
    $admin->display_name = 'User Administrator'; // optional
    $admin->description  = 'User is allowed to manage and edit other users'; // optional
    $admin->save();
    echo 1;

    $user = new \App\User();
    $user->name = "John Nguyen";
    $user->email = "vnzacky39@gmail.com";
    $user->password = bcrypt('123456');
    $user->save();
    $user->attachRole($admin);
});

Route::get('/create-user', function() {
    dd(Auth::user());
});

Entrust::routeNeedsRole('create-user', 'owner', Redirect::to('/auth/login'));

Route::get('list-routes', function() {
    $routeCollection = Route::getRoutes();
    dd($routeCollection);
});