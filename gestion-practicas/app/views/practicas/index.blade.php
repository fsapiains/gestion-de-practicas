<html>
<head>
    <title>Práctica</title>
</head>
<body>
<h1>Practicas</h1>


<ul>
    @foreach($practicas as $practica)

    {{ HTML::link( 'practicas/'.$practica->pk ,'ID Practica :'.$practica->pk   ) }}
    <br>

    @endforeach
</ul>
</body>
</html>