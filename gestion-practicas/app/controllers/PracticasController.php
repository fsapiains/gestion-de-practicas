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
       /* $carreras = Carrera::all();
        $carreras_select = array();
        foreach($carreras as $carrera) {
            $carreras_select[$carrera->pk] = $carrera->nombre;
        }*/
        $contactosempresariales = ContactosEmpresariale::all();
        $contactos_select = array();
        foreach($contactosempresariales as $contacto) {
            $contactos_select[$contacto->pk] = $contacto->email;
        }
        $areastematicas = AreasTematica::all();
        $areastematicas_select = array();
        foreach($areastematicas as $areas) {
            $areastematicas_select[$areas->pk] = $areas->tema;
        }

      /*  $estudiantes = Estudiante::all();
        $estudiantes_select = array();
        foreach($estudiantes as $estudiante) {
            $estudiantes_select[$estudiante->pk] = $estudiante->apellidos;
        }*/

        $evaluacion_select=array('ninguno','aprobado','reprobado');



        return View::make('practicas.create', compact('contactos_select', 'evaluacion_select','areastematicas_select'));
	}

	/**
	 * Store a newly created practica in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rut = substr(Input::get('rut'),0,-1);
        $estudiantefk = DB::table('estudiantes')->where('rut', '=', $rut )->get(array('pk'));
      // var_dump($estudiantefk[0]->pk);

       $carrerafk = DB::table('estudiantes')->where('rut', '=', $rut )->get(array('carrera_fk'));
       $aprobacion=(float)Input::get('evaluacion');

       $arreglo = Practica::$rules;
       error_log(var_export($arreglo, true));
       $validator = Validator::make($datos=Input::only('fecha','fecha_inicio','fecha_termino','archivo'), $arreglo , Practica::$messages);
        if ( $validator->fails() ){
            // echo "invalido";
            return Redirect::to('practicas/create')->withErrors($validator);//->with_input();
        }
        else{ echo "ingresado correctamente";
     /*   $practica=new Practica();
        $practica->carrera_fk=$carrerafk[0]->carrera_fk;
        $practica->contacto_fk=Input::get('contacto_fk');
        $practica->estudiante_fk=$estudiantefk[0]->pk;
        $practica->areas_tematica_fk=Input::get('areas_tematica_fk');
        $practica->fecha=Input::get('fecha');
        $practica->fecha_inicio=Input::get('fecha_inicio');
        $practica->fecha_termino=Input::get('fecha_termino');
        $practica->horas=Input::get('horas');
        $practica->evaluacion=$aprobacion;
        $archivo=Input::file('archivo');
        $destination='public/uploads';
        $filename=$archivo->getClientOriginalName();
        $uploadSuccess=$archivo->move($destination,$filename);
          /*  if ($uploadSuccess){
                echo "se subio el archivo";
            }
            else{ echo"error: el archivo no se cargó correctamente ";
            }*/
        }

      /*  if ($uploadSuccess){
            echo "se subio el archivo";
        }
        else{ echo"cagamos u.u ";
        }*/

       // $practica->archivo= Input::file('archivo')->move('uploads');

    /*    $practica->save();
	/*	$validator = Validator::make($data = Input::only('carrera_fk','contacto_fk','estudiante_fk','fecha','fecha_imicio','fecha_termino','horas','evaluacion','archivo'), Practica::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Practica::create($data);

		return Redirect::route('practicas.index');*/
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
