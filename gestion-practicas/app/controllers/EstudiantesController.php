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
        $rut = Input::get('rut');

        $url = "https://146.83.181.139/saap-rest/api/fichaEstudiante/$rut";

        $opciones = array(
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
            )
        );
        $contexto = stream_context_create($opciones);

        $objeto = json_decode(file_get_contents($url, false, $contexto));

       // var_dump($objeto);

        //$data=array($objeto->nombres,$objeto->apellidos,$objeto->fechaNacimiento,$objeto->genero,$objeto->email,$objeto->estado,$objeto->codigoCarrera);



        function validaRut($rut){
            if(strpos($rut,"-")==false){
                $RUT[0] = substr($rut, 0, -1);
                $RUT[1] = substr($rut, -1);
            }else{
                $RUT = explode("-", trim($rut));
            }
            $elRut = str_replace(".", "", trim($RUT[0]));
            $factor = 2;
            $suma=0;
            for($i = strlen($elRut)-1; $i >= 0; $i--){
                $factor = $factor > 7 ? 2 : $factor;
                $suma+=$elRut{$i}*$factor++;
            }
            $resto = $suma % 11;
            $dv = 11 - $resto;
            if($dv == 11){
                $dv=0;
            }else if($dv == 10){
                $dv="k";
            }else{
                $dv=$dv;
            }
            if($dv == trim(strtolower($RUT[1]))){
                return true;
            }else{
                return false;
            }
        }
      /*  function validatelefono($telefono){
        $datos = array(Input::get('telefono'));
        $validaciones = array( 'telefono' => array('required', 'regex:^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$ '));

        $validator = Validator::make($datos, $validaciones);

        if ( $validator->fails() ){
            echo "invalido";
        }else{
            echo "valido";
        }
        }*/
       // }
      // $telefonovalidar=Input::get('telefono');
      $rutvalidar=Input::get('rut');
      if(validaRut($rutvalidar)==true){// && validatelefono($telefonovalidar)==true){

          echo "El rut ".$rutvalidar." es valido";
        // echo "el telefono tambien";

         $estudiante=new Estudiante;

        $estudiante->nombres=$objeto->nombres;
        $estudiante->apellidos=$objeto->apellidos;
        $estudiante->fecha_nacimiento=$objeto->fechaNacimiento;
        if($gen=$objeto->genero=='M')$estudiante->genero=1;
        else $estudiante->genero=0;

          $estudiante->email=$objeto->email;
          $estudiante->estado=$objeto->estado;

          $estudiante->direccion=Input::get('direccion');
          $estudiante->rut=substr(Input::get('rut'),0,-2);

          $estudiante->telefono=Input::get('telefono');
          $estudiante->carrera_fk=Input::get('carrera_fk');
          $estudiante->save();


          //  else echo "el telefono es invalido";

      }
          else echo "El rut ".$rutvalidar." no es correcto";


      // $datos = Input::only('direccion','telefono');

       // Estudiante::create($datos);

       // return Redirect::route('estudiantes.index');

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
