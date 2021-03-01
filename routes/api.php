<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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



Route::get('recintos', 'RecintoController@getRecintos')->name('recintos.listar');
Route::get('recintos/{id}', 'RecintoController@getMesa')->name('recintos.mesas');

Route::get('persona/{ci}/{codigo}', 'PersonaController@revisar')->name('persona.revisar');

Route::post('votos', 'VotoController@store')->name('votos.guardar');
