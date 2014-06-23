<html>
<head>
    <title>Facultades</title>
</head>
<body>
<ul>
    @foreach($facultades as $facultad)
    <li>{{ $facultad->nombre }} , {{ $facultad->descripcion }} </li>
    @endforeach
</ul>
</body>
</html>