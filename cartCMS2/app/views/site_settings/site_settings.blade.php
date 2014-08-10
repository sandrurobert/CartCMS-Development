@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.site_settings')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => 'site.settings', 'method' => 'post', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{Form::label('title', Lang::get('dashboard_general.title'))}}
			{{Form::text('title', $settings['title'], array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('dashboard_general.title')))}}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('keywords', Lang::get('dashboard_general.keywords'))}}
			{{Form::text('keywords', $settings['keywords'], array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('dashboard_general.keywords')))}}
		</div>

		<div class="boxInputs_Inline">
			{{Form::label('description', Lang::get('dashboard_general.description'))}}
			{{Form::text('description', $settings['description'], array('class' => 'basicInput form-control importantInput', 'placeholder' => Lang::get('dashboard_general.description')))}}
		</div>

		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('dashboard_general.update'), array('class' => 'redBtn width-20 right'))}}
		</div>
		{{ Form::close()}}

	</div>
@stop