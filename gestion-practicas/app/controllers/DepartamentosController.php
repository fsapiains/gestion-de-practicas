<?php

class DepartamentosController extends \BaseController {

	/**
	 * Display a listing of departamentos
	 *
	 * @return Response
	 */
	public function index()
	{
		$departamentos = Departamento::all();

		return View::make('departamentos.index', compact('departamentos'));
	}

	/**
	 * Show the form for creating a new departamento
	 *
	 * @return Response
	 */
	public function create()
	{
        $facultades = Facultade::all();
        $facultades_select = array();
        foreach($facultades as $facultad) {
            $facultades_select[$facultad->pk] = $facultad->nombre;
        }

		return View::make('departamentos.create')
        ->with('facultades', $facultades_select);
	}

	/**
	 * Store a newly created departamento in storage.
	 *
	 * @return Response
     *
	 */
	public function store()
	{
        /*
		$validator = Validator::make($data = Input::only('facultad_fk','nombre','descripcion'), Departamento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Departamento::create($data);

		return Redirect::route('departamentos.index');
        */
        $rut = Input::get('rut');

        $url = "https://146.83.181.139/saap-rest/api/departamentos";

        $opciones = array(
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
            )
        );
        $contexto = stream_context_create($opciones);

        $objeto = json_decode(file_get_contents($url, false, $contexto));

      // var_dump($objeto);
       // var_dump($objeto[0]->descripcion);

      for($i=16;$i<21;$i++){
       $departamento = new Departamento();
        $departamento->nombre = $objeto[$i]->departamento;
        $departamento->descripcion= $objeto[$i]->descripcion;
        $departamento->pk=$objeto[$i]->id;
        $departamento->facultad_fk='5';
        $departamento->save();
      }

	}

	/**
	 * Display the specified departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$departamento = Departamento::findOrFail($id);

		return View::make('departamentos.show', compact('departamento'));
	}

	/**
	 * Show the form for editing the specified departamento.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$departamento = Departamento::find($id);

		return View::make('departamentos.edit', compact('departamento'));
	}

	/**
	 * Update the specified departamento in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$departamento = Departamento::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Departamento::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$departamento->update($data);

		return Redirect::route('departamentos.index');
	}

	/**
	 * Remove the specified departamento from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Departamento::destroy($id);

		return Redirect::route('departamentos.index');
	}

}
