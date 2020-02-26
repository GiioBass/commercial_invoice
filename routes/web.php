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

Route::get('/invoice/{invoice}/report/update', 'ControlReportController@update')->name('url.redirection');

Route::get('/invoice/{id}/report/show', 'ControlReportController@show')->name('report.show');

Route::get('/invoice/{invoice}/report/create', 'ControlReportController@create')->name('report.create');

Route::get('/client/{id}/confirmDelete', 'ClientController@confirmDelete')->name('client.delete');

Route::get('/product/{id}/confirmDelete', 'ProductController@confirmDelete')->name('product.delete');

Route::get('/seller/{id}/confirmDelete', 'SellerController@confirmDelete')->name('seller.delete');

Route::get('/invoice/{id}/confirmDelete', 'InvoiceController@confirmDelete')->name('invoice.delete');

Route::get('/invoice/{invoice}/invoice_product/create', 'InvoiceProductController@create')->name('order.create');

Route::post('/invoice/{invoice}/invoice_product', 'InvoiceProductController@store')->name('order.store');

Route::get('/invoice/{invoice}/invoice_product/{id}/destroy', 'InvoiceProductController@destroy')->name('order.delete');

Route::get('/invoices/export', 'InvoiceController@export')->name('invoice.export');

Route::post('/invoices/import', 'InvoiceController@import')->name('invoice.import');

Route::get('/clients/export', 'ClientController@export')->name('client.export');

Route::post('/clients/import', 'ClientController@import')->name('client.import');

Route::get('/sellers/export', 'SellerController@export')->name('seller.export');

Route::post('/sellers/import', 'SellerController@import')->name('seller.import');

Route::get('/products/export', 'ProductController@export')->name('product.export');

Route::post('/products/import', 'ProductController@import')->name('product.import');

Route::get('/orders/updateInvoices', 'InvoiceProductController@updateInvoices')->name('orders.updateInvoices');

Route::post('/orders/import', 'InvoiceProductController@import')->name('orders.import');

Route::redirect('/', '/home');
