<?php

class RolesUsuario extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['roles_pk','usuarios_pk'];

    public $timestamps = false;

    public function rol()
    {
        return $this->hasOne('Rol', 'rol_fk');
    }
}