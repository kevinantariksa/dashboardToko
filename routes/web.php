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

Route::get('/tregister', function () {
    return view('register2');
});


Route::get('/tregister','HomeController@getRegister');

/** Fallback Route */
Route::fallback(function () {
    /** This will check for the 404 view page unders /resources/views/errors/404 route */
    return view('errors.404');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//Admin-Barang
Route::get('/barang','BarangController@index');
Route::get('/tambahBarang','BarangController@create'); //halaman create
Route::post('addBarang', 'BarangController@store'); //enter DB
Route::get('/updtBarang/{id}','BarangController@update'); //halaman edit
Route::get('/updateBarang/{id}','BarangController@edit'); //edit table
Route::get('/deleteBarang/{id}','BarangController@destroy'); //delete
Route::get('/barangSearch','BarangController@search'); //search

//Admin-Transaksi
Route::get('/report','RecordTransaksiController@index'); //Report based on transaksi

//Admin-Transaksi Record
Route::get('/transaksi','TransaksiController@index');
Route::get('/transaksiBaru','TransaksiController@create');//halaman trns
Route::post('/storeTransaksi','TransaksiController@store');//tabel
Route::get('/updtTransaksi/{id}','TransaksiController@update'); //halaman edit
Route::get('/updateTransaksi/{id}','TransaksiController@edit'); //edit table
Route::get('/deleteTransaksi/{id}','TransaksiController@destroy'); //delete
Route::get('/searchTransaksi','TransaksiController@search'); //search