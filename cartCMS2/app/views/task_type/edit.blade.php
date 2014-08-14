@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.edit_task_type')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => array('task_type.update', $type->id), 'method' => 'put', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{Form::label('name', Lang::get('tasks.name'))}}
			{{Form::text('name', $type->name, array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('tasks.name')))}}
		</div>

		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('tasks.update'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}

	</div>
@stop