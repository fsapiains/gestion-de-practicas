<html>
<head>
    <title>Ingresar empresa</title>
</head>
<body>
<h1>Ingreso de empresas</h1>
{{ Form::open(array('route' => array('empresas.store'))) }}
    {{ Form::label('rut', 'Rut(Sin puntos ni guión): ') }}
    {{ Form::text('rut') }} <br> <br>
    {{ Form::label('nombre_real', 'Nombre real: ') }}
    {{ Form::text('nombre_real') }} <br> <br>
    {{ Form::label('nombre_fantasia', 'Nombre fantasía: ') }}
    {{ Form::text('nombre_fantasia') }} <br> <br>
    {{ Form::label('direccion', 'Dirección: ') }}
    {{ Form::text('direccion') }} <br> <br>
    {{ Form::label('rubro_fk', 'Rubro: ') }}
    {{ Form::select('rubro_fk', $rubros) }} <br> <br>
    {{ Form::label('telefono', 'Teléfono: ') }}
    {{ Form::text('telefono') }} <br> <br>
    {{ Form::label('email', 'Email: ') }}
    {{ Form::email('email') }} <br> <br>
    {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>