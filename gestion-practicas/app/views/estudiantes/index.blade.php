<html>
<head>
    <title>Estudiante</title>
</head>
<body>
{{Form::open(array('url'=>'/estudiantes.buscar'))}}
    {{Form::text('keyword',null,array('placeholder'=>'buscar por nombre')) }}
    {{Form::submit('Buscar')}}



<ul>
    @foreach($estudiantes as $estudiante)
    <li>{{ $estudiante->nombres}} {{ $estudiante->apellidos}} , teléfono: {{ $estudiante->codigoCarrera}}</li>
    @endforeach
</ul>
</body>
</html>