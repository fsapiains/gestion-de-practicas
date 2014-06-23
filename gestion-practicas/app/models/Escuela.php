<?php

class Escuela extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['departamento_fk', 'nombre' , 'descripcion'];

    public $timestamps = false;

}