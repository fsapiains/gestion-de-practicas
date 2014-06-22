<?php

class RubrosController extends \BaseController {

	/**
	 * Display a listing of rubros
	 *
	 * @return Response
	 */
	public function index()
	{
		$rubros = Rubro::all();

		return View::make('rubros.index', compact('rubros'));
	}

	/**
	 * Show the form for creating a new rubro
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('rubros.create');
	}

	/**
	 * Store a newly created rubro in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('rubro', 'descripcion'), Rubro::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Rubro::create($data);

		return Redirect::route('rubros.index');
	}

	/**
	 * Display the specified rubro.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$rubro = Rubro::findOrFail($id);

		return View::make('rubros.show', compact('rubro'));
	}

	/**
	 * Show the form for editing the specified rubro.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$rubro = Rubro::find($id);

		return View::make('rubros.edit', compact('rubro'));
	}

	/**
	 * Update the specified rubro in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rubro = Rubro::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Rubro::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$rubro->update($data);

		return Redirect::route('rubros.index');
	}

	/**
	 * Remove the specified rubro from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Rubro::destroy($id);

		return Redirect::route('rubros.index');
	}

}
