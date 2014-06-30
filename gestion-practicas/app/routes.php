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

Route::get('/', array('as' => 'home', 'uses' => 'DashBoardController@home'));

// Rutas de login/logout

Route::get('logout', array('as' => 'user.logout', 'uses' => 'UsuariosController@logout'));
Route::get('/login', array('uses' => 'UsuariosController@loginUser', 'as' => 'user.login_form'));
Route::post('/login', array('uses' => 'UsuariosController@hacer_login', 'as' => 'user.hacer_login'));


Route::group(array('before' => 'admin'), function()
{
    // Recursos
    Route::resource('estudiantes', 'EstudiantesController'); // Recurso de estudiantes
    Route::resource('practicas', 'PracticasController'); // Recurso restful de practicas
    Route::resource('empresas', 'EmpresasController'); //Recurso empresas
    Route::resource('contactos_empresariales', 'ContactosEmpresarialesController');

    // Busquedas
    Route::post('estudiantes/buscar', array('uses'=>'EstudiantesController@buscar', 'as' => 'estudiantes.buscar'));
    Route::post('practicas/buscar', array('uses'=>'PracticasController@buscar', 'as' => 'practicas.buscar'));
});


//Route::get('practicas/{pk}',array('uses'=>'PracticasController@verDetalle'));
/*Route::get('/areas_tematicas/{pk}',array('uses'=>'PracticasController@buscarPorTema'));
Route::resource('rubros', 'RubrosController');
Route::resource('contactos_empresariales', 'ContactosEmpresarialesController');
Route::resource('facultades', 'FacultadesController');
Route::resource('departamentos', 'DepartamentosController');
Route::resource('escuelas', 'EscuelasController');
Route::resource('carreras', 'CarrerasController');


//Route::post('/login',array('uses'=>'UsuariosController@loginUser'));
//Route::get('/login', array('uses' => 'UserController@formulario_login', 'as' => 'user.formulario_login'));

//Route::post('/loginuser', array('uses' => 'UsuariosController@loginuser', 'as' => 'usuarios.loginuser'));
//Route::post('/loginuser', array('uses' => 'UsuariosController@hacer_login', 'as' => 'usuarios.hacer_login'));
Route::resource('roles', 'RolesController');
Route::resource('areas_tematicas', 'AreasTematicasController');
//Route::resource('usuarios', 'UsuariosController');
//Route::get('/facultad', 'FacultadController@index');

//Route::get('practicas.borrar',array('uses'=>'PracticasController@eliminarPractica'));
//Route::post('practicas.borrar.enviar', array('uses' => 'PracticasController@destroy'));




*/
#login