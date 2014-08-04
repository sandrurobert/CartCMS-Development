<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePendingUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pending_users', function(Blueprint $table)
		{
			$table->increments('id')->unsigned;
			$table->integer('creator_user_id')->unsigned();
			$table->string('email')->unique(); // Unique content , no repeated email . Mysql check
			$table->string('register_token');
			$table->string('account_rank');
			$table->timestamps();

			$table->foreign('creator_user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pending_users');
	}

}
