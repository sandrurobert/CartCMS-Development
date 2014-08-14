<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTasksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tasks', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('sent_by_id')->unsigned();
			$table->integer('sent_to_id')->unsigned();
			$table->string('title');
			$table->text('content');
			$table->string('type')->nullable();
			$table->string('deadline')->nullable();

			
			$table->string('status');
			$table->timestamps();

			$table->foreign('sent_by_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('sent_to_id')->references('id')->on('users')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tasks');
	}

}
