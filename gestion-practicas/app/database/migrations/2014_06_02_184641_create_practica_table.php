<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePracticaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('practica', function($table))
			  {
                   $table->create();
                   $table->increments('id_practica');

                   $table->string('descripcion_empleo',400);
                   $table->timestamps('fecha_inicio');
                   $table->integer('horas_practica',50);

                   $table->timestamps();
			  });

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('practica');
	}

}
