<?php

class EmpresasController extends \BaseController {

	/**
	 * Display a listing of empresas
	 *
	 * @return Response
	 */
	public function index()
	{
		$empresas = Empresa::all();

		return View::make('empresas.index', compact('empresas'));
	}

	/**
	 * Show the form for creating a new empresa
	 *
	 * @return Response
	 */
	public function create()
	{
        $rubros = Rubro::all();
        $rubros_select = array();
        foreach($rubros as $rubro) {
            $rubros_select[$rubro->pk] = $rubro->rubro;
        }

		return View::make('empresas.create')
            ->with('rubros', $rubros_select);

	}

	/**
	 * Store a newly created empresa in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $arreglo = Empresa::$rules;
        error_log(var_export($arreglo, true));
		$validator = Validator::make($data = Input::only('rut', 'nombre_real','nombre_fantasia','direccion','rubro_fk','telefono','email'), $arreglo, Empresa::$messages);

		if ($validator->fails())
		{
            return Redirect::to('carreras/create')->withErrors($validator);
		}
        else{

		Empresa::create($data);
        }
		//return Redirect::route('empresas.index');
	}

	/**
	 * Display the specified empresa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$empresa = Empresa::findOrFail($id);

		return View::make('empresas.show', compact('empresa'));
	}

	/**
	 * Show the form for editing the specified empresa.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$empresa = Empresa::find($id);

		return View::make('empresas.edit', compact('empresa'));
	}

	/**
	 * Update the specified empresa in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$empresa = Empresa::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Empresa::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$empresa->update($data);

		return Redirect::route('empresas.index');
	}

	/**
	 * Remove the specified empresa from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Empresa::destroy($id);

		return Redirect::route('empresas.index');
	}

}
