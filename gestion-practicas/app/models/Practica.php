<?php

class Practica extends \Eloquent {

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
        'fecha_inicio' => 'date_format:Y-n-d',
        'fecha_termino' => 'date_format:Y-n-d',
       // 'rut'=> 'required|rut'
	];
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date_format'=> 'El formato de :attribute no es válida',

    ];

	// Don't forget to fill this array
	protected $fillable = ['carrera_fk','contacto_fk','estudiante_fk','fecha','fecha_imicio','fecha_termino','horas','evaluacion','archivo'];

    public $timestamps = false;

    public function contacto()
    {
        return $this->hasOne('ContactosEmpresariale', 'pk', 'contacto_fk');
    }
    public function estudiante()
    {
        return $this->belongsTo('Estudiante','estudiante_fk');
    }
    public function carrera()
    {
        return $this->belongsTo('Carrera', 'carrera_fk');
    }

    public function area_tematica()
    {
        return $this->belongsTo('AreasTematica', 'areas_tematica_fk');
    }
}
