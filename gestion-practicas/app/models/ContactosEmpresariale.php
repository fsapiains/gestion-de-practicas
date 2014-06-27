<?php

class ContactosEmpresariale extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
        'email' => 'required|email'

	];

    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser un email válido.'

    ];

	// Don't forget to fill this array
	protected $fillable = ['empresa_fk','nombres','apellidos','rut','telefono','email'];

    public $timestamps = false;

}