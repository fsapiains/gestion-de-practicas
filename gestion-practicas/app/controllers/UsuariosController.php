<?php

class UsuariosController extends \BaseController {

	/**
	 * Display a listing of usuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$usuarios = Usuario::all();

		return View::make('usuarios.index', compact('usuarios'));
	}

	/**
	 * Show the form for creating a new usuario
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('usuarios.create');
	}

	/**
	 * Store a newly created usuario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rut = Input::get('rut');

        $contrasena = Input::get('password');

        $password = hash('sha256', strtoupper($contrasena));
        $url = "https://146.83.181.139/saap-rest/api/autenticar/$rut/$password";

        $opciones = array(
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
            )
        );
        $contexto = stream_context_create($opciones);

        $objeto = json_decode(file_get_contents($url, false, $contexto));

        //if (!empty($objeto)) {
            error_log($objeto->mensaje . " rut $rut");

           echo $objeto->mensaje;

        $usuario= new Usuario;
        $usuario->rut=substr(Input::get('rut'),0,-1);
        $usuario->contrasena=Input::get('password');
        $usuario->save();
        /*
		$validator = Validator::make($data = Input::all(), Usuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Usuario::create($data);

		return Redirect::route('usuarios.index');*/
	}

	/**
	 * Display the specified usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$usuario = Usuario::findOrFail($id);

		return View::make('usuarios.show', compact('usuario'));
	}

	/**
	 * Show the form for editing the specified usuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$usuario = Usuario::find($id);

		return View::make('usuarios.edit', compact('usuario'));
	}

	/**
	 * Update the specified usuario in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$usuario = Usuario::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Usuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$usuario->update($data);

		return Redirect::route('usuarios.index');
	}

	/**
	 * Remove the specified usuario from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Usuario::destroy($id);

		return Redirect::route('usuarios.index');
	}

}
