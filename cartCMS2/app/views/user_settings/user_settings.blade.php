@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.your_profile', array('name' => Auth::user()->first_name))}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
	</div>

	<div class="col-md-12">

		{{ Form::open(array('route' => array('update.password', $user->id), 'method' => 'put', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{ Form::label('old_pass', Lang::get('dashboard_general.old.password'))}}
			{{ Form::password('old_pass', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.old.password')))}}
		</div>

		<div class="boxInputs_Inline">
			{{ Form::label('new', Lang::get('dashboard_general.new.password'))}}
			{{ Form::password('new', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.new.password')))}}
		</div>

		<div class="boxInputs_Inline">
			{{ Form::label('new2', Lang::get('dashboard_general.new.password.again'))}}
			{{ Form::password('new2', array('class' => 'basicInput form-control', 'placeholder' => Lang::get('dashboard_general.new.password.again')))}}
		</div>

		<div class="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('dashboard_general.update'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}
	</div>

	<div class="col-md-12">

		{{ Form::open(array('route' => array('update.name'), 'method' => 'put', 'class' => 'form-inline')) }}

		<div class="boxInputs_Inline">
			{{ Form::label('first_name', Lang::get('dashboard_general.first_name'))}}
			{{ Form::text('first_name', Auth::user()->first_name, array('class' => 'basicInput form-control'))}}
		</div>

		<div class="boxInputs_Inline">
			{{ Form::label('last_name', Lang::get('dashboard_general.last_name'))}}
			{{ Form::text('last_name', Auth::user()->last_name, array('class' => 'basicInput form-control'))}}
		</div>

		<div id="boxInputs_Inline no-padding">
			{{Form::submit(Lang::get('dashboard_general.update'), array('class' => 'redBtn width-20 right'))}}
		</div>

		{{ Form::close()}}
	</div>

	<div class="col-md-12">
		{{ Form::open(array('route' => 'update.icon', 'method' => 'post', 'class' => 'form-inline', 'files' => 'true')) }}
		<div class="boxInputs_Inline">
			{{ Form::file('icon', array('class' => 'basicInput form-control' )) }}
		</div>
		<div class="boxInputs_Inline no-padding">	
			{{Form::submit(Lang::get('dashboard_general.update'), array('class' => 'redBtn width-20 right'))}}
		</div>
		{{ Form::close() }}
		<div class="boxInputs_Inline">
			{{link_to_route('default.icon', Lang::get('dashboard_general.default_avatar'))}}
		</div>
		<div class="boxInputs_Inline">
			<div class="col-md-4 col-md-offset-4"> 
				{{ HTML::image(Auth::user()->icon->icon_url, '', array('class' =>'img-rounded img-responsive' )) }}
			</div>
		</div>

	</div>

@stop