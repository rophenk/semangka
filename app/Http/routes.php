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
    return view('welcome');
});

Route::get('home', function () {
    return view('simapta.template.admin.dashboard');
});

Route::get('dashboard', function () {
    return view('simapta.template.admin.dashboard');
});

Route::get('instansi/{show?}', function ($show = 'list') {

	if($show == 'form') {

		return view('simapta.template.admin.instansiForm');

	} else { 

		return view('simapta.template.admin.instansiTable');
	}

});

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/**
 * Route untuk memproses Login Form
 */
Route::get('login', 'Simapta\LoginController@login');
Route::post('login', 'Simapta\LoginController@postLogin');
Route::get('logout', 'Simapta\LoginController@logout');

/**
 * Route untuk memproses registration form
 */
Route::get('register', 'Simapta\RegistrationController@register');
Route::post('postregister', 'Simapta\RegistrationController@postRegister');