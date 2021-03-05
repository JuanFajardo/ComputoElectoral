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
    return view('gamp');
});

Route::get('/Voto/votoVer/{id}', 'VotoController@votoVer');
Route::resource('/Voto',    'VotoController');
Route::resource('/Persona', 'PersonaController');
Route::resource('/Mesa',    'MesaController');
Route::resource('/Recinto', 'RecintoController');
Route::resource('/Zona',    'ZonaController');
Route::resource('/Distrito','DistritoController');
Route::resource('/Log','LogController');

Route::get('Grafico',"VotoController@Grafico");
Route::get('BuscarZona/{id}',"VotoController@BuscarZona");
Route::get('BuscarRecinto/{id}',"VotoController@BuscarRecinto");
Route::post('VerGrafico',"VotoController@VerGrafico");
Route::get('ContarVotos',"VotoController@ContarVotos");
