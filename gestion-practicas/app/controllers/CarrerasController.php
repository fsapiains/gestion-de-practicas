<?php

class CarrerasController extends \BaseController {

	/**
	 * Display a listing of carreras
	 *
	 * @return Response
	 */
	public function index()
	{
		$carreras = Carrera::all();

		return View::make('carreras.index', compact('carreras'));
	}

	/**
	 * Show the form for creating a new carrera
	 *
	 * @return Response
	 */
	public function create()
	{
        $escuelas = Escuela::all();
        $escuelas_select = array();
        foreach($escuelas as $escuela) {
            $escuelas_select[$escuela->pk] = $escuela->nombre;
        }
     /*   $escuelaspk=Escuela::all();
        $escuelaspk_select = array();
        foreach($escuelaspk as $escuela) {
            $escuelaspk_select[$escuela->pk] = $escuela->pk;*/


        return View::make('carreras.create')
            ->with('escuelas', $escuelas_select);
	}

	/**
	 * Store a newly created carrera in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $arreglo = Carrera::$rules;
         error_log(var_export($arreglo, true));

		$validator = Validator::make($data = Input::only('codigo','nombre','escuela_fk'), $arreglo, Carrera::$messages);

		if ($validator->fails())
		{
			return Redirect::to('carreras/create')->withErrors($validator);//->withInput();
		}

		else{
            echo "datos guardados exitosamente";
            Carrera::create($data);
        }
		//return Redirect::route('carreras.index');
	}

	/**
	 * Display the specified carrera.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$carrera = Carrera::findOrFail($id);

		return View::make('carreras.show', compact('carrera'));
	}

	/**
	 * Show the form for editing the specified carrera.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$carrera = Carrera::find($id);

		return View::make('carreras.edit', compact('carrera'));
	}

	/**
	 * Update the specified carrera in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$carrera = Carrera::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Carrera::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$carrera->update($data);

		return Redirect::route('carreras.index');
	}

	/**
	 * Remove the specified carrera from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Carrera::destroy($id);

		return Redirect::route('carreras.index');
	}

}
