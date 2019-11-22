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

Route::get('/products', 'HomeController@products')->name('products');

Route::get('/description_client/{id}', 'HomeController@description_client')->name('description_client');

Route::get('/description_product/{id}', 'HomeController@description_product')->name('description_product');

Route::get('/add_client', 'HomeController@add_client')->name('add_client');

Route::get('/add_product', 'HomeController@add_product')->name('add_product');

Route::get('/edit_client/{id}', 'HomeController@edit_client')->name('edit_client');

Route::get('/edit_product/{id}', 'HomeController@edit_product')->name('edit_product');

Route::post('/add_client', 'HomeController@create_client')->name('create_client');

Route::post('/add_product', 'HomeController@create_product')->name('create_product');

Route::put('/edit_client/{id}', 'HomeController@update_client')->name('update_client');

Route::put('/edit_product/{id}', 'HomeController@update_product')->name('update_product');

Route::delete('/delete_client/{id}', 'HomeController@delete_client')->name('delete_client');

Route::delete('/delete_product/{id}', 'HomeController@delete_product')->name('delete_product');
