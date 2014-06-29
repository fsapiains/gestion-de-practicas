<?php

class Practica extends \Eloquent {

    public function contactos(){
        return $this->hasMany('Estudiante');
    }

    protected $primaryKey = 'pk';

	// Add your validation rules here
	public static $rules = [
       // 'fecha' => 'date_format:y-m-d|required',
       // 'fecha_inicio' => 'date_format:y-m-d',
       // 'fecha_termino' => 'date_format:y-m-d',
        'archivo' => 'mimes:pdf,doc,docx'
	];
    public static $rules1 = [
        // 'fecha' => 'date_format:y-m-d|required',
        // 'fecha_inicio' => 'date_format:y-m-d',
        // 'fecha_termino' => 'date_format:y-m-d',
        'rut' => 'min:9'
    ];
    public static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'date_format:y-m-d'=> 'El formato de :attribute no es válida',
        'mimes:pdf,doc,docx'=>'El formato de archivo no es válido',
        'min:9'=> 'Debe ingresar un rut válido'
    ];

	// Don't forget to fill this array
	protected $fillable = ['carrera_fk','contacto_fk','estudiante_fk','fecha','fecha_imicio','fecha_termino','horas','evaluacion','archivo'];

    public $timestamps = false;


}