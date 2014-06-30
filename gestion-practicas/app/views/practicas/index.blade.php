<html>
<head>
    <title>Practicas</title>
</head>
<body>

<table>
    <thead>
    <tr>
        <td>Carrera</td>
        <td>Estudiante</td>
        <td>Contacto</td>
        <td>Empresa</td>
        <td>Ver</td>
    </tr>
    </thead>
    <tbody>
    @foreach($practicas as $practica)
        <tr>
            <td>{{ $practica->carrera->nombre }}</td>
            <td>{{ $practica->estudiante->nombres . ' ' . $practica->estudiante->apellidos }}</td>
            <td>{{ $practica->contacto->nombres . ' ' . $practica->contacto->apellidos . '(' . $practica->contacto->telefono . ')' }}</td>
            <td>{{ $practica->contacto->empresa->nombre_fantasia }}</td>
            <td>{{ HTML::linkRoute('practicas.show', 'Ver', array($practica->pk)) }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
<br><br>
{{ HTML::linkRoute('contactos_empresariales.create', 'Crear contacto de practica') }}<br><br>
{{ HTML::linkRoute('empresas.create', 'Ingresar datos de la empresa') }}<br> <br>
{{ HTML::linkRoute('practicas.create', 'Crear nueva practica') }}<br><br>
</body>
</html>