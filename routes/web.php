<?php

use Illuminate\Support\Facades\Route;

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

Route::get('cars/index', 'CarController@index')->name('cars.index');

Auth::routes();

Route::middleware(['auth'])->group(function () {

	Route::get('cars/create', 'CarController@create')->name('cars.create');

	Route::get('cars/store', 'CarController@store')->name('cars.store');

	Route::get('cars/edit/{id}', 'CarController@edit')->name('cars.edit');

	Route::get('cars/update/{id}', 'CarController@update')->name('cars.update');

	Route::get('cars/destroy/{id}', 'CarController@destroy')->name('cars.destroy');

	Route::get('schedulings/create/{id}', 'SchedulingController@create')->name('schedulings.create');

	Route::post('schedulings/store', 'SchedulingController@store')->name('schedulings.store');	
	
	Route::get('schedulings/index', 'SchedulingController@index')->name('schedulings.index');

});

Route::get('/home', 'HomeController@index')->name('home');

