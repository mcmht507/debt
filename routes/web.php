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
Route::get('/', function () {
    return view('login');
});
// auth
Auth::routes();
Route::get('/index', 'PaymentController@index')->name('index');
// pay
Route::get('/pay/register', 'PaymentController@dispRegister')->name('pay.dispRegister');
Route::post('/pay/register', 'PaymentController@register')->name('pay.register');
Route::post('/pay', 'PaymentController@pay')->name('pay.pay');
