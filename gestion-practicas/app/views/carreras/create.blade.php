<html>
<head>
    <title>Carreras</title>
</head>
<body>
<h1>Ingreso de carrera</h1>
{{ Form::open(array('route' => array('carreras.store'))) }}
{{ Form::label('codigo', 'Codigo: ') }}
{{ Form::text('codigo') }} <br> <br>
{{ Form::label('nombre', 'Nombre: ') }}
{{ Form::text('nombre') }} <br> <br>
{{ Form::label('escuela_fk', 'Escuela: ') }}
{{ Form::select('escuela_fk', $escuelas) }} <br> <br>
{{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>