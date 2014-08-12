@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.edit_task')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => array('task.update', $task->id), 'method' => 'put', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{Form::label('title', Lang::get('tasks.title'))}}
			{{Form::text('title', $task->title, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.title')))}}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('content', Lang::get('tasks.content'))}}
			{{Form::textarea('content', $task->content, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.content')))}}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('sent_to_id', Lang::get('tasks.to'))}}
			{{ Form::select('sent_to_id', $users, $task->sent_to_id,array('class' => 'form-control category-dropdown')) }}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('type', Lang::get('tasks.type'))}}
			{{ Form::select('type',$type, $task->type,array('class' => 'form-control category-dropdown')) }}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('deadline', Lang::get('tasks.deadline'))}}
			{{Form::text('deadline', $task->deadline, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.deadline')))}}
		</div>

		{{Form::hidden('sent_by_id', null)}}
		{{Form::hidden('status', null)}}
		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('tasks.update'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}

	</div>
@stop