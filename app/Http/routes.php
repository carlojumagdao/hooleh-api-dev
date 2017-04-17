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

Route::get('/driver/{id}', function () {
    return view('enforcer');
});


Route::post('api/authenticate', 'Auth\AuthController@authenticate');

Route::group(['middleware' => ['jwt.auth', 'cors'], 'prefix' => 'api/v1', 'namespace' => 'api\v1'], function () {
	Route::resource('enforcers','EnforcerController');
	Route::resource('drivers', 'DriverController');	
	Route::resource('violations', 'ViolationController');
	Route::resource('driverviolations', 'DriverViolationController');
	
	Route::post('enforcertickets', 'EnforcerTicketController@store');
	Route::get('enforcertickets', 'api\v1\EnforcerTicketController@enforcerTicket');
	Route::get('enforcers/{enforcer_id}/tickets', 'EnforcerTicketController@index');

	Route::get('enforcercurrentlogin', 'EnforcerController@enforcerCurrentLogin');
	Route::get('listviolationtoday', 'DriverViolationController@enforcerListViolationToday');
	Route::get('violationdetails/{id}', 'DriverViolationController@ticketDetails');
});

// Route::resource('api/v1/driverviolations', 'api\v1\DriverViolationController');

	