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
    return view('website/index');
});

Route::resource('aboutme', 'AboutMeController');
Route::resource('product', 'MyProductController');
Route::resource('port', 'PortfolioController');
Route::resource('sales', 'SalesController');
Route::resource('contact', 'ContactMeController');
Route::resource('buy', 'BuyController');

Route::get('sales', function () {

    $petani = DB::table('users')->get();

    return view('website.sales', ['petani' => $petani]);
});
