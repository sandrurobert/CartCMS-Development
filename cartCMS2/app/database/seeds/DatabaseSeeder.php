<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UsersTableSeeder');
		$this->call('RolesTableSeeder');
		$this->call('SiteSettingsTableSeeder');
		$this->call('SecuritySettingsTableSeeder');
		$this->call('IconsTableSeeder');
		$this->call('MailSettingsTableSeeder');
		$this->call('TasksTableSeeder');
	}

}
