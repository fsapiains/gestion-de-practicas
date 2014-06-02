<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacto', function($table))
			  {
                   $table->create();
                   $table->increments('id_contacto');

                   $table->string('nombre',100);
                   $table->string('apellido',100);
                   $table->integer('telefono'50);
                   $table->string('email',100);

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
		schema::drop('contacto');
	}

}
