<?php

class AreasTematicasController extends \BaseController {

	/**
	 * Display a listing of areastematicas
	 *
	 * @return Response
	 */
	public function index()
	{
		$areastematicas = Areastematica::all();

		return View::make('areas_tematicas.index', compact('areastematicas'));
	}

	/**
	 * Show the form for creating a new areastematica
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('areas_tematicas.create');
	}

	/**
	 * Store a newly created areastematica in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('tema','descripcion'), Areastematica::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Areastematica::create($data);

		return Redirect::route('areas_tematicas.index');
	}

	/**
	 * Display the specified areastematica.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$areastematica = Areastematica::findOrFail($id);

		return View::make('areas_tematicas.show', compact('areastematica'));
	}

	/**
	 * Show the form for editing the specified areastematica.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$areastematica = Areastematica::find($id);

		return View::make('areas_tematicas.edit', compact('areastematica'));
	}

	/**
	 * Update the specified areastematica in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$areastematica = Areastematica::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Areastematica::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$areastematica->update($data);

		return Redirect::route('areas_tematicas.index');
	}

	/**
	 * Remove the specified areastematica from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Areastematica::destroy($id);

		return Redirect::route('areas_tematicas.index');
	}

}
