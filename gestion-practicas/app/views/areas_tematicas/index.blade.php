<html>
<head>
    <title>Areas temáticas</title>
</head>
<body>
{{Form::open(array('url'=>'/practicas.por.area.tematica'))}}
{{Form::text('pk',null,array('placeholder'=>'Ingrese la clave del area tematica')) }}
{{Form::submit('Traer Practicas')}}


<ul>
    @foreach($areastematicas as $area)

   <li> {{ HTML::link('areas_tematicas/'.$area->pk, $area->tema); }}</li>
    @endforeach
</ul>
</body>
</html>