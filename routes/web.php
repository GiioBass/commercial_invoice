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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/client', 'ClientController');

Route::resource('/product', 'ProductController');

Route::resource('/seller', 'SellerController');

Route::resource('/invoice', 'InvoiceController');

Route::resource('/report', 'ControlReportController');

Route::get('/invoice/{invoice}/report/update', 'ControlReportController@update');

Route::get('/invoice/{id}/report/show', 'ControlReportController@show');

Route::get('/invoice/{invoice}/report/create', 'ControlReportController@create');

Route::get('/client/{id}/confirmDelete', 'ClientController@confirmDelete');

Route::get('/product/{id}/confirmDelete', 'ProductController@confirmDelete');

Route::get('/seller/{id}/confirmDelete', 'SellerController@confirmDelete');

Route::get('/invoice/{id}/confirmDelete', 'InvoiceController@confirmDelete');

Route::get('/invoice/{invoice}/invoice_product/create', 'InvoiceProductController@create');

Route::post('/invoice/{invoice}/invoice_product', 'InvoiceProductController@store');

Route::get('/invoice/{invoice}/invoice_product/{id}/destroy', 'InvoiceProductController@destroy');

Route::get('/invoices/export', 'InvoiceController@export');

Route::post('/invoices/import', 'InvoiceController@import');

Route::get('/clients/export', 'ClientController@export');

Route::post('/clients/import', 'ClientController@import');

Route::get('/sellers/export', 'SellerController@export');

Route::post('/sellers/import', 'SellerController@import');

Route::get('/products/export', 'ProductController@export');

Route::post('/products/import', 'ProductController@import');

Route::get('/orders/updateInvoices', 'InvoiceProductController@updateInvoices');

Route::post('/orders/import', 'InvoiceProductController@import');

//Route::redirect('/invoice/{invoice}/report/update', '/invoice/{invoice}/report/show');

