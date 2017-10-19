<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('campista/searchCampistas/', 'CampistaController@searchCampistas');
Route::get('campista/CampistaPaginatesearch/', 'CampistaController@CampistaPaginatesearch');
Route::resource('campista', 'CampistaController');
Route::resource('directivo', 'DirectivoController');
Route::resource('iglesia', 'IglesiaController');


Route::get('gestion/colores/{id_gestion}', 'GestionController@colores')->name('gestion.colores');
Route::get('gestion/todos/{id_gestion}', 'GestionController@todos')->name('gestion.todos');
Route::get('gestion/printColores/{gestion}/{grupo}', 'GestionController@printColores')->name('gestion.printColores');
Route::get('gestion/printTodos/{gestion}', 'GestionController@printTodos')->name('gestion.printTodos');
Route::resource('gestion', 'GestionController');

Route::post('boleta/guardar/{id_campista}', 'BoletaController@store')->name('boleta.guardar');
Route::get('boleta/print/{boleta}', 'BoletaController@printBoleta')->name('boleta.print');
Route::resource('boleta', 'BoletaController');
Route::resource('grupo', 'GrupoController');

