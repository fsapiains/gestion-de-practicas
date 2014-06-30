<html>
<head>
    <title>Ingresar estudiante</title>
</head>
<body>
<h1>Ingreso de estudiantes</h1>
         {{ Form::open(array('route' => array('estudiantes.store'))) }}
         {{ Form::label('direccion', 'Dirección: ') }}
         {{ Form::text('direccion') }} <br> <br>
         {{ Form::label('telefono', 'Teléfono: ') }}
         {{ Form::text('telefono') }} <br> <br>
         {{ Form::label('carrera_fk', 'Carrera: ') }}
         {{ Form::select('carrera_fk',$carreras) }} <br> <br>
         {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>