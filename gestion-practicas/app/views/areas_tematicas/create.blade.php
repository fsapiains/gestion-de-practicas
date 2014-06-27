<html>
<head>
    <title>Areas temáticas</title>
</head>
<body>
<h1>Ingreso de areas temáticas</h1>
{{ Form::open(array('route' => array('areas_tematicas.store'))) }}
{{ Form::label('tema', 'Tema: ') }}
{{ Form::text('tema') }} <br> <br>
{{ Form::label('descripcion', 'Descripcion: ') }}
{{ Form::text('descripcion') }} <br> <br>
{{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>