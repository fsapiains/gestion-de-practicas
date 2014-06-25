<?php

class Escuela extends \Eloquent {

    public function carreras(){
        return $this->hasMany('Carrera');
    }

    public function departamentos(){
        return $this->belongsTo('Departamento');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['departamento_fk', 'nombre' , 'descripcion'];

    public $timestamps = false;

}