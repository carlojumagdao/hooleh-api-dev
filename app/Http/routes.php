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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/violation', function () {
    return view('violation');
});

Route::get('/enforcer', function () {
    return view('enforcer');
});

Route::group(['middleware' => 'cors'], function(){
	Route::resource('/api/v1/enforcers','api\v1\EnforcerController');
});


Route::resource('/api/v1/drivers', 'api\v1\DriverController');	
Route::resource('/api/v1/violations', 'api\v1\ViolationController');
Route::resource('/api/v1/driverviolations', 'api\v1\DriverViolationController');