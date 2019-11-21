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

use App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/clients', 'HomeController@clients')->name('clients');

Route::get('/description/{id}', 'HomeController@description')->name('description');

Route::get('/add_client', 'HomeController@add_client')->name('add_client');

Route::get('/edit_client/{id}', 'HomeController@edit_client')->name('edit_client');

Route::post('/', 'HomeController@create_client')->name('create_client');

Route::put('/edit_client/{id}', 'HomeController@update_client')->name('update_client');

Route::delete('/delete_client/{id}', 'HomeController@delete_client')->name('delete_client');
