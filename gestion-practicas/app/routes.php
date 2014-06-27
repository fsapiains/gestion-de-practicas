<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('rubros', 'RubrosController');
Route::resource('empresas', 'EmpresasController');
Route::resource('contactos_empresariales', 'ContactosEmpresarialesController');
Route::resource('facultades', 'FacultadesController');
Route::resource('departamentos', 'DepartamentosController');
Route::resource('escuelas', 'EscuelasController');
Route::resource('carreras', 'CarrerasController');
Route::resource('estudiantes', 'EstudiantesController');
Route::resource('practicas', 'PracticasController');
Route::get('/login', array('uses' => 'UserController@formulario_login', 'as' => 'user.formulario_login'));
Route::post('/login', array('uses' => 'UserController@hacer_login', 'as' => 'user.hacer_login'));
Route::resource('roles', 'RolesController');
Route::resource('areas_tematicas', 'AreasTematicasController');
//Route::get('/facultad', 'FacultadController@index');
