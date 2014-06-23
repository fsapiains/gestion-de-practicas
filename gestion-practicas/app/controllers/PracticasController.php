<?php

class PracticasController extends \BaseController {

	/**
	 * Display a listing of practicas
	 *
	 * @return Response
	 */
	public function index()
	{
		$practicas = Practica::all();

		return View::make('practicas.index', compact('practicas'));
	}

	/**
	 * Show the form for creating a new practica
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
        $contactosempresariales = ContactosEmpresariale::all();
        $contactos_select = array();
        foreach($contactosempresariales as $contacto) {
            $contactos_select[$contacto->pk] = $contacto->email;
        }

        $estudiantes = Estudiante::all();
        $estudiantes_select = array();
        foreach($estudiantes as $estudiante) {
            $estudiantes_select[$estudiante->pk] = $estudiante->apellidos;
        }

        $evaluacion_select=array('aprobado','reprobado');


        return View::make('practicas.create', compact('carreras_select' ,'estudiantes_select','contactos_select', 'evaluacion_select'));
	}

	/**
	 * Store a newly created practica in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::only('carrera_fk','contacto_fk','estudiante_fk','fecha','fecha_imicio','fecha_termino','horas','evaluacion','archivo'), Practica::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Practica::create($data);

		return Redirect::route('practicas.index');
	}

	/**
	 * Display the specified practica.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$practica = Practica::findOrFail($id);

		return View::make('practicas.show', compact('practica'));
	}

	/**
	 * Show the form for editing the specified practica.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$practica = Practica::find($id);

		return View::make('practicas.edit', compact('practica'));
	}

	/**
	 * Update the specified practica in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$practica = Practica::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Practica::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$practica->update($data);

		return Redirect::route('practicas.index');
	}

	/**
	 * Remove the specified practica from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Practica::destroy($id);

		return Redirect::route('practicas.index');
	}

}
