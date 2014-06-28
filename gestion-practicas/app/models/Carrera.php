<?php

class Carrera extends \Eloquent {

    public function estudiantes(){
        return $this->hasMany('Estudiante','pk');
    }

    public function escuelas(){
        return $this->belongsTo('Escuela');
    }

    public function practicas(){
        return $this->hasMany('Practica');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
        'codigo' => 'required',
        'nombre' => 'required'
	];

    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
    ];

	// Don't forget to fill this array
	protected $fillable = ['codigo','nombre','escuela_fk'];

    public $timestamps = false;


}