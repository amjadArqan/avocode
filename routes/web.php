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

Route::get('/', 'ProductController@index')->name('product');
Route::get('/processPaymentGetResponse', 'PaymentContoller@GetResponse');
Route::get('/log', 'PaymentContoller@log');
Route::get('log/export', 'PaymentContoller@export')->name('export');

Route::post('/processPayment', 'PaymentContoller@processPayment')->name('processPayment');

Route::resource('product', 'ProductController');
Route::resource('cart', 'CartController');


/* Route Api on Api File */
