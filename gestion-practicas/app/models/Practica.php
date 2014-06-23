<?php

class Practica extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['carrera_fk','contacto_fk','estudiante_fk','fecha','fecha_imicio','fecha_termino','horas','evaluacion','archivo'];

    public $timestamps = false;

}