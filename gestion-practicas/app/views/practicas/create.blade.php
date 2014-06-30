<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Ingreso de practica</title>
</head>
<body>
    <article>
        <section>
            <h1>Ingreso de datos de práctica</h1>
            <div class="form">
                {{ HTML::style('css/stylesheet.css') }}
                  {{ Form::open(array('route' => array('practicas.store'), 'files' => true)) }}
                  {{ Form::label('contacto_fk', 'Contacto: ') }}
                  {{ Form::select('contacto_fk',$contactos_select) }} <br> <br>
                  {{ Form::label('areas_tematica_fk', 'Area temática: ') }}
                  {{ Form::select('areas_tematica_fk',$areastematicas_select) }} <br> <br>
                  {{ Form::label('fecha_inicio', 'Fecha Inicio(aaaa-mm-dd): ') }}
                  {{ Form::text('fecha_inicio') }} <br> <br>
                  {{ Form::label('fecha_termino', 'Fecha Término(aaaa-mm-dd): ') }}
                  {{ Form::text('fecha_termino') }} <br> <br>
                  {{ Form::label('horas', 'Horas: ') }}
                  {{ Form::text('horas') }} <br> <br>
                  {{ Form::label('evaluacion' , 'Evaluacion: ') }}
                  {{ Form::select('evaluacion',$evaluacion_select) }} <br> <br>
                  {{ Form::label('archivo' , 'Archivo: ') }}
                  {{ Form::file('archivo') }} <br> <br>
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