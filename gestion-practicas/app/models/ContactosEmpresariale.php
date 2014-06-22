<?php

class ContactosEmpresariale extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['empresa_fk','nombres','apellidos','rut','telefono','email'];

    public $timestamps = false;

}