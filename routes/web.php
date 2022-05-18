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
    return view('auth.login');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

//Kategori
Route::get('/kategori', 'KategoriController@index');
Route::get('/kategori/create', 'KategoriController@create');
Route::post('/kategori/addCreate', 'KategoriController@addprosesCreate');
Route::get('/kategori/edit/{id}','KategoriController@edit');
Route::put('/kategori/update/{id}','KategoriController@update');
Route::get('/kategori/delete/{id}','KategoriController@destroy');
Route::get('/kategori/upload','KategoriController@upload');
Route::post('/kategori/upload/excel','KategoriController@uploadExcel');

//Tiket
Route::get('/tiket','TiketController@index');
Route::get('/tiket/create', 'TiketController@create');
Route::post('/tiket/addCreate', 'TiketController@addprosesCreate');
Route::get('/tiket/edit/{id}','TiketController@edit');
Route::put('/tiket/update/{id}','TiketController@update');
Route::get('/tiket/delete/{id}','TiketController@destroy');

//Transaction
Route::get('/transaction','TransactionController@index');
Route::post('/transaction/create','TransactionController@create');
Route::get('/transaction/cancel/{id}','TransactionController@destroy');
Route::get('/transaction/selesai','TransactionController@update');

//Laporan
Route::get('/transaction/pdf','TransactionController@laporanPDF');
Route::get('/transaction/excel','TransactionController@laporanExcel');

