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

Route::get('/clients', 'HomeController@clients')->name('clients');

Route::get('/description/{id}', 'HomeController@description')->name('description');

Route::get('/add_client', 'HomeController@add_client')->name('add_client');

Route::get('/client_edit/{id}', 'HomeController@client_id')->name('client_edit');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/', 'HomeController@create_client')->name('create_client');
