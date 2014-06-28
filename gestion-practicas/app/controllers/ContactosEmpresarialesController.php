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

	  //return Redirect::route('contactos_empresariales.index');
        $arreglo = ContactosEmpresariale::$rules;
        $arreglo1 = ContactosEmpresariale::$rules1;
       // error_log(var_export($arreglo, true));
        $rutvalidar=Input::get('rut');
        if(validaRut($rutvalidar)==false){
           // return Redirect::to('contactos_empresariales/create')->withFails('el rut no es válido');
           error_log(var_export($arreglo, true));
           $datos=array(
               'email'=>Input::get('email'),
               'rut'=>substr(Input::get('rut'),0,-6)
           );
           //var_dump($datos);
           $validator = Validator::make($datos, $arreglo , ContactosEmpresariale::$messages);

           if ( $validator->fails() ){
           // echo "invalido";
             // var_dump($datos);
              return Redirect::to('contactos_empresariales/create')->withErrors($validator);//->with_input();

           }
        }else{

            error_log(var_export($arreglo1, true));

            $validator = Validator::make($datos=Input::only('email'), $arreglo1 , ContactosEmpresariale::$messages);

            if ( $validator->fails() ){
               //  echo "invalido";
             return Redirect::to('contactos_empresariales/create')->withErrors($validator);//->with_input();
            }
            else{
          /*  $contactosempresariales= new ContactosEmpresariale();
            $contactosempresariales->empresa_fk=Input::get('empresa_fk');
            $contactosempresariales->rut=substr(Input::get('rut'),0,-2);
            $contactosempresariales->nombres=Input::get('nombres');
            $contactosempresariales->apellidos=Input::get('apellidos');
            $contactosempresariales->telefono=Input::get('telefono');
            $contactosempresariales->email=Input::get('email');
            $contactosempresariales->save();
           // return Redirect::to('register');//->with('mensaje','¡Usuario registrado correctamente!.');*/
             echo "contacto registrado correctamente!";
           //boton de volver al inicio redirect::to blabla
            }

       }
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
	/*	$contactosempresariale = Contactosempresariale::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Contactosempresariale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$contactosempresariale->update($data);

		return Redirect::route('contactos_empresariales.index');*/
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
