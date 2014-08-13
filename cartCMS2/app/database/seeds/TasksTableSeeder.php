<?php

class TasksTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('task_type')->truncate();

		$type =array(
		array(
            'name' => 'Trivial',
            'added_by_id' => '1',
            ),
		array(
            'name' => 'Important',
            'added_by_id' => '1',
            )
		);

		// Uncomment the below to run the seeder
		DB::table('task_type')->insert($type);
	}

}
