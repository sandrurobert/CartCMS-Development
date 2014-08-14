<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function($table)
		{
			$table->string('id')->unique();
			$table->integer('user_id')->unsigned()->nullable();
			$table->integer('role_id')->unsigned()->nullable();
		    $table->text('payload');
		    $table->integer('last_activity');

		    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
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
		Schema::drop('sessions');
	}

}
