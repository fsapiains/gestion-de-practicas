<html>
<head>
    <title>Práctica</title>
</head>
<body>
<ul>
    @foreach($practicas as $practica)
    <li>{{ $practica->estudiante}} , {{ $practica->fecha_inicio}} , {{ $practica->horas}}</li>
    @endforeach
</ul>
</body>
</html>