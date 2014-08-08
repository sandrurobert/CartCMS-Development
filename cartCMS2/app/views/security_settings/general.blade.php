@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.security.general_settings')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => 'security.general', 'method' => 'post', 'class' => 'form-inline')) }}

		<div id="boxInputs_Inline">
			{{Form::label('min_pw_lenght', Lang::get('dashboard_general.min_pw_lenght'))}}
			{{Form::text('min_pw_lenght', $settings['min_pw_lenght'], array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('dashboard_general.min_pw_lenght')))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('max_profilepic_size', Lang::get('Maximum profile picture size (mb) - UNDER DEVELOPMENT'))}}
			{{Form::text('max_profilepic_size', $settings['min_pw_lenght'], array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('dashboard_general.min_pw_lenght')))}}
		</div>

		<div id="boxInputs_Inline" class="no-padding">
			{{Form::submit(Lang::get('dashboard_general.update'), array('class' => 'redBtn width-20 right'))}}
		</div>
		{{ Form::close()}}

	</div>
@stop