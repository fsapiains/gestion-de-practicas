<html>
<head>
    <title>Nuevo usuario</title>
</head>
<body>
<h1>Crear usuario</h1>
{{ Form::open(array('route' => array('usuarios.store'))) }}
{{ Form::label('rut','Rut: ') }}
{{ Form::text('rut') }} <br> <br>
{{ Form::label('password','Contraseña: ') }}
{{ Form::password('password') }} <br> <br>
<input type="submit" />

{{ Form::close() }}

</body>
</html>