<?php

class Facultade extends \Eloquent {

    public function departamentos(){
        return $this->hasMany('Departamento');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['nombre', 'descripcion'];

    public $timestamps = false;

}