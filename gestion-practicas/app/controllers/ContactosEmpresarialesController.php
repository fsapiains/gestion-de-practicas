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
        $rutvalidar=Input::get('rut');
        if(validaRut($rutvalidar)==true){

            echo "El rut ".$rutvalidar." es valido";

		/*$validator = Validator::make($data = Input::only('empresa_fk','nombres','apellidos','telefono','email'), ContactosEmpresariale::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

        ContactosEmpresariale::create($data);

            $ContactosEmpresariale->rut=substr(Input::get('rut'),0,-2);

		return Redirect::route('contactos_empresariales.index');*/
            $contactosempresariales= new ContactosEmpresariale();
            $contactosempresariales->empresa_fk=Input::get('empresa_fk');
            $contactosempresariales->rut=substr(Input::get('rut'),0,-2);
            $contactosempresariales->nombres=Input::get('nombres');
            $contactosempresariales->apellidos=Input::get('apellidos');
            $contactosempresariales->telefono=Input::get('telefono');
            $contactosempresariales->email=Input::get('email');
            $contactosempresariales->save();

        }else{
            echo "El rut ".$rutvalidar." no es correcto";
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
