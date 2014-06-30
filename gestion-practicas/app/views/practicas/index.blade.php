<html>
<head>
    <title>Practicas</title>
</head>
<body>
   <div class="form">
        {{ HTML::style('css/stylesheet.css') }}
        <table>
            <thead>
            <tr>
                <td>Carrera</td>
                <td>Estudiante</td>
                <td>Contacto</td>
                <td>Teléfono contacto</td>
                <td>Empresa</td>
                <td>Ver</td>
            </tr>
            </thead>
            <tbody>
            @foreach($practicas as $practica)
                <tr>
                    <td>{{ $practica->carrera->nombre }}</td>
                    <td>{{ $practica->estudiante->nombres . ' ' . $practica->estudiante->apellidos }}</td>
                    <td>{{ $practica->contacto->nombres . ' ' . $practica->contacto->apellidos  }}</td>
                    <td>{{ $practica->contacto->telefono }}</td>
                    <td>{{ $practica->contacto->empresa->nombre_fantasia }}</td>
                    <td>{{ HTML::linkRoute('practicas.show', 'Ver', array($practica->pk)) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
<br><br>
   <div>
        <ul>
       {{ HTML::linkRoute('contactos_empresariales.create', 'Crear nueva practica') }}<br><br>
        </ul>
    </div>
</body>
</html>