<html>
<head>
    <title>Empresa</title>
</head>
<body>
<ul>
    @foreach($empresas as $empresa)
    <li>{{ $empresa->nombre_real }} , {{ $empresa->direccion}} , {{ $empresa->telefono}}</li>
    @endforeach
</ul>
</body>
</html>