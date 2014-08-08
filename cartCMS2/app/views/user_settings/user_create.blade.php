@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.user_create', array('name' => Auth::user()->first_name))}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
	</div>

	<div class="col-md-12">

		{{ Form::open(array('route' => array('user.create'), 'method' => 'put', 'class' => 'form-inline')) }}

		<div id="boxInputs_Inline">
			{{ Form::label('email', Lang::get('dashboard_general.inviteEmail'))}}
			{{ Form::text('email', null, array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.email')))}}
		</div>

		<div id="boxInputs_Inline">
			{{ Form::label('rank', Lang::get('dashboard_general.users_rank'))}}
			{{ Form::select('rank', array('1' => 'Owner', '2' => 'Admin', '3' => 'Worker'), '3')}}
		</div>

		<div id="boxInputs_Inline" class="no-padding">
			{{Form::submit(Lang::get('dashboard_general.invite'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}
	</div>

@stop