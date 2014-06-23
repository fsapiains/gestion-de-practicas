<?php

class FacultadesController extends \BaseController {

	/**
	 * Display a listing of facultades
	 *
	 * @return Response
	 */
	public function index()
	{
		$facultades = Facultade::all();

		return View::make('facultades.index', compact('facultades'));
	}

	/**
	 * Show the form for creating a new facultade
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('facultades.create');
	}

	/**
	 * Store a newly created facultade in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('nombre' , 'descripcion'), Facultade::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Facultade::create($data);

		return Redirect::route('facultades.index');
	}

	/**
	 * Display the specified facultade.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$facultade = Facultade::findOrFail($id);

		return View::make('facultades.show', compact('facultade'));
	}

	/**
	 * Show the form for editing the specified facultade.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$facultade = Facultade::find($id);

		return View::make('facultades.edit', compact('facultade'));
	}

	/**
	 * Update the specified facultade in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$facultade = Facultade::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Facultade::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$facultade->update($data);

		return Redirect::route('facultades.index');
	}

	/**
	 * Remove the specified facultade from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Facultade::destroy($id);

		return Redirect::route('facultades.index');
	}

}
