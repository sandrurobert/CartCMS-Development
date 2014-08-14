<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTaskTypeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('task_type', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('added_by_id')->unsigned();
			$table->timestamps();


			$table->foreign('added_by_id')->references('id')->on('users')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('task_type');
	}

}
