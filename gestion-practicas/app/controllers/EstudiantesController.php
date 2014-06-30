<?php

class EstudiantesController extends \BaseController
{

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
        foreach ($carreras as $carrera) {
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

        $rut = substr(Session::get('rut'), 0, -1);
        $estudiante = Estudiante::where('rut', '=', $rut)->first();

        if ($estudiante) {
            return Redirect::route('estudiantes.show', array($estudiante->pk));
        } else {
            $rut1 = Session::get('rut');
            //obtener la ficha del estudiante desde el rest
            $url = "https://146.83.181.139/saap-rest/api/fichaEstudiante/$rut1";

            $opciones = array(
                'http' => array(
                    'header' => "Authorization: Basic " . base64_encode("11.111.111-1:745948b275f6212ee233f52679d4ba1ea87b0dac")
                )
            );
            $contexto = stream_context_create($opciones);

            $objeto = json_decode(file_get_contents($url, false, $contexto));

            $validator = Validator::make($datos = Input::only('telefono'), Estudiante::$rules, Estudiante::$messages);

            if ($validator->fails()) {
                echo "el telefono es invalido";
            } else {

                // Ingresar datos del estudiante a la db
                $estudiante = new Estudiante;
                $estudiante->rut = (int)$rut;
                $estudiante->nombres = $objeto->nombres;
                $estudiante->apellidos = $objeto->apellidos;
                $estudiante->fecha_nacimiento = $objeto->fechaNacimiento;
                if ($gen = $objeto->genero == 'M') $estudiante->genero = 1;
                else $estudiante->genero = 0;
                $estudiante->email = $objeto->email;
                $estudiante->estado = $objeto->estado;
                $estudiante->direccion = Input::get('direccion');
                $estudiante->telefono = Input::get('telefono');
                $estudiante->carrera_fk = Input::get('carrera_fk');
                $estudiante->save();
            }
        }
    }

    /* $datos = Input::only('direccion','telefono');

      Estudiante::create($datos);

      return Redirect::route('estudiantes.index');

      /*$validator = Validator::make($data = Input::only('rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk'), Estudiante::$rules);

      if ($validator->fails())
      {
          return Redirect::back()->withErrors($validator)->withInput();
      }

      Estudiante::create($data);

      return Redirect::route('estudiantes.index'); */


    /**
     * Display the specified estudiante.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        return View::make('estudiantes.show')->with('estudiante', $estudiante);
    }

    /**
     * Show the form for editing the specified estudiante.
     *
     * @param  int $id
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
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $estudiante = Estudiante::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Estudiante::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $estudiante->update($data);

        return Redirect::route('estudiantes.index');
    }

    /**
     * Remove the specified estudiante from storage.
     *
     * @param  int $id
     * @return Response
     */

    public function destroy($id)
    {
        Estudiante::destroy($id);

        return Redirect::route('estudiantes.index');
    }

    /*Funcion para buscar estudiante por rut*/

    public function buscar()
    {
        $keyword = Input::get('keyword');
        $by_name = Estudiante::where('nombres', 'LIKE', '%' . $keyword . '%')->get();
        $by_last_name = Estudiante::where('apellidos', 'LIKE', '%' . $keyword . '%')->get();
        $estudiantes = $by_name->merge($by_last_name);

        // TODO: Retornar una vista pasandole el parametro estudiantes

        foreach ($estudiantes as $estudiante) {
            var_dump($estudiante->nombres);
        }
    }


}
