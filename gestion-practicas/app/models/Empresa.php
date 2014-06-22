<?php

class Empresa extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['rut', 'nombre_real','nombre_fantasia','direccion','rubro_fk','telefono','email'];

    public $timestamps = false;

}