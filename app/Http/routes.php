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

Route::get('/violation', array(
	'uses' => 'web\violationController@index',
	'as' => 'violation.index'
));



//----------Enforcer----------//
Route::get('/enforcer', array(
	'uses' => 'web\enforcerController@index',
	'as' => 'enforcer.index'
));
Route::post('/enforcer/create', array(
	'uses' => 'web\enforcerController@create',
	'as' => 'enforcer.create'
));
Route::get('/enforcer/show/{id}', array(
	'uses' => 'web\enforcerController@show',
	'as' => 'enforcer.show'
));
Route::get('/enforcer/data', array(
	'uses' => 'web\enforcerController@getEnforcerData',
	'as' => 'enforcer.data'
));
//----------Enforcer----------//



//----------API----------//
Route::group(['middleware' => 'cors'], function(){
	Route::resource('/api/v1/enforcers','api\v1\EnforcerController');
});
Route::resource('/api/v1/drivers', 'api\v1\DriverController');	
Route::resource('/api/v1/violations', 'api\v1\ViolationController');
Route::resource('/api/v1/driverviolations', 'api\v1\DriverViolationController');
//----------API----------//