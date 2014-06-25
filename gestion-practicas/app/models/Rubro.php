<?php

class Rubro extends \Eloquent {

    public function empresas(){
        return $this->hasMany('Empresa');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['rubro', 'descripcion'];

    public $timestamps = false;

}