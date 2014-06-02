<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empresa', function($table))
			  {
                   $table->create();
                   $table->integer('rut_empresa');

                   $table->string('nombre',100);
                   $table->string('apellido',100);
                   $table->string('direccion',200);
                   $table->string('comuna',100);
                   $table->string('ciudad',100);

                   $table->timestamps();
			  });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		schema::drop('empresa');
	}

}
