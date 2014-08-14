@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.my_tasks')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		
		@foreach($tasks as $task)

			<h1><a href="{{route('task.show', $task->id)}}">{{$task->title}}</a></h1>
			<p>Assined by : {{$task->findUser($task->sent_by_id)}} </p>
			<p>Assined to : {{$task->findUser($task->sent_to_id)}} </p>
			<p>Status : {{$task->status}}</p>
			<p>Deadline : {{$task->deadline}} </p>
		@endforeach
	</div>

@stop