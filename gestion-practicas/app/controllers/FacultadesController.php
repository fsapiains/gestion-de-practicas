<?php

class FacultadesController extends \BaseController {

	/**
	 * Display a listing of facultades
	 *
	 * @return Response
	 */
	public function index()
	{
		$facultades = Facultade::all();

		return View::make('facultades.index', compact('facultades'));
	}

	/**
	 * Show the form for creating a new facultade
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('facultades.create');
	}

	/**
	 * Store a newly created facultade in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $url = "https://146.83.181.139/saap-rest/api/departamentos";

        $opciones = array(
            'http' => array(
                'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
            )
        );
        $contexto = stream_context_create($opciones);

        $objeto = json_decode(file_get_contents($url, false, $contexto));

       //var_dump($objeto);
       // var_dump($objeto[0]->facultad->id);
       // var_dump($facul->facultad);



      //  var_dump($objeto[0]->descripcion);


        $facultades = new Facultade();
        $facultades->nombre = $objeto[16]->facultad->facultad;
        $facultades->descripcion= $objeto[16]->facultad->descripcion;
        $facultades->pk=$objeto[16]->facultad->id;
        $facultades->save();
        /*
		$validator = Validator::make($data = Input::only('nombre' , 'descripcion'), Facultade::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		Facultade::create($data);

		return Redirect::route('facultades.index');


        $facultad=Input::get('Nombre');
*/

	}

	/**
	 * Display the specified facultade.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$facultade = Facultade::findOrFail($id);

		return View::make('facultades.show', compact('facultade'));
	}

	/**
	 * Show the form for editing the specified facultade.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$facultade = Facultade::find($id);

		return View::make('facultades.edit', compact('facultade'));
	}

	/**
	 * Update the specified facultade in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$facultade = Facultade::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Facultade::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$facultade->update($data);

		return Redirect::route('facultades.index');
	}

	/**
	 * Remove the specified facultade from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Facultade::destroy($id);

		return Redirect::route('facultades.index');
	}

}
