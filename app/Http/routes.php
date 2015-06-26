<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

Route::get('/', function () {
    return view('welcome');
});

Route::get('home', function (Request $request) {
	if ($request-> user()) {
		// $request->user() returns an instance of the authenticated user...
		return view('simapta.template.admin.dashboard');
	} else {
		return view('simapta.template.admin.login');
	}
    
});

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

Route::get('dashboard', function () {
    return view('simapta.template.admin.dashboard');
});

/**
 * Route untuk menampilkan data Instansi
 */
Route::get('instansi', 'Simapta\InstansiController@index');
Route::get('instansi/create', 'Simapta\InstansiController@create');
Route::post('instansi/store', 'Simapta\InstansiController@store');

/**
 * Route untuk menampilkan data Server
 */
Route::get('server', 'Simapta\ServerController@index');
Route::get('server/create', 'Simapta\ServerController@create');
Route::post('server/store', 'Simapta\ServerController@store');

/**
 * Route untuk menampilkan data API/XLS
 */
Route::get('apis', 'Simapta\ApiController@index');
Route::get('apis/create', 'Simapta\ApiController@create');
Route::post('apis/store', 'Simapta\ApiController@store');

/**
 * Route untuk menampilkan data konten manifest yang didapat dari API/XLS
 */
Route::get('data', 'Simapta\DataController@index');
Route::get('data/create', 'Simapta\DataController@create');