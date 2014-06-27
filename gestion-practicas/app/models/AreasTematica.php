<?php

class AreasTematica extends \Eloquent {

    public function empresas(){
        return $this->hasMany('Practica');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['tema','descripcion'];

    public $timestamps = false;

}