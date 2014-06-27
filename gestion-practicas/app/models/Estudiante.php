<?php

class Estudiante extends \Eloquent {

    public function carreras(){
        return $this->belongsTo('Carrera');

    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		'telefono' => 'required','min:8'

	];

	// Don't forget to fill this array
	protected $fillable = ['rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk'];

    public $timestamps = false;
}