<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSiteSettingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('site_settings', function(Blueprint $table)
		{
			$table->increments('id')->unsigned();
			$table->string('title')->nullable();
			$table->string('keywords')->nullable();
			$table->string('description')->nullable();
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
		Schema::drop('site_settings');
	}

}
