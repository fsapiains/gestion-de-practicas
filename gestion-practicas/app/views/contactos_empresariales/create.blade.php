<!DOCTYPE html>
<head>
    <meta charset="UTF-8" />
    <title>Contacto empresa</title>
</head>
<body>

<article>
    <section>
        <h1>Ingreso de contacto</h1>
            <div class="form">
                 {{ HTML::style('css/stylesheet.css') }}
                 {{ Form::open(array('route' => array('contactos_empresariales.store'))) }}
                 {{ Form::label('empresa_fk', 'Empresa: ') }}
                 {{ Form::select('empresa_fk', $empresas) }} <br> <br>
                 {{ Form::label('nombres', 'Nombres: ') }}
                 {{ Form::text('nombres') }} <br> <br>
                 {{ Form::label('apellidos', 'Apellidos: ') }}
                 {{ Form::text('apellidos') }} <br> <br>
                 {{ Form::label('rut', 'Rut (sin puntos ni guion): ') }}
                 {{ Form::text('rut') }} <br> <br>
                 {{ Form::label('telefono', 'Teléfono: ') }}
                 {{ Form::text('telefono') }} <br> <br>
                 {{ Form::label('email', 'Email: ') }}
                 {{ Form::email('email') }} <br> <br>
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
