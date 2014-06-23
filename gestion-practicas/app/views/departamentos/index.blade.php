<html>
<head>
    <title>Departamento</title>
</head>
<body>
<ul>
    @foreach($departamentos as $depto)
    <li>{{ $depto->nombre }} , {{ $depto->descripcion}} , {{ $depto->facultad_fk}} </li>
    @endforeach


</ul>
</body>
</html>