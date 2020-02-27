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
    //session(['username' => 'Duan']);
    session()->flush();
    if (session()->has('username')) {
        dump(session('username'));
    } else {
        return view('login');
    }
    return view('welcome');
});

Route::group(['middleware' => 'cekLogin'], function () {

    //JALUR UNTUK AKSES TB MOTOR
    Route::get('/rental/motor', 'RentalController@motor');
    Route::match(['get', 'post'],'/rental/insertmotor', 'RentalController@insertmotor');
    Route::get('/rental/hapus_motor/{plat_motor}', 'RentalController@hapus_motor');
    //JALUR UNTUK AKSES TB CUSTOMER
    Route::get('/rental/customer', 'RentalController@customer');
    Route::get('/rental/tambah_customer', 'RentalController@tambah_customer');
    Route::match(['get', 'post'],'/rental/insertcustomer', 'RentalController@insertcustomer');
    Route::get('/rental/edit_customer/{id}', 'RentalController@edit_customer');
    Route::match(['get', 'post'],'/rental/update_customer', 'RentalController@update_customer');
    //JALUR UNTUK AKSES TB TRANSAKSI
    Route::get('/rental/transaksi', 'RentalController@transaksi');
    Route::match(['get', 'post'],'/rental/inserttransaksi', 'RentalController@inserttransaksi');
    Route::get('/rental/edit_transaksi/{id}', 'RentalController@edit_transaksi');
    Route::match(['get', 'post'],'/rental/update_transaksi', 'RentalController@update_transaksi');
    //JALUR RENTAL
    Route::get('/rental/proses/{id}', 'RentalController@proses');
});

//User login/logout
Route::match(['get', 'post'], '/rental/login', 'RentalController@login');
Route::get('/user/logout', 'RentalController@logout');


Route::match(['get', 'post'],'/rental/identitas', 'RentalController@identitas');
