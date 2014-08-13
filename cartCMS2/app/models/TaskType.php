<?php

class TaskType extends \Eloquent {
	protected $fillable = ['name', 'added_by_id'];
	protected $table = 'task_type';

	public function tasks()
	{
		return $this->hasMany('Task');
	}
}