<?php

class Carrera extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['codigo','nombre','escuela_fk'];

    public $timestamps = false;


}