<html>
<head>
    <title>Login</title>
</head>
<body>
<h1> Login</h1>
<article>
    <section>
        <div class="form">
            {{ HTML::style('css/stylesheet.css') }}
            {{ Form::open(array('route' => array('user.hacer_login'))) }}
            {{ Form::label('rut','Rut(Sin puntos ni guión): ') }}
            {{ Form::text('rut') }} <br> <br>
            {{ Form::label('contrasena','Contraseña: ') }}
            {{ Form::password('contrasena') }} <br> <br>
            <input type="submit" />

            {{ Form::close() }}

            <br> <br>
            @if($errors->has())
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
            @endif

        </div>
    </section>
</article>
</body>