<html>
<head>
    <title>Estudiante</title>
</head>
<body>
<ul>
    @foreach($estudiantes as $estudiante)
    <li>{{ $estudiante->nombres}} {{ $estudiante->apellidos}} , teléfono: {{ $estudiante->telefono}}</li>
    @endforeach
</ul>
</body>
</html>