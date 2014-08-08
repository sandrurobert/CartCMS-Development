<?php

class SiteSettingsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('site_settings')->truncate();

		$settings =array(
            'title' => 'Site title',
            'keywords' => 'keywords',
            'description' => 'description',
            'updated_by' => '2'
            );

		// Uncomment the below to run the seeder
		DB::table('site_settings')->insert($settings);
	}

}


