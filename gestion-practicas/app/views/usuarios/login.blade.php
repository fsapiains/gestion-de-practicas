<html>
<head>
    <title>Login</title>
</head>
<body>
<h1>Este es el login</h1>
{{ Form::open(array('route' => array('user.hacer_login'))) }}
{{ Form::label('rut','Rut(Sin puntos ni guión): ') }}
{{ Form::text('rut') }} <br> <br>
{{ Form::label('contrasena','Contraseña: ') }}
{{ Form::password('contrasena') }} <br> <br>
<input type="submit" />

{{ Form::close() }}

</body>
</html>