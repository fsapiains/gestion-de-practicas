<html>
<head>
    <title>Rubros</title>
</head>
<body>
<ul>
    @foreach($rubros as $rubro)
        <li>{{ $rubro->rubro }}</li>
    @endforeach
</ul>
</body>
</html>