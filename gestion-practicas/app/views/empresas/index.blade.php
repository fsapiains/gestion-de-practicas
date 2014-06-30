<html>
<head>
    <title>Empresa</title>
</head>
<body>
<ul>
    @foreach($empresas as $empresa)
    <li>{{ $empresa->nombre_fantasia }}</li>
    @endforeach
</ul>
</body>
</html>