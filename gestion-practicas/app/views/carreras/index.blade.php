<html>
<head>
    <title>Carrera</title>
</head>
<body>
<ul>
    @foreach($carreras as $carrera)
    <li>{{ $carrera->nombre }} , {{ $carrera->codigo}} </li>
    @endforeach


</ul>
</body>
</html>