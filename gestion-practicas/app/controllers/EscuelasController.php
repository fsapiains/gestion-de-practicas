<?php

class EscuelasController extends \BaseController {

	/**
	 * Display a listing of escuelas
	 *
	 * @return Response
	 */
	public function index()
	{
		$escuelas = Escuela::all();

		return View::make('escuelas.index', compact('escuelas'));
	}

	/**
	 * Show the form for creating a new escuela
	 *
	 * @return Response
	 */
	public function create()
	{
        $departamentos = Departamento::all();
        $departamentos_select = array();
        foreach($departamentos as $departamento) {
            $departamentos_select[$departamento->pk] = $departamento->nombre;
        }

		return View::make('escuelas.create')
             ->with('departamentos', $departamentos_select);
	}

	/**
	 * Store a newly created escuela in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('departamento_fk','nombre','descripcion'), Escuela::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Escuela::create($data);

		return Redirect::route('escuelas.index');
	}

	/**
	 * Display the specified escuela.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$escuela = Escuela::findOrFail($id);

		return View::make('escuelas.show', compact('escuela'));
	}

	/**
	 * Show the form for editing the specified escuela.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$escuela = Escuela::find($id);

		return View::make('escuelas.edit', compact('escuela'));
	}

	/**
	 * Update the specified escuela in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$escuela = Escuela::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Escuela::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$escuela->update($data);

		return Redirect::route('escuelas.index');
	}

	/**
	 * Remove the specified escuela from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Escuela::destroy($id);

		return Redirect::route('escuelas.index');
	}

}
