<html>
<head>
    <title>Rol</title>
</head>
<body>
<ul>
    @foreach($roles as $rol)
    <li>{{ $rol->descripcion }}</li>
    @endforeach
</ul>
</body>
</html>