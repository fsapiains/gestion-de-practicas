<html>
<head>
    <title>Ingresar practicas</title>
</head>
<body>
<h1>Ingreso de practica</h1>
      {{ Form::open(array('route' => array('practicas.store'))) }}
      {{ Form::label('rut', 'Rut estudiante(sin puntos ni guión): ') }}
      {{ Form::text('rut') }} <br> <br>
      {{ Form::label('contacto_fk', 'Contacto: ') }}
      {{ Form::select('contacto_fk',$contactos_select) }} <br> <br>
      {{ Form::label('areas_tematica_fk', 'Area temática: ') }}
      {{ Form::select('areas_tematica_fk',$areastematicas_select) }} <br> <br>
      {{ Form::label('fecha', 'Fecha: ') }}
      {{ Form::text('fecha') }} <br> <br>
      {{ Form::label('fecha_inicio', 'Fecha Inicio: ') }}
      {{ Form::text('fecha_inicio') }} <br> <br>
      {{ Form::label('fecha_termino', 'Fecha Término: ') }}
      {{ Form::text('fecha_termino') }} <br> <br>
      {{ Form::label('horas', 'Horas: ') }}
      {{ Form::text('horas') }} <br> <br>
      {{ Form::label('evaluacion' , 'Evaluacion: ') }}
      {{ Form::select('evaluacion',$evaluacion_select) }} <br> <br>
      {{ Form::label('archivo' , 'Archivo: ') }}
      {{ Form::file('archivo') }} <br> <br>
      {{ Form::open(array('url'=>'public/uploads','files'=> true))}}
      {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>