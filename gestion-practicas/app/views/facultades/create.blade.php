<html>
<head>
    <title>Facultad</title>
</head>
<body>
<h1>Ingreso de facultad</h1>
{{ Form::open(array('route' => array('facultades.store'))) }}
{{ Form::label('nombre', 'Nombre :') }}
{{ Form::text('nombre') }} <br> <br>
{{ Form::label('descripcion', 'Descripcion :') }}
{{ Form::text('descripcion') }} <br> <br>
{{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>