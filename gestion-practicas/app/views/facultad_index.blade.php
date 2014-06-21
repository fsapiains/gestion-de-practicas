<html>
<head>
	</head>
<body>
	<ul>
		@foreach ($facultades as $facultad)
			<li>{{ $facultad->nombre }}</li>
		@endforeach
	</ul>
</body>
