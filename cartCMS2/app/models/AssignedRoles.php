<?php

class AssignedRoles extends \Eloquent {
	protected $fillable = ['user_id', 'role_id'];
	protected $table = 'assigned_roles';
}