<?php

class Task extends \Eloquent {
	protected $fillable = ['sent_by_id', 'sent_to_id', 'type', 'deadline', 'content', 'status', 'title'];
	protected $table = 'tasks';

	public function task_type()
	{
		return $this->hasOne('TaskType');
	}

	public function findUser($id)
	{
		$user = User::find($id);
		$full_name = $user->first_name . ' ' . $user->last_name;
		return $full_name;
	}

	public function findType($id)
	{
		$type = TaskType::find($id);

		return $type->name;
	}
}