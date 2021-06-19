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
    return view('welcome');
});

//main route
Route::group(['middleware' => ['auth']], function() {
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});

//Route orders
Route::group(['middleware' => ['auth', 'role:customer']], function() {
    Route::get('/dashboard/orders', 'App\Http\Controllers\DashboardController@orders')->name('dashboard.orders');
});

//Route inventory
Route::group(['middleware' => ['auth', 'role:supplier']], function() {
    Route::get('/dashboard/inventory', 'App\Http\Controllers\DashboardController@inventory')->name('dashboard.inventory');
});

require __DIR__.'/auth.php';
