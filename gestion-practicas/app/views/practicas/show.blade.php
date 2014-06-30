
<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Practica estudiante</title>
</head>
<body>
<h1> Datos practica estudiante</h1>
<article>
    <section>
        <div class="form">
            {{ HTML::style('css/stylesheet.css') }}
             Nombre estudiante: {{ $practica->estudiante->nombres }}<br><br>
             Carrera: {{ $practica->estudiante->carrera->nombre }}<br><br>
             Fecha Inicio: {{ $practica->fecha_inicio}}<br><br>
             Horas práctica: {{ $practica->horas}}<br><br>
            </div>
        </section>
    </article>
</body>
