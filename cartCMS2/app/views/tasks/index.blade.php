@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.task_index')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		
		@foreach($tasks as $task)

			<h1>{{$task->title}}</h1>
			<p>Assined to :{{$task->sent_to_id}} </p>
			<p>Assined by :{{$task->sent_by_id}} </p>
			<p>Deadline : {{$task->deadline}}</p>
			<p>Type : {{$task->type}}</p>
			<p>Status: {{$task->status}}</p>
			{{link_to_route('task.edit', 'Edit', $task->id)}}
			{{link_to_route('task.destroy', 'Delete', $task->id)}}
		@endforeach
	</div>

@stop