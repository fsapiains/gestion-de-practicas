<html>
<head>
    <title>Estudiante</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>Nombre Estudiante</td>
        <td>Carrera</td>
        <td>Fecha Inicio</td>
        <td>Horas de practica</td>
    </tr>
    </thead>
    <tbody>

    <tr>
        <td>{{ $practica->estudiante->nombres }}</td>
        <td>{{ $practica->estudiante->carrera->nombre }}</td>
        <td>{{ $practica->fecha_inicio}}</td>
        <td>{{ $practica->horas}}</td>
    </tr>

    </tbody>
</table>
</body>
</html>