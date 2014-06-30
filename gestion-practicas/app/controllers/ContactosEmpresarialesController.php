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


	  //return Redirect::route('contactos_empresariales.index');
        $arreglo = ContactosEmpresariale::$rules;
        error_log(var_export($arreglo, true));

        $validator = Validator::make($datos=Input::only('email','rut'), $arreglo , ContactosEmpresariale::$messages);

        if ( $validator->fails() ){
       //  echo "invalido";
        return Redirect::to('contactos_empresariales/create')->withErrors($validator);//->with_input();
        }
       else{
          $contactosempresariales= new ContactosEmpresariale();
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
