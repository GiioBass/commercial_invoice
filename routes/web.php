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

Route::resource('/client', 'ClientController');

Route::resource('/product', 'ProductController');

Route::resource('/seller', 'SellerController');

Route::resource('/invoice', 'InvoiceController');

Route::get('/client/{id}/confirmDelete', 'ClientController@confirmDelete');

Route::get('/product/{id}/confirmDelete', 'ProductController@confirmDelete');

Route::get('/seller/{id}/confirmDelete', 'SellerController@confirmDelete');

Route::get('/invoice/{id}/confirmDelete', 'InvoiceController@confirmDelete');

Route::get('/invoice/{invoice}/invoice_product/create', 'InvoiceProductController@create');

Route::post('/invoice/{invoice}/invoice_product', 'InvoiceProductController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/invoice/{id}/updateOrder', 'InvoiceController@updateOrder');

Route::get('/invoice/{invoice}/invoice_product/{id}/destroy', 'InvoiceProductController@destroy');

Route::get('/invoices/export', 'InvoiceController@export');

Route::post('/invoices/import', 'InvoiceController@import');

