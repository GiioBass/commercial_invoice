<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->prefix('/user')->group(function (){
    Route::post('/login', 'api\LoginController@login');
    Route::resource('seller', 'api\ApiSellerController');
    Route::resource('client', 'api\ApiClientController');
    Route::resource('product', 'api\ApiProductController');
    Route::resource('invoice', 'api\ApiInvoiceController');
    Route::resource('invoice_product', 'api\ApiInvoiceProductController');
});
