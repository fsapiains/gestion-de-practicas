<html>
<head>
    <title>Ingresar estudiante</title>
</head>
<body>
<h1>Ingreso de estudiantes</h1>
         {{ Form::open(array('route' => array('estudiantes.store'))) }}
         {{ Form::label('rut', 'Rut: ') }}
         {{ Form::text('rut') }} <br> <br>
         {{ Form::label('nombres', 'Nombres: ') }}
         {{ Form::text('nombres') }} <br> <br>
         {{ Form::label('apellidos', 'Apellidos: ') }}
         {{ Form::text('apellidos') }} <br> <br>
         {{ Form::label('fecha_nacimiento', 'Fecha de nacimiento: ') }}
         {{ Form::text('fecha_nacimiento') }} <br> <br>
         {{ Form::label('genero', 'Género: ') }}
         {{ Form::text('genero') }} <br> <br>
         {{ Form::label('direccion', 'Dirección: ') }}
         {{ Form::text('direccion') }} <br> <br>
         {{ Form::label('telefono', 'Teléfono: ') }}
         {{ Form::text('telefono') }} <br> <br>
         {{ Form::label('email', 'Email: ') }}
         {{ Form::email('email') }} <br> <br>
         {{ Form::label('estado', 'Estado: ') }}
         {{ Form::text('estado') }} <br> <br>
         {{ Form::label('carrera_fk', 'Carrera: ') }}
         {{ Form::select('carrera_fk', $carreras) }} <br> <br>
         {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>