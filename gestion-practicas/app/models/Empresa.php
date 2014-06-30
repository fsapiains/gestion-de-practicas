<?php

class Empresa extends \Eloquent {

    public function contactos(){
        return $this->hasMany('Contactosempresariale');
    }

    public function rubros(){
        return $this->belongsTo('Rubro');
    }

    protected $primaryKey = 'pk';

	public static $rules = [
        'email' => 'required|email',
		'rut'=> 'required|rut'
	];
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser un email válido.',
    ];
	// Don't forget to fill this array
	protected $fillable = ['rut', 'nombre_real','nombre_fantasia','direccion','rubro_fk','telefono','email'];

    public $timestamps = false;

}