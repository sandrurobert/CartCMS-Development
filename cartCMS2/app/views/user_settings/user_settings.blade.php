@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.your_profile', array('name' => Auth::user()->first_name))}}</h2>
	</div>


	<div class="col-md-12">
		@include('notifications')

		{{ Form::open(array('route' => array('update.password', $user->id), 'method' => 'put', 'class' => 'form-inline')) }}

		<div id="boxInputs_Inline">
			{{ Form::label('old_pass', Lang::get('dashboard_general.old.password'))}}
			{{ Form::password('old_pass', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.old.password')))}}
		</div>

		<div id="boxInputs_Inline">
			{{ Form::label('new', Lang::get('dashboard_general.new.password'))}}
			{{ Form::password('new', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.new.password')))}}
		</div>

		<div id="boxInputs_Inline">
			{{ Form::label('new2', Lang::get('dashboard_general.new.password.again'))}}
			{{ Form::password('new2', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.new.password.again')))}}
		</div>

		<div id="boxInputs_Inline" class="no-padding">
			{{Form::submit(Lang::get('dashboard_general.update'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}
	</div>

@stop