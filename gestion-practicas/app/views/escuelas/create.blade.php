<html>
<head>
    <title>Escuelas</title>
</head>
<body>
<h1>Ingreso de escuela</h1>
{{ Form::open(array('route' => array('escuelas.store'))) }}
{{ Form::label('departamento_fk', 'Departamento: ') }}
{{ Form::select('departamento_fk', $departamentos) }} <br> <br>
{{ Form::label('nombre', 'Nombre escuela: ') }}
{{ Form::text('nombre') }} <br> <br>
{{ Form::label('descripcion', 'Descripcion: ') }}
{{ Form::text('descripcion') }} <br> <br>
{{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>