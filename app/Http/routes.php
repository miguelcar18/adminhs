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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', ['as' => 'dashboard', 'uses' => 'BackController@index']);
Route::resource('users', 'UserController');
Route::resource('cargos', 'CargosController');
Route::resource('empleados', 'EmpleadosController');
Route::resource('login', 'LoginController');
Route::get('logout', ['as' => 'logout', 'uses' => 'LoginController@logout']);
