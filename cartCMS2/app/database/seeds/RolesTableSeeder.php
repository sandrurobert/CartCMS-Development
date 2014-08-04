<?php

class RolesTableSeeder extends Seeder {

  public function run()
  {
    // Uncomment the below to wipe the table clean before populating
    // DB::table('roles')->truncate();


      	$owner = new Role;
      	$owner->name = 'Owner';
      	$owner->save();
	
      	$admin = new Role;
      	$admin->name = 'Admin';
      	$admin->save();
	
      	$worker = new Role;
      	$worker->name = 'Worker';
      	$worker->save();

      	$user = User::where('email','=','axxwee@gmail.com')->first();
      	$user->roles()->attach( $owner->id );

	      $user = User::where('email','=','sandrurobert.userx@gmail.com')->first();
	      $user->roles()->attach( $owner->id );

	      $addUsers = new Permission;
	      $addUsers->name = 'add_users';
	      $addUsers->display_name = 'Add users';
	      $addUsers->save();

	      $deleteUsers = new Permission;
	      $deleteUsers->name = 'delete_users';
	      $deleteUsers->display_name = 'Delete Users';
	      $deleteUsers->save();

	      $owner->perms()->sync(array($addUsers->id, $deleteUsers->id));
	      $admin->perms()->sync(array($addUsers->id, $deleteUsers->id));


  }

}