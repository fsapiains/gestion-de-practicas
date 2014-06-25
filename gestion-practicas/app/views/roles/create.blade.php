<html>
<head>
    <title>Roles</title>
</head>
<body>
<h1>Ingreso de roles</h1>

{{ Form::open(array('route' => array('roles.store'))) }}
{{ Form::label('rut', 'Rut: ') }}
{{ Form::text('rut') }} <br> <br>
{{ Form::label('descripcion', 'Descripcion: ') }}
{{ Form::text('descripcion') }} <br> <br>
{{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>