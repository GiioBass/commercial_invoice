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

//Route::resource('/client', 'ClientController');

//Route::resource('/product', 'ProductController');

//Route::resource('/seller', 'SellerController');

//Route::resource('/invoice', 'InvoiceController');

//Route::resource('/report', 'ControlReportController');

//Route::resource('/user', 'UserController');
//
//Route::resource('/role', 'RoleController');
//
//Route::get('/invoice/{invoice}/report/update', 'ControlReportController@update')->name('url.redirection');
//
//Route::get('/invoice/{id}/report/show', 'ControlReportController@show')->name('report.show');
//
//Route::get('/invoice/{invoice}/report/create', 'ControlReportController@create')->name('report.create');

//Route::get('/client/{id}/confirmDelete', 'ClientController@confirmDelete')->name('client.delete');

//Route::get('/product/{id}/confirmDelete', 'ProductController@confirmDelete')->name('product.delete');

//Route::get('/seller/{id}/confirmDelete', 'SellerController@confirmDelete')->name('seller.delete');

//Route::get('/invoice/{id}/confirmDelete', 'InvoiceController@confirmDelete')->name('invoice.delete');
//
//Route::get('/invoice/{invoice}/invoice_product/create', 'InvoiceProductController@create')->name('order.create');
//
//Route::post('/invoice/{invoice}/invoice_product', 'InvoiceProductController@store')->name('order.store');
//
//Route::get('/invoice/{invoice}/invoice_product/{id}/destroy', 'InvoiceProductController@destroy')->name('order.delete');

//Route::get('/invoices/export', 'InvoiceController@export')->name('invoice.export');
//
//Route::post('/invoices/import', 'InvoiceController@import')->name('invoice.import');

//Route::get('/clients/export', 'ClientController@export')->name('client.export');
//
//Route::post('/clients/import', 'ClientController@import')->name('client.import');

//Route::get('/sellers/export', 'SellerController@export')->name('seller.export');

//Route::post('/sellers/import', 'SellerController@import')->name('seller.import');

//Route::get('/products/export', 'ProductController@export')->name('product.export');

//Route::post('/products/import', 'ProductController@import')->name('product.import');
//
//Route::get('/orders/updateInvoices', 'InvoiceProductController@updateInvoices')->name('orders.updateInvoices');
//
//Route::post('/orders/import', 'InvoiceProductController@import')->name('orders.import');

Route::redirect('/', '/home');


Route::middleware(['auth'])->group(function () {
//  Routes Clients
    Route::get('/client', 'ClientController@index')->name('client.index')
        ->middleware('can:client.index');
    Route::get('/client/create', 'ClientController@create')->name('client.create')
        ->middleware('can:client.create');
    Route::post('/client/store', 'ClientController@store')->name('client.store')
        ->middleware('can:client.store');
    Route::get('/client/{id}/edit', 'ClientController@edit')->name('client.edit')
        ->middleware('can:client.edit');
    Route::delete('/client/{id}', 'ClientController@destroy')->name('client.destroy')
        ->middleware('can:client.delete');
    Route::put('/client/{id}', 'ClientController@update')->name('client.update')
        ->middleware('can:client.edit');
    Route::get('/client{id}/confirmDelete', 'ClientController@confirmDelete')->name('client.delete')
        ->middleware('can:client.delete');
    Route::get('/client/import', 'ClientController@import')->name('client.import')
        ->middleware('can:client.import');
    Route::get('/client/export', 'ClientController@export')->name('client.export')
        ->middleware('can:client.export');
//  Routes Products
    Route::get('/product', 'ProductController@index')->name('product.index')
        ->middleware('can:product.index');
    Route::get('/product/create', 'ProductController@create')->name('product.create')
        ->middleware('can:product.create');
    Route::post('/product/store', 'ProductController@store')->name('product.store')
        ->middleware('can:product.store');
    Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit')
        ->middleware('can:product.edit');
    Route::delete('/product/{id}', 'ProductController@destroy')->name('product.destroy')
        ->middleware('can:product.delete');
    Route::put('/product/{id}', 'ProductController@update')->name('product.update')
        ->middleware('can:product.edit');
    Route::get('/product/{id}/confirmDelete', 'ProductController@confirmDelete')->name('product.delete')
        ->middleware('can:product.delete');
    Route::get('/product/import', 'ProductController@import')->name('product.import')
        ->middleware('can:product.import');
    Route::get('/product/export', 'ProductController@export')->name('product.export')
        ->middleware('can:product.export');

    //  Routes Seller
    Route::get('/seller', 'SellerController@index')->name('seller.index')
        ->middleware('can:seller.index');
    Route::get('/seller/create', 'SellerController@create')->name('seller.create')
        ->middleware('can:seller.create');
    Route::post('/seller/store', 'SellerController@store')->name('seller.store')
        ->middleware('can:seller.store');
    Route::get('/seller/{id}/edit', 'SellerController@edit')->name('seller.edit')
        ->middleware('can:seller.edit');
    Route::delete('/seller/{id}', 'SellerController@destroy')->name('seller.destroy')
        ->middleware('can:seller.delete');
    Route::put('/seller/{id}', 'SellerController@update')->name('seller.update')
        ->middleware('can:seller.edit');
    Route::get('/seller/{id}/confirmDelete', 'SellerController@confirmDelete')->name('seller.delete')
        ->middleware('can:seller.delete');
    Route::get('/seller/import', 'SellerController@import')->name('seller.import')
        ->middleware('can:seller.import');
    Route::get('/seller/export', 'SellerController@export')->name('seller.export')
        ->middleware('can:seller.export');

//  Routes invoice
    Route::get('/invoice', 'InvoiceController@index')->name('invoice.index')
        ->middleware('can:invoice.index');
    Route::get('/invoice/{invoice}/show', 'InvoiceController@show')->name('invoice.show')
        ->middleware('can:invoice.show');
    Route::get('/invoice/create', 'InvoiceController@create')->name('invoice.create')
        ->middleware('can:invoice.create');
    Route::post('/invoice/store', 'InvoiceController@store')->name('invoice.store')
        ->middleware('can:invoice.store');
    Route::get('/invoice/{id}/edit', 'InvoiceController@edit')->name('invoice.edit')
        ->middleware('can:invoice.edit');
    Route::delete('/invoice/{id}', 'InvoiceController@destroy')->name('invoice.destroy')
        ->middleware('can:invoice.delete');
    Route::put('/invoice/{id}', 'InvoiceController@update')->name('invoice.update')
        ->middleware('can:invoice.edit');
    Route::get('/invoice/{id}/confirmDelete', 'InvoiceController@confirmDelete')->name('invoice.delete')
        ->middleware('can:invoice.delete');
    Route::get('/invoice/import', 'InvoiceController@import')->name('invoice.import')
        ->middleware('can:invoice.import');
    Route::get('/invoice/export', 'InvoiceController@export')->name('invoice.export')
        ->middleware('can:invoice.export');

//  Routes user
    Route::get('/user', 'UserController@index')->name('user.index')
        ->middleware('can:user.index');
    Route::get('/user/create', 'UserController@create')->name('user.create')
        ->middleware('can:user.create');
    Route::post('/user/store', 'UserController@store')->name('user.store')
        ->middleware('can:user.store');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit')
        ->middleware('can:user.edit');
    Route::delete('/user/{id}', 'UserController@destroy')->name('user.destroy')
        ->middleware('can:user.delete');
    Route::put('/user/{id}', 'UserController@update')->name('user.update')
        ->middleware('can:user.edit');

//  Routes role
    Route::get('/role', 'RoleController@index')->name('role.index')
        ->middleware('can:role.index');
    Route::get('/role/create', 'RoleController@create')->name('role.create')
        ->middleware('can:role.create');
    Route::post('/role/store', 'RoleController@store')->name('role.store')
        ->middleware('can:role.store');
    Route::get('/role/{id}/edit', 'RoleController@edit')->name('role.edit')
        ->middleware('can:role.edit');
    Route::delete('/role/{id}', 'RoleController@destroy')->name('role.destroy')
        ->middleware('can:role.delete');
    Route::put('/role/{id}', 'RoleController@update')->name('role.update')
        ->middleware('can:role.edit');

//  Routes report

    Route::get('/invoice/{invoice}/report/update', 'ControlReportController@update')->name('url.redirection')
        ->middleware('can:report.create');
    Route::get('/invoice/{id}/report/show', 'ControlReportController@show')->name('report.show')
        ->middleware('can:report.show');
    Route::get('/invoice/{invoice}/report/create', 'ControlReportController@create')->name('report.create')
        ->middleware('can:report.create');
    Route::get('/invoice/{invoice}/invoice_product/create', 'InvoiceProductController@create')->name('order.create')
        ->middleware('can:order.create');
    Route::post('/invoice/{invoice}/invoice_product', 'InvoiceProductController@store')->name('order.store')
        ->middleware('can:order.create');
    Route::get('/invoice/{invoice}/invoice_product/{id}/destroy', 'InvoiceProductController@destroy')->name('order.delete')
        ->middleware('can:order.delete');
    Route::get('/orders/updateInvoices', 'InvoiceProductController@updateInvoices')->name('orders.updateInvoices')
        ->middleware('can:orders.updateInvoices');
    Route::post('/orders/import', 'InvoiceProductController@import')->name('orders.import')
        ->middleware('can:orders.import');

//  Panel control de accesos
    Route::get('access_api', function () {
        return view('ApiAccess.control_panel');
    })->name('access_api');

});



