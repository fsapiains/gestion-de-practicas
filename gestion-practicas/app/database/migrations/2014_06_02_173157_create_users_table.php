<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('users', function($table))
			  {
                   $table->create();
                   $table->integer('rut');

                   $table->string('nombre',50);
                   $table->string('apellido',50);
                   $table->integer('telefono'30);
                   $table->string('email',100);
                   $table->string('rol',100);
                   $table->string('password',50);

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
		schema::drop('users');
	}

}
