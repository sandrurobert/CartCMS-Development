<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecuritySettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('security_settings', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->integer('min_pw_lenght')->unsigned();
			$table->integer('max_session_idle')->unsigned();
			$table->integer('updated_by')->unsigned();
			$table->timestamps();

			$table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('security_settings');
	}

}
