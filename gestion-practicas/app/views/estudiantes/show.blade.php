<html>
<head>
    <title>Estudiantes</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>Nombre</td>
        <td>Carrera</td>
        <td>Estado</td>
        <td>Practica</td>
    </tr>
    </thead>
    <tbody>
    @foreach($estudiantes as $estudiante)
    <tr>
        <td>{{ $estudiante->nombres . ' ' . $estudiante->apellidos }}</td>
        <td>{{ $estudiante->carrera->nombre }}</td>
        <td>{{ $estudiante->estado }}</td>
        <td>
            <ul>
                @foreach($estudiante->practicas as $practica)
                <li>{{ HTML::linkRoute('practicas.show', $practica->contacto->empresa->nombre_fantasia, array($practica->pk)) }}</li>
                @endforeach
            </ul>

        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>