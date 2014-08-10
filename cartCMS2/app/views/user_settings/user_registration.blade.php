@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.user_registration', array('email' => $user->email))}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
	</div>

	<div class="col-md-12">

		{{ Form::open(array('route' => array('user.registration'), 'method' => 'post', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{ Form::label('email', Lang::get('dashboard_general.email'))}}
			{{ Form::text('email', $user->email, array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.email'), 'disabled'))}}
		</div>

		{{ Form::hidden('token', $user->register_token) }}

		<div class="boxInputs_Inline">
			{{ Form::label('first_name', Lang::get('dashboard_general.first_name'))}}
			{{ Form::text('first_name', null, array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.first_name')))}}
		</div>

		<div class="boxInputs_Inline">
			{{ Form::label('last_name', Lang::get('dashboard_general.last_name'))}}
			{{ Form::text('last_name', null, array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.last_name')))}}
		</div>

		<div class="boxInputs_Inline">
			{{ Form::label('newpass', Lang::get('dashboard_general.new.password'))}}
			{{ Form::password('newpass', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.new.password')))}}
		</div>

		<div class="boxInputs_Inline">
			{{ Form::label('newpassagain', Lang::get('dashboard_general.new.password.again'))}}
			{{ Form::password('newpassagain', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.new.password.again')))}}
		</div>

		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('dashboard_general.submit'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}
	</div>

@stop