<?php

class SecuritySettingsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('site_settings')->truncate();

		$settings =array(
            'min_pw_lenght' => '5',
            'max_session_idle' => '300', // seconds // default: 300 (5 minutes)
            'updated_by' => '1'
            );

		// Uncomment the below to run the seeder
		DB::table('security_settings')->insert($settings);
	}

}


