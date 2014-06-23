<html>
<head>
    <title>Departamentos</title>
</head>
<body>
<h1>Ingreso de departamento</h1>
      {{ Form::open(array('route' => array('departamentos.store'))) }}
      {{ Form::label('facultad_fk', 'Facultad: ') }}
      {{ Form::select('facultad_fk', $facultades) }} <br> <br>
      {{ Form::label('nombre', 'Nombre departamento: ') }}
      {{ Form::text('nombre') }} <br> <br>
      {{ Form::label('descripcion', 'Descripcion: ') }}
      {{ Form::text('descripcion') }} <br> <br>
      {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>