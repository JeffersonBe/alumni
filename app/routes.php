<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

/* ------------------------- Login ------------------------- */

Route::get('login', array('uses' 	=> 'HomeController@showLogin'));
Route::post('login', array('uses' => 'HomeController@doLogin'));

/* ------------------------- Logout ------------------------- */

Route::get('logout', array('uses' => 'HomeController@doLogout'));

/* ------------------------- App ------------------------- */

Route::group(array('before' => 'auth'), function()
{
	Route::get('profile', array('uses' => 'ProfileController@showProfile'));
	Route::get('test', array('as'=>'test','uses' => 'HomeController@showLogin'));
});

/* ------------------------- Filter ------------------------- */

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('login');
});
//

// Confide routes
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', 'UsersController@logout');
