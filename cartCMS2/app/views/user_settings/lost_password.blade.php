@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.lost_password')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
	</div>

	<div class="col-md-12">

		{{ Form::open(array('route' => array('lost.password'), 'method' => 'post', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{ Form::label('email', Lang::get('dashboard_general.inviteEmail'))}}
			{{ Form::text('email', null, array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.email')))}}
		</div>


		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('dashboard_general.reset'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}
	</div>

@stop