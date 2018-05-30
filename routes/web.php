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

Route::resource('alumnos', 'AlumnoController');
Route::resource('materias', 'MateriaController');

Route::post('/alumnos', 'AlumnoController@index')->name('usuarios_buscar');
Route::post('/materias', 'MateriaController@index')->name('materias_buscar');

Route::get('/inscripcion', 'InscripcionController@formulario')->name('inscripcion_formulario');
Route::post('/inscripcion', 'InscripcionController@registrar')->name('inscripcion_registro');

Route::get('/', function() {
    return view('inicio');
})->name('inicio');