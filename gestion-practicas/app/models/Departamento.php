<?php

class Departamento extends \Eloquent {

    public function escuelas(){
        return $this->hasMany('Escuela');
    }

    public function facultades(){
        return $this->belongsTo('Facultade');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['facultad_fk', 'nombre' , 'descripcion'];

    public $timestamps = false;

}