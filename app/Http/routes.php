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

/**
 * Route untuk halaman Front End
 */
Route::get('/', 'Simapta\SearchController@index');
Route::get('/index', 'Simapta\SearchController@index');
Route::get('/show/{uuid?}', 'Simapta\SearchController@show');
Route::post('/result', 'Simapta\SearchController@result');
Route::post('/api/search/result', 'Simapta\SearchController@result');
Route::post('/api/v1/search/result', 'Simapta\SearchController@resultJSON');
Route::get('/api/v1/show/{uuid?}', 'Simapta\SearchController@showJSON');
Route::get('/api/v1/statistics', 'Simapta\DashboardController@statisticsJSON');
/**
 * Route untuk halaman Back End
 */


/**
 * Route untuk memproses Login Form
 */
Route::get('login', 'Simapta\LoginController@login');
Route::post('login', 'Simapta\LoginController@postLogin');
Route::get('logout', 'Simapta\LoginController@logout');


/**
 * Route Untuk menampilkan Dashboard / Home
 */
Route::get('home', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\DashboardController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);

/**
 * Route untuk memproses registration form
 */
Route::get('register', 'Simapta\RegistrationController@register');
Route::post('postregister', 'Simapta\RegistrationController@postRegister');
/*Route::get('register', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RegistrationController@register',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::post('postregister', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RegistrationController@postRegister',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);*/
Route::get('registersuccess', function (Request $request){
	return view('simapta.template.admin.registersuccess');
});

/**
 * Route untuk menampilkan data Instansi
 */
Route::get('instansi', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('instansi/create', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@create',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::post('instansi/store', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@store',
	'roles' => ['administrator'] // Only an administrator, or a manager can access this route
]);
Route::get('instansi/edit/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@edit',
	'roles' => ['administrator'] // Only an administrator, or a manager can access this route
]);
Route::get('instansi/show/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@show',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::post('instansi/update', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@update',
	'roles' => ['administrator'] // Only an administrator, or a manager can access this route
]);
Route::get('instansi/destroy/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\InstansiController@destroy',
	'roles' => ['administrator'] // Only an administrator, or a manager can access this route
]);
/**
 * Route untuk menampilkan data Server
 */
Route::get('server', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ServerController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('server/create', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ServerController@create',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::post('server/store', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ServerController@store',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('server/edit/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ServerController@edit',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::post('server/update', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ServerController@update',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('server/destroy/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ServerController@destroy',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);

/**
 * Route untuk menampilkan data API/XLS
 */
Route::get('apis', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ApiController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('apis/create', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ApiController@create',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::post('apis/store', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ApiController@store',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('apis/edit/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ApiController@edit',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::post('apis/update', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ApiController@update',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
Route::get('apis/destroy/{uuid?}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\ApiController@destroy',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);
/**
 * Route untuk menampilkan data konten manifest yang didapat dari API/XLS
 */
Route::get('data', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\DataController@index',
	'roles' => ['administrator', 'manager'] // Only an administrator, or a manager can access this route
]);


/**
 * Route Untuk menampilkan user
 */
Route::get('users', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\UserController@index',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::get('user/create', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\UserController@create',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::post('user/store', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\UserController@store',
	'roles' => ['administrator',] // Only an administrator can access this route
]);
Route::get('user/edit/{id}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\UserController@edit',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::post('user/update', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\UserController@update',
	'roles' => ['administrator',] // Only an administrator can access this route
]);
Route::get('user/destroy/{id}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\UserController@destroy',
	'roles' => ['administrator'] // Only an administrator can access this route
]);

/**
 * Route Untuk menampilkan role
 */
Route::get('roles', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RoleController@index',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::get('role/create', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RoleController@create',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::post('role/store', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RoleController@store',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::get('role/edit/{id}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RoleController@edit',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::post('role/update', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RoleController@update',
	'roles' => ['administrator'] // Only an administrator can access this route
]);
Route::get('role/destroy/{id}', [
	'middleware' => ['auth', 'roles'], // A 'roles' middleware must be specified
	'uses' => 'Simapta\RoleController@destroy',
	'roles' => ['administrator'] // Only an administrator can access this route
]);