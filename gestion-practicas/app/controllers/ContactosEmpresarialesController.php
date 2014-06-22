<?php

class ContactosEmpresarialesController extends \BaseController {

	/**
	 * Display a listing of contactosempresariales
	 *
	 * @return Response
	 */
	public function index()
	{
		$contactosempresariales = Contactosempresariale::all();

		return View::make('contactos_empresariales.index', compact('contactosempresariales'));
	}

	/**
	 * Show the form for creating a new contactosempresariale
	 *
	 * @return Response
	 */
	public function create()
	{

        $empresas = empresa::all();
        $empresas_select = array();
        foreach($empresas as $empresa) {
            $empresas_select[$empresa->pk] = $empresa->nombre_real;
        }

        return View::make('contactos_empresariales.create')
            ->with('empresas', $empresas_select);
	}

	/**
	 * Store a newly created contactosempresariale in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('empresa_fk','nombres','apellidos','rut','telefono','email'), ContactosEmpresariale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        ContactosEmpresariale::create($data);

		return Redirect::route('contactos_empresariales.index');
	}

	/**
	 * Display the specified contactosempresariale.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$contactosempresariale = Contactosempresariale::findOrFail($id);

		return View::make('contactos_empresariales.show', compact('contactosempresariale'));
	}

	/**
	 * Show the form for editing the specified contactosempresariale.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contactosempresariale = Contactosempresariale::find($id);

		return View::make('contactos_empresariales.edit', compact('contactosempresariale'));
	}

	/**
	 * Update the specified contactosempresariale in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$contactosempresariale = Contactosempresariale::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contactosempresariale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contactosempresariale->update($data);

		return Redirect::route('contactos_empresariales.index');
	}

	/**
	 * Remove the specified contactosempresariale from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Contactosempresariale::destroy($id);

		return Redirect::route('contactos_empresariales.index');
	}

}
