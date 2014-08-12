@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.create_task')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => 'task.store', 'method' => 'post', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{Form::label('title', Lang::get('tasks.title'))}}
			{{Form::text('title', null, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.title')))}}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('content', Lang::get('tasks.content'))}}
			{{Form::textarea('content', null, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.content')))}}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('sent_to_id', Lang::get('tasks.to'))}}
			{{ Form::select('sent_to_id', $users, array('class' => 'form-control category-dropdown')) }}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('type', Lang::get('tasks.type'))}}
			{{ Form::select('type',$type, array('class' => 'form-control category-dropdown')) }}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('deadline', Lang::get('tasks.deadline'))}}
			{{Form::text('deadline', null, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.deadline')))}}
		</div>

		{{Form::hidden('sent_by_id', null)}}
		{{Form::hidden('status', null)}}
		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('tasks.sent'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}

	</div>
@stop