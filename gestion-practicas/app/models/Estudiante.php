<?php

class Estudiante extends \Eloquent {

    public function carrera(){
        return $this->belongsTo('Carrera', 'carrera_fk');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		'telefono' => 'required|size:8'
	];
    public static $messages=[
        'required' => 'El campo :attribute es requerido',
        'size'=> 'El campo :attribute debe tener :size caracteres'
    ];

	// Don't forget to fill this array
	protected  $fillable = ['rut','nombres','apellidos','fecha_nacimiento','genero','direccion','telefono','email','estado','carrera_fk'];

    public $timestamps = false;

    public function practicas()
    {
        return $this->hasMany('Practica', 'estudiante_fk');
    }
}