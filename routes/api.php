<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Ususario
Route::get('buscar/provincia/{id}', 'Api\ConsultasController@buscaProvincia')->name('busca.provincia');
Route::get('buscar/distrito/{id}', 'Api\ConsultasController@buscaDistrito')->name('busca.distrito');

//FinUsuario
Route::get('get_prospect', 'Api\ConsultasController@getProspect')->name('get.prospect');
Route::get('get_contratos', 'Api\ConsultasController@getContracts')->name('get.contratos');
Route::get('get_liquidacion', 'Api\ConsultasController@getLiquidacion')->name('get.liquidacion');
Route::get('get_usuarios', 'Api\ConsultasController@getUsuarios')->name('get.usuarios');

//Import File User
Route::post('user_up', 'Api\UserImportController@importFile')->name('upload_user_api');

