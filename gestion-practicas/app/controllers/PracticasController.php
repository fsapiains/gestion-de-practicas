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
        //función para validar rut
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

           $rutvalidar=Input::get('rut');
           if(validaRut($rutvalidar)==false){

                  $arreglo1 = Practica::$rules1;
                   // error_log(var_export($arreglo, true));
                  error_log(var_export($arreglo1, true));
                  $datos=array(
                    'rut'=>substr(Input::get('rut'),0,-6)
                  );
                  //var_dump($datos);
                  $validator = Validator::make($datos, $arreglo1 , Practica::$messages);

                  if ( $validator->fails() ){
                   // echo "invalido";
                   // var_dump($datos);
                   return Redirect::to('practicas/create')->withErrors($validator);//->with_input();
                  }
           }else{

                $rut = substr(Input::get('rut'),0,-1);
                $estudiantefk = DB::table('estudiantes')->where('rut', '=', $rut )->get(array('pk'));
                // var_dump($estudiantefk[0]->pk);

                $carrerafk = DB::table('estudiantes')->where('rut', '=', $rut )->get(array('carrera_fk'));
                $aprobacion=(float)Input::get('evaluacion');

                $arreglo = Practica::$rules;
                error_log(var_export($arreglo, true));

                $validator = Validator::make($datos=Input::only(/*'fecha','fecha_inicio','fecha_termino'*/'archivo'), $arreglo , Practica::$messages);
                if ( $validator->fails() ){
                        // echo "invalido";
                        return Redirect::to('practicas/create')->withErrors($validator);//->with_input();
                 }
                 else{
                 $practica=new Practica();
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
                 $practica->save();
                  }

        }


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
    public function eliminarPractica()
    {
        return View::make('practicas.eliminar');

    }

	public function destroy()
	{
        $rut=substr(Input::get('rut'),0,-1);
        $estudiantepk=DB::table('estudiantes')->where('rut','=', $rut)->get(array('pk'));
        $practicapk=DB::table('practicas')->where('estudiante_fk', '=', $estudiantepk[0]->pk )->get(array('pk'));
        $practpk=(int)$practicapk;

		Practica::destroy($practpk);

		return Redirect::route('practicas.index');
	}

    public function buscar()
    {
        $keyword=Input::get('keyword');
        $areas_tematicas=AreasTematica::whereRaw('tema LIKE ?',["%$keyword%"])->get();

        foreach($areas_tematicas as $area_tematica)
        {
            var_dump($area_tematica->tema);

        }



    }

    public function buscarPorTema($pk)
    {
       // $pk=Input::get('pk');
        $practicas=DB::table('practicas')->where('areas_tematica_fk',$pk)->get();
        return View::make('practicas.index',array('practicas'=>$practicas));

    }

    /*Ve el detalle de una practica pasandole una pk*/
    public function verDetalle($pk)
    {

        $practica=Practica::find($pk);
        $estudiante=Estudiante::find($practica->estudiante_fk);
        $carrera=Carrera::find($practica->carrera_fk);
        $contacto=ContactosEmpresariale::find($practica->contacto_fk);
        $empresa=Empresa::find($contacto->empresa_fk);
        echo(' Nombre : '.$estudiante->nombres.' '.$estudiante->apellidos.'<br>');
        echo('Carrera : '.$carrera->nombre.'<br>');
        echo('Emoresa : '.$empresa->nombre_real.'<br>');
        echo('Contacto : '.$contacto->nombres.' '.$contacto->apellidos.'<br>');
    }



}
