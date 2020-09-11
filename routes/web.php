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
Auth::routes();

Route::get('/', function () {
    if (Auth::user()) {
        return redirect('dashboard/admin');
    } else {
        return redirect('/login');
    }
});

Route::prefix('dashboard')->group(function () {
    Route::get('/admin', 'HomeController@index')->name('home');
});



Route::resource('contract', 'ContractController');


Route::get('usuarios/act/{id}', 'UserController@active');
Route::get('usuarios/des/{id}', 'UserController@desactive');
Route::resource('usuarios', 'UserController');

Route::resource('prospect', 'ClientController');


Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
