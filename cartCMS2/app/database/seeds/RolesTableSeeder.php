<?php

class RolesTableSeeder extends Seeder {

  public function run()
  {
    // Uncomment the below to wipe the table clean before populating
    // DB::table('roles')->truncate();



      $client = new Role;
      $client->name = 'Client';
      $client->save();

      $admin = new Role;
      $admin->name = 'Admin';
      $admin->save();

      $agent = new Role;
      $agent->name = 'Agent';
      $agent->save();

      $user = User::where('email','=','axxwee@gmail.com')->first();
      $user->roles()->attach( $admin->id );

      $user2 = User::where('email','=','adrian@carve.ro')->first();
      $user2->roles()->attach( $admin->id );

      $user2 = User::where('email','=','demo@immoplattform.com')->first();
      $user2->roles()->attach( $admin->id );

      $manageProperties = new Permission;
      $manageProperties->name = 'manage_properties';
      $manageProperties->display_name = 'Manage Properties';
      $manageProperties->save();

      $viewProperties = new Permission;
      $viewProperties->name = 'view_properties';
      $viewProperties->display_name = 'View Properties';
      $viewProperties->save();

      $manageUsers = new Permission;
      $manageUsers->name = 'manage_users';
      $manageUsers->display_name = 'Manage Users';
      $manageUsers->save();

      $makePosts = new Permission;
      $makePosts->name = 'make_posts';
      $makePosts->display_name = 'Make Post';
      $makePosts->save();

      $client->perms()->sync(array($manageProperties->id, $viewProperties->id));
      $admin->perms()->sync(array($manageProperties->id, $manageUsers->id, $viewProperties->id, $makePosts->id));
      $agent->perms()->sync(array($manageProperties->id, $viewProperties->id));
  }

}