<html>
<head>
    <title>Rubro</title>
</head>
<body>
<h1>Ingreso de rubros</h1>
{{ Form::open(array('route' => array('rubros.store'))) }}
    {{ Form::label('rubro', 'Nombre') }}
    {{ Form::text('rubro') }} <br> <br>
    {{ Form::label('descripcion', 'Descripcion') }}
    {{ Form::text('descripcion') }} <br> <br>
    {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>