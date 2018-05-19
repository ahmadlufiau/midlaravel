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
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Versi Inggris
Route::resource('category', 'Category2Controller');
Route::resource('category.spending', 'SpendingController');

// Versi Indonesia
Route::resource('kategori','KategoriController');
Route::resource('kategori.pengeluaran', 'PengeluaranController');