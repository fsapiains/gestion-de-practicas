<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Ingreso de Estudiante</title>
</head>
<body>
<h1> Ingreso de datos del estudiante</h1>
<article>
    <section>
        <div class="form">
            {{ HTML::style('css/stylesheet.css') }}
             {{ Form::open(array('route' => array('estudiantes.store'))) }}
             {{ Form::label('direccion', 'Dirección: ') }}
             {{ Form::text('direccion') }} <br> <br>
             {{ Form::label('telefono', 'Teléfono: ') }}
             {{ Form::text('telefono') }} <br> <br>
             {{ Form::label('carrera_fk', 'Carrera: ') }}
             {{ Form::select('carrera_fk',$carreras) }} <br> <br>
             {{ Form::submit('Enviar') }}
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