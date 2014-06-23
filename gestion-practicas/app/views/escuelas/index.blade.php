<html>
<head>
    <title>Escuela</title>
</head>
<body>
<ul>
    @foreach($escuelas as $escuela)
    <li>{{ $escuela->nombre }} , {{ $escuela->descripcion}} </li>
    @endforeach


</ul>
</body>
</html>