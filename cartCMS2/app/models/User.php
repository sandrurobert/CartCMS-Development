<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use HasRole;

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/*
	*Mass Assignment
	 */
	protected $fillable = array('email', 'password', 'first_name', 'last_name');

	public function icon()
	 {
	    return $this->hasOne('Icon');
	 }


	public function uploadIcon($file)
	{
		$id = Auth::user()->id;
		$upload_dir = 'avt/';
    	$ext = $file->getClientOriginalExtension();
    	$name = 'icon.';
    	if(!File::isDirectory($upload_dir . $id)) {
		     File::makeDirectory($upload_dir . $id);
		}
		$file->move($upload_dir. $id .'/', $name . $ext);
		$path = $upload_dir . $id . '/' . $name . $ext;

		return $path;

	}

	public function isImage($file)
	{
		$ext = $file->getClientOriginalExtension();
  		if($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif'){
  			return 1;
  		}
  		else return 0;
	}

	/**
	 * Retrieve rank Name of a user by User ID
	 * param INT $id
	 */
	public function rankName($id)
	{
		$user = User::find($id);
		$rank = $user->roles->first()->name;

		return $rank;
	}

	public function getRankName($id)
	{
		$rank = Role::find($id);

		return $rank->name;

	}

	public function getUserFullname($id)
	{

		$user = User::find($id);

		$fullname = $user->first_name.' '.$user->last_name;

		return $fullname;
	}


}
