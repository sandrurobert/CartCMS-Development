@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.task_show')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		
		

			<h1>{{$task->title}}</h1>
			<p>Assined to :{{$task->findUser($task->sent_to_id)}} </p>
			<p>Assined by :{{$task->findUser($task->sent_by_id)}} </p>
			<p>Deadline : {{$task->deadline}}</p>
			<p>Type : {{$task->findType($task->type)}}</p>
			<p>Status: {{$task->status}}</p>

			<a href="{{route('task.complete', $task->id)}}">Mark as complete</a>

	</div>

@stop