<?php

class RolesUsuariosController extends \BaseController {

	/**
	 * Display a listing of rolesusuarios
	 *
	 * @return Response
	 */
	public function index()
	{
		$rolesusuarios = Rolesusuario::all();

		return View::make('rolesusuarios.index', compact('rolesusuarios'));
	}

	/**
	 * Show the form for creating a new rolesusuario
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('rolesusuarios.create');
	}

	/**
	 * Store a newly created rolesusuario in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Rolesusuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Rolesusuario::create($data);

		return Redirect::route('rolesusuarios.index');
	}

	/**
	 * Display the specified rolesusuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rolesusuario = Rolesusuario::findOrFail($id);

		return View::make('rolesusuarios.show', compact('rolesusuario'));
	}

	/**
	 * Show the form for editing the specified rolesusuario.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rolesusuario = Rolesusuario::find($id);

		return View::make('rolesusuarios.edit', compact('rolesusuario'));
	}

	/**
	 * Update the specified rolesusuario in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rolesusuario = Rolesusuario::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Rolesusuario::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$rolesusuario->update($data);

		return Redirect::route('rolesusuarios.index');
	}

	/**
	 * Remove the specified rolesusuario from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Rolesusuario::destroy($id);

		return Redirect::route('rolesusuarios.index');
	}

}
