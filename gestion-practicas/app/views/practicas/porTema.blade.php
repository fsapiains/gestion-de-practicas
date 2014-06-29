<html>
<head>
    <title>Práctica</title>
</head>
<body>
{{Form::open(array('url'=>'/practicas.buscar'))}}
{{Form::text('keyword',null,array('placeholder'=>'Escribe un area temática')) }}
{{Form::submit('Buscar')}}

ul>
@foreach($ruts as $rut)

{{ HTML::link( 'estudiantes/'.$rut ) }}
<br>

@endforeach


<ul>
    @foreach($practicas as $practica)

    {{ HTML::link( 'practicas/'.$practica , 'PK : '.$practica->pk ) }}
    <br>

    @endforeach
</ul>
</body>
</html>