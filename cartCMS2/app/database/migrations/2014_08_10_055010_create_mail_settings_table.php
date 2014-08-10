<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMailSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mail_settings', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('driver')->nullable();
			$table->string('host')->nullable();
			$table->string('port')->nullable();
			$table->string('address')->nullable();
			$table->string('name')->nullable();
			$table->string('encryption')->nullable();
			$table->string('username')->nullable();
			$table->string('password')->nullable();
			$table->string('sendmail')->nullable();
			$table->string('pretend')->nullable();
			$table->integer('last_update_by')->unsigned();

			$table->foreign('last_update_by')->references('id')->on('users')->onDelete('cascade');
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
		Schema::drop('mail_settings');
	}

}
