<?php

class EstudiantesController extends \BaseController {

	/**
	 * Display a listing of estudiantes
	 *
	 * @return Response
	 */
	public function index()
	{
		$estudiantes = Estudiante::all();

		return View::make('estudiantes.index', compact('estudiantes'));
	}

	/**
	 * Show the form for creating a new estudiante
	 *
	 * @return Response
	 */
	public function create()
	{
        $carreras = Carrera::all();
        $carreras_select = array();
        foreach($carreras as $carrera) {
            $carreras_select[$carrera->pk] = $carrera->nombre;
        }

        return View::make('estudiantes.create')
            ->with('carreras', $carreras_select);
	}

	/**
	 * Store a newly created estudiante in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk'), Estudiante::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Estudiante::create($data);

		return Redirect::route('estudiantes.index');
	}

	/**
	 * Display the specified estudiante.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$estudiante = Estudiante::findOrFail($id);

		return View::make('estudiantes.show', compact('estudiante'));
	}

	/**
	 * Show the form for editing the specified estudiante.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$estudiante = Estudiante::find($id);

		return View::make('estudiantes.edit', compact('estudiante'));
	}

	/**
	 * Update the specified estudiante in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$estudiante = Estudiante::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Estudiante::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$estudiante->update($data);

		return Redirect::route('estudiantes.index');
	}

	/**
	 * Remove the specified estudiante from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Estudiante::destroy($id);

		return Redirect::route('estudiantes.index');
	}

}
