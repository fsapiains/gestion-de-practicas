<?php

class AreasTematica extends \Eloquent {
    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['tema','descripcion'];

    public $timestamps = false;

    public function practicas()
    {
        return $this->hasMany('Practica', 'areas_tematica_fk');
    }
}