@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.create_task_type')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => 'task_type.store', 'method' => 'post', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{Form::label('name', Lang::get('tasks.name'))}}
			{{Form::text('name', null, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.name')))}}
		</div>

		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('tasks.add'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}

	</div>
@stop