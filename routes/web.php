<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('customers');
});

Route::get('/customers', ['as' => 'customers', 'uses' => 'App\Http\Controllers\CustomerController@filter']);

Route::get('/customers/{id}', ['as' => 'customerInfo', 'uses' => 'App\Http\Controllers\CustomerController@show']);
