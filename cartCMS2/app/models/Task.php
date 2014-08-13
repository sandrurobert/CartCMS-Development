<?php

class Task extends \Eloquent {
	protected $fillable = ['sent_by_id', 'sent_to_id', 'type', 'deadline', 'content', 'status', 'title'];
	protected $table = 'tasks';

	public function task_type()
	{
		return $this->hasOne('TaskType');
	}
}