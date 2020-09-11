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

Route::resource('registro', 'RegistroController');


Auth::routes();

Route::get('/', function () {
    if (Auth::user()) {

        if (Auth::user()->hasRole('seller')) {
            return redirect('dashboard/seller');
        } else if (Auth::user()->hasRole('super')) {
            return redirect('dashboard/super');
        } else {
            return redirect('dashboard/admin');
        }
    } else {
        return redirect('/login');
    }
});

Route::prefix('dashboard')->group(function () {
    Route::get('/admin', 'HomeController@index')->name('home');
    Route::get('/super', 'SuperController@index')->name('homesuper');
    Route::get('/seller', 'SellerController@index')->name('homeseller');
});

//Warehouse
Route::prefix('warehouse')->group(function () {
    Route::get('list', 'WarehouseController@listGuide')->name('warehouse.list');
    Route::post('crear', 'WarehouseController@createGuide')->name('warehouse.crear');
    Route::get('delete/{id}', 'WarehouseController@delete')->name('warehouse.delete');
    Route::get('register/{id}', 'WarehouseController@register')->name('warehouse.register');
});
//Warehouse
Route::prefix('warehouse/pocket')->group(function () {
    Route::get('assign', 'WarehousePocketController@assign')->name('pocket.assign');
    Route::post('assign', 'WarehousePocketController@assignSup')->name('pocket.assignsup');
    Route::get('register/{id}', 'WarehousePocketController@register')->name('pocket.register');
    Route::get('pocket/delete', 'WarehousePocketController@eliminar')->name('pocket.delete');
});

Route::resource('pocket', 'WarehousePocketController');
Route::resource('warehouse', 'WarehouseController');
//FinWarehouse


//Creacion de Contract
Route::prefix('contract')->group(function () {
    Route::get('pos', 'ContractController@pos')->name('contract.pos');
    Route::get('posinsta', 'ContractController@posinsta')->name('contract.posinsta');
    Route::post('avendedor', 'ContractController@cambiarVendedor')->name('contract.avendedor');
    Route::post('comentario', 'ContractController@comentario')->name('contract.comentario');
    Route::post('pagar/{assigned}', 'ContractController@pagarVoucher')->name('contract.pagar');
    Route::get('liquidaciones', 'ContractController@IndexLiquidaciones')->name('contract.index_liqui');
    Route::post('assign', 'ContractController@assign')->name('contract.assignvoucher');
});
Route::resource('contract', 'ContractController');


Route::get('usuarios/act/{id}', 'UserController@active');
Route::get('usuarios/des/{id}', 'UserController@desactive');
Route::resource('usuarios', 'UserController');
//Creacion de Contract
Route::prefix('visita')->group(function () { });
Route::resource('visita', 'ClientController');


//Carga Ventas
Route::get('/carga_cantidad_contrato', 'HomeController@getSalesTotal')->name('carga_cantidad_contrato');

//Actualiza Precio
Route::post('/actualiza_precio', 'HomeController@actualizaPrecio')->name('precio.actualiza');

Route::prefix('folder')->group(function () {
    Route::get('entregado/{id}', 'FolderStatusController@entregado');
    Route::get('enviado/{id}', 'FolderStatusController@enviado');
});
Route::resource('folder', 'FolderStatusController');
//Logout
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
