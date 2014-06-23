<?php

class Estudiante extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk'];

    public $timestamps = false;
}