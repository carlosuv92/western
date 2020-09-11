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
Route::get('get_guias', 'Api\ConsultasController@getGuias')->name('get.guias');
Route::get('get_visitas', 'Api\ConsultasController@getVisitas')->name('get.visitas');
Route::get('get_contratos', 'Api\ConsultasController@getContracts')->name('get.contratos');
Route::get('get_pos', 'Api\ConsultasController@getPos')->name('get.pos');
Route::get('get_posinsta', 'Api\ConsultasController@getPosInsta')->name('get.posinsta');
Route::get('get_liquidacion', 'Api\ConsultasController@getLiquidacion')->name('get.liquidacion');
Route::get('get_liquidaciond', 'Api\ConsultasController@getLiquidacionD')->name('get.liquidaciond');
Route::get('get_usuarios/{id}', 'Api\ConsultasController@getUsuariosSuper')->name('get.usuarios_sup');
Route::get('get_usuarios', 'Api\ConsultasController@getUsuarios')->name('get.usuarios');
Route::get('get_visitav', 'Api\ConsultasController@getVisitasV')->name('get.visitav');
Route::get('get_ware', 'Api\ConsultasController@getWare')->name('get.ware');


//VisitasSell
Route::get('get_visitas_sell/{id}', 'Api\ConsultasController@getVisitasSell')->name('get.sellvisitas');
Route::get('get_visitas_super/{id}', 'Api\ConsultasController@getVisitasSuper')->name('get.supervisitas');

//ContratosSell
Route::get('get_contratos_sell/{id}', 'Api\ConsultasController@getContratosSell')->name('get.sellcontratos');

//ContratosSell
Route::get('get_contratos_sup/{id}', 'Api\ConsultasController@getContratosSup')->name('get.supcontratos');
Route::get('get_liqui_sup/{id}', 'Api\ConsultasController@getLiquidacionSup')->name('get.supliqui');
Route::get('get_carpetas/{id}', 'Api\ConsultasController@getCarpetasSup')->name('get.carpetas');

//Get Pockets
Route::get('get_pockets/{id}', 'Api\ConsultasController@GetPocket')->name('get.pockets');

//Import File User
Route::post('user_up', 'Api\UserImportController@importFile')->name('upload_user_api');

