<html>
<head>
    <title>Contacto empresa</title>
</head>
<body>
<h1>Ingreso de contacto</h1>
{{ Form::open(array('route' => array('contactos_empresariales.store'))) }}
{{ Form::label('empresa_fk', 'Empresa: ') }}
{{ Form::select('empresa_fk', $empresas) }} <br> <br>
{{ Form::label('nombres', 'Nombres: ') }}
{{ Form::text('nombres') }} <br> <br>
{{ Form::label('apellidos', 'Apellidos: ') }}
{{ Form::text('apellidos') }} <br> <br>
{{ Form::label('rut', 'Rut: ') }}
{{ Form::text('rut') }} <br> <br>
{{ Form::label('telefono', 'Teléfono: ') }}
{{ Form::text('telefono') }} <br> <br>
{{ Form::label('email', 'Email: ') }}
{{ Form::email('email') }} <br> <br>
{{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>