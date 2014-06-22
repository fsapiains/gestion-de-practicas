<html>
<head>
    <title>Contactos empresariales</title>
</head>
<body>
<ul>
    @foreach($contactosempresariales as $contacto)
    <li>{{ $contacto->nombres }} , {{ $contacto->apellidos}} , {{ $contacto->email}}</li>
    @endforeach
</ul>
</body>
</html>