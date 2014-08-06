<?php

class  IconsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('icons')->truncate();

		$icons =array(
		array(
            'user_id' => '1',
            'icon_url' => 'avt/default.jpg',
            ),
		array(
            'user_id' => '2',
            'icon_url' => 'avt/default.jpg',
            )
		);

		// Uncomment the below to run the seeder
		DB::table('icons')->insert($icons);
	}

}
