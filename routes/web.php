<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index');

Route::resource('jeus', 'JeuController');

Route::resource('operations', 'OperationController');

Route::resource('participations', 'ParticipationController');

Route::resource('parties', 'PartieController');

Route::resource('users', 'UserController');

Route::resource('parties', 'PartieController');

Route::prefix('admin')->group(function () {
    Route::any('panel', "AdminController@index");
});//->middleware("Admin");

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');