<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users =array(
			array(
            'email' => 'axxwee@gmail.com',
            'password' => Hash::make('axxwe'),
            'first_name' => 'Alex',
            'last_name' => 'Radoi'),
            array(
            'email' => 'sandrurobert.userx@gmail.com',
            'password' => Hash::make('userx'),
            'first_name' => 'Robert',
            'last_name' => 'Sandru'),
            );

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
<?php

class UsersTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('users')->truncate();

		$users =array(
			array(
            'email' => 'axxwee@gmail.com',
            'password' => Hash::make('axxwe'),
            'first_name' => 'Alex',
            'last_name' => 'Radoi'),
            array(
            'email' => 'sandrurobert.userx@gmail.com',
            'password' => Hash::make('userx'),
            'first_name' => 'Robert',
            'last_name' => 'Sandru'),
            );

		// Uncomment the below to run the seeder
		DB::table('users')->insert($users);
	}

}
