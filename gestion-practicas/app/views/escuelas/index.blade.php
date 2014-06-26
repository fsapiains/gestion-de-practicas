<html>
<head>
    <title>Escuela</title>
</head>
<body>
<ul>
    @foreach($escuelas as $escuela)
    <li>{{ $escuela->nombre }} , {{ $escuela->descripcion}} {{ $escuela->departamento_fk}} </li>
    @endforeach


</ul>
</body>
</html>