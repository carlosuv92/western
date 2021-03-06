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

Route::get('/prospecto','AddSaleController@create')->name('prospecto.create');
Route::post('/prospecto','AddSaleController@store')->name('prospecto.store');
Auth::routes();

Route::get('/', function () {
    if (!Auth::user()) {
        return redirect('/login');
    } if (Auth::user()->hasRole('supervisor_seller')) {
        return redirect('dashboard/super');
    }else {
        return redirect('dashboard/admin');
    }
});

Route::prefix('dashboard')->group(function () {
    Route::get('/prospect','AddSaleController@index')->name('prospect.dashboard');
    Route::get('/super','SupervisorController@index')->name('super.dashboard');
    Route::get('/admin', 'HomeController@index')->name('home');
});



Route::resource('contract', 'ContractController');


Route::get('usuarios/act/{id}', 'UserController@active');
Route::get('usuarios/des/{id}', 'UserController@desactive');
Route::resource('usuarios', 'UserController');

Route::resource('prospect', 'ClientController');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
