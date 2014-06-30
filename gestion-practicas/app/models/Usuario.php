<?php

class Usuario extends \Eloquent {

    protected $primaryKey = 'id';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['rut','password'];

    public $timestamps = false;

    public function roles_usuario()
    {
        return $this->hasMany('RolesUsuario', 'rol_fk');
    }
}