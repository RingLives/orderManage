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

Route::get('/', function(){
	return redirect()->route("login");
});

Route::middleware("admin_guest")->group(function(){
	Route::get('/login', 'AuthController@loginView')->name("login");
	Route::get('/admin/login', 'AuthController@loginView')->name("admin.login");
	Route::post('/login', 'AuthController@login')->name("login");
});

Route::middleware("admin")->prefix('admin')->group(function(){
	Route::get('/', 'UserController@index')->name("admin.dashboard.index");
	Route::get('/logout', 'AuthController@logout')->name("admin.logout");
});
