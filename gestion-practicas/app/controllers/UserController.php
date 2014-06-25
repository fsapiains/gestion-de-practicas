<?php

class UserController extends \BaseController {


    public function formulario_login()
    {
        return View::make('user.formulario_login');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function hacer_login()
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
        if (!empty($objeto)) {
            error_log($objeto->mensaje . " rut $rut");
            if ($objeto->respuesta)
                $resultado = 'login ok';
            else
                $resultado = 'login fail';
        }
        return $resultado;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
