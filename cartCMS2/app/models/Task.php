<?php

class Task extends \Eloquent {
	protected $fillable = ['sent_by_id', 'sent_to_id', 'type', 'deadline', 'content', 'status'];
}