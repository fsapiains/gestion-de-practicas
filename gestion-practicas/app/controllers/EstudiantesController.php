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
       /* $carreras = Carrera::all();
        $carreras_select = array();
        foreach($carreras as $carrera) {
            $carreras_select[$carrera->pk] = $carrera->nombre;
        }

      */  return View::make('estudiantes.create');
         //   ->with('carreras', $carreras_select);
	}



	/**
	 * Store a newly created estudiante in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $rut = Input::get('rut');

        $url = "https://146.83.181.139/saap-rest/api/fichaEstudiante/$rut";

        $opciones = array(
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
            )
        );
        $contexto = stream_context_create($opciones);

        $objeto = json_decode(file_get_contents($url, false, $contexto));

        //$data=array($objeto->nombres,$objeto->apellidos,$objeto->fechaNacimiento,$objeto->genero,$objeto->email,$objeto->estado,$objeto->codigoCarrera);





// SELECT 'pk' from Carreras where codigo='cod_carrera'
        $n=new Estudiante;
        //buscar codigo carrera en objeto rest
        $codigo=$objeto->codigoCarrera;

        $n->nombres=$objeto->nombres;
        $n->apellidos=$objeto->apellidos;
        $n->fecha_nacimiento=$objeto->fechaNacimiento;
        if($gen=$objeto->genero=='M')$n->genero=1;
        else $n->genero=0;

        $n->email=$objeto->email;
        $n->estado=$objeto->estado;

        $carrera = DB::table('carreras')->where('codigo', '=', '21041')->get(array('pk'));
        $codigocarrera = ($carrera->pk);

       // $codigocarrera=DB::query('select pk from carreras where  codigo=$codigo');
       // $n->$carrera_fk->$codigocarrera;
        var_dump($codigocarrera);

        $n->direccion=Input::get('direccion');
        $n->rut=substr(Input::get('rut'),0,-2);

        $n->telefono=Input::get('telefono');
        $n->save();


       // $datos = Input::only('rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk');

      //  Estudiante::create($datos);

        return Redirect::route('estudiantes.index');

		/*$validator = Validator::make($data = Input::only('rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk'), Estudiante::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Estudiante::create($data);

		return Redirect::route('estudiantes.index'); */
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
