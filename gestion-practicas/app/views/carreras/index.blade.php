<html>
<head>
    <title>Carrera</title>
</head>
<body>
<ul>
    @foreach($carreras as $carrera)
    <li>{{ $carrera->nombre }} , {{ $carrera->codigo}}, {{ $carrera->escuela_fk}} </li>
    @endforeach


</ul>
</body>
</html>