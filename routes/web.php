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

// Recursos CRUD
Route::resource('alumnos', 'AlumnoController');
Route::resource('materias', 'MateriaController');

// Búsqueda y paginación
Route::post('/alumnos', 'AlumnoController@index')->name('usuarios_buscar');
Route::post('/materias', 'MateriaController@index')->name('materias_buscar');

// Módulo de inscripción
Route::get('/inscripcion', 'InscripcionController@index')->name('inscripcion_index');
Route::post('/inscripcion', 'InscripcionController@store')->name('inscripcion_store');
Route::delete('/inscripcion', 'InscripcionController@delete')->name('inscripcion_delete');

// Módulo de boleta
Route::get('/boleta', 'BoletaController@index')->name('boleta_index');

// Módulo de calificación
Route::get('/calificacion', 'CalificacionController@index')->name('calificacion_index');
Route::post('/calificacion', 'CalificacionController@store')->name('calificacion_store');

// Página de inicio
Route::get('/', function() {
    return view('inicio');
})->name('inicio');