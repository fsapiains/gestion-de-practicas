<?php

class ContactosEmpresariale extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
        'email' => 'required|email',
        'rut'=> 'required|min:9'
  ];

    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'email' => 'El campo :attribute debe ser un email válido.',
        'min:9'=> 'El campo :attribute debe ser un rut valido'
    ];

    public static $rules1 = [
        'email' => 'required|email'
    ];



	// Don't forget to fill this array
	protected $fillable = ['empresa_fk','nombres','apellidos','rut','telefono','email'];

    public $timestamps = false;

}