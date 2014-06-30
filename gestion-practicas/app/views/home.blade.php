<!DOCTYPE html>
<head>
    <meta charset="UTF-8"/>
    <title>Inicio</title>
    {{ HTML::style('css/stylesheet.css') }}
</head>
<body>
<header>
    <nav>
        <ul>
            <li>
                {{ HTML::linkRoute('estudiantes.index', 'Estudiantes') }}
            </li>
            <li>
                {{ HTML::linkRoute('practicas.index', 'Prácticas') }}
            </li>
        </ul>
    </nav>
</header>
<article>
    <section>
        <h1>Bienvenido!</h1>

        <div class="form">
            <ul>
                <li>{{ HTML::linkRoute('user.logout', 'Cerrar Sesión')}}</li>
            </ul>
        </div>
    </section>
</article>
</body>