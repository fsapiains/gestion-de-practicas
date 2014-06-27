<html>
<head>
    <title>Areas temáticas</title>
</head>
<body>
<ul>
    @foreach($areastematicas as $area)
    <li>{{ $area->tema }}</li>
    @endforeach
</ul>
</body>
</html>