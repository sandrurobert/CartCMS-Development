<?php

class MiscellaneousSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('mail_settings')->truncate();

		$settings = array(
            'id' => '1',
            'first_run' => '1'
            );

		// Uncomment the below to run the seeder
		DB::table('miscellaneous')->insert($settings);
	}

}


