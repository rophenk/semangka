<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Simapta\DataModel;
use Rhumsaa\Uuid\Uuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

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

Route::get('/', 'Simapta\SearchController@index');
Route::get('/index', 'Simapta\SearchController@index');
Route::get('show/{uuid?}', 'Simapta\SearchController@show');
Route::post('/result', 'Simapta\SearchController@result');

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
Route::get('instansi/edit/{uuid?}', 'Simapta\InstansiController@edit');
Route::get('instansi/show/{uuid?}', 'Simapta\InstansiController@show');
Route::post('instansi/update', 'Simapta\InstansiController@update');
Route::get('instansi/destroy/{uuid?}', 'Simapta\InstansiController@destroy');

/**
 * Route untuk menampilkan data Server
 */
Route::get('server', 'Simapta\ServerController@index');
Route::get('server/create', 'Simapta\ServerController@create');
Route::post('server/store', 'Simapta\ServerController@store');
Route::get('server/edit/{uuid?}', 'Simapta\ServerController@edit');
Route::post('server/update', 'Simapta\ServerController@update');
Route::get('server/destroy/{uuid?}', 'Simapta\ServerController@destroy');

/**
 * Route untuk menampilkan data API/XLS
 */
Route::get('apis', 'Simapta\ApiController@index');
Route::get('apis/create', 'Simapta\ApiController@create');
Route::post('apis/store', 'Simapta\ApiController@store');
Route::get('apis/edit/{uuid?}', 'Simapta\ApiController@edit');
Route::post('apis/update', 'Simapta\ApiController@update');
Route::get('apis/destroy/{uuid?}', 'Simapta\ApiController@destroy');

/**
 * Route untuk menampilkan data konten manifest yang didapat dari API/XLS
 */
Route::get('data', 'Simapta\DataController@index');