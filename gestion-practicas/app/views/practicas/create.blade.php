<html>
<head>
    <title>Ingresar practicas</title>
</head>
<body>
<h1>Ingreso de practica</h1>
      {{ Form::open(array('route' => array('practicas.store'))) }}
      {{ Form::label('carrera_fk', 'Carrera: ') }}
      {{ Form::select('carrera_fk',$carreras_select) }} <br> <br>
      {{ Form::label('contacto_fk', 'Contacto: ') }}
      {{ Form::select('contacto_fk',$contactos_select) }} <br> <br>
      {{ Form::label('estudiante_fk', 'Estudiante: ') }}
      {{ Form::select('estudiante_fk',$estudiantes_select) }} <br> <br>
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
      {{ Form::submit('Enviar') }}
{{ Form::close() }}

</body>
</html>