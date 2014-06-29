@extends('layouts.master')

@section('sidebar')
@parent
Formulario
@stop

@section('content')
{{ HTML::link('bodegas', 'volver'); }}
<h1>
    Eliminar Practica:



</h1>
{{ Form::open(array('url' => 'practicas.borrar.enviar' )) }}
{{Form::label('rut', 'Ingrese rut del estudiante (sin puntos ni guion)')}}
{{Form::text('rut')}}

{{Form::submit('Eliminar')}}
{{ Form::close() }}
@stop