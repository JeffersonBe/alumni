<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function()
{
	if(Auth::check())
	{
	  return View::make('dashboard');
	}
	else
	{
		return View::make('hello');
	}
});

/* ------------------------- User ------------------------- */
Route::get('users/create', 'UsersController@create');
Route::post('users', 'UsersController@store');
Route::get('users/login', 'UsersController@login');
Route::post('users/login', 'UsersController@doLogin');
Route::get('users/confirm/{code}', 'UsersController@confirm');
Route::get('users/forgot_password', 'UsersController@forgotPassword');
Route::post('users/forgot_password', 'UsersController@doForgotPassword');
Route::get('users/reset_password/{token}', 'UsersController@resetPassword');
Route::post('users/reset_password', 'UsersController@doResetPassword');
Route::get('users/logout', array('as'=> 'logout', 'uses' => 'UsersController@logout'));


/* ------------------------- App ------------------------- */

Route::group(array('before' => 'auth'), function()
{
	Route::get('profile', array('uses' => 'ProfileController@showProfile'));
	Route::get('test', array('as'=> 'test', 'uses' => 'ProfileController@showProfile'));
});

/* ------------------------- Filter ------------------------- */

Route::filter('auth', function()
{
    if (Auth::guest()) return Redirect::to('/');
});
//
