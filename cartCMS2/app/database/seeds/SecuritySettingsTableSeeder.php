<?php

class SecuritySettingsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('site_settings')->truncate();

		$settings =array(
            'min_pw_lenght' => '5',
            'updated_by' => '2'
            );

		// Uncomment the below to run the seeder
		DB::table('security_settings')->insert($settings);
	}

}


