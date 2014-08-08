@extends('layout')
	@section('content')


	<h1>User global settings</h1>
		<div class="col-md-12">
			<div class="col-md-8">
				{{ Form::open(array('route' => array('update.password'), 'method' => 'put', 'class' => 'form-control')) }}
					{{ Form::label('old_pass', 'Old Password')}}
					{{ Form::password('old_pass', null, array('class' => 'form-group'))}}

					{{ Form::label('new', 'New Password')}}
					{{ Form::password('new', array('class' => 'form-group'))}}

					{{ Form::label('new2', 'New Password Again')}}
					{{ Form::password('new2', array('class' => 'form-group'))}}

					{{ Form::submit('Submit')}}
				{{ Form::close()}}
			</div>
			<hr/>
			<div class="col-md-8">
				{{ Form::open(array('route' => array('update.name'), 'method' => 'put', 'class' => 'form-control')) }}
					{{ Form::label('first_name', 'First Name')}}
					{{ Form::text('first_name', Auth::user()->first_name, array('class' => 'form-group'))}}

					{{ Form::label('last_name', 'Last Name')}}
					{{ Form::text('last_name', Auth::user()->last_name, array('class' => 'form-group'))}}

					{{ Form::submit('Submit')}}
				{{ Form::close()}}
			</div>
			<div class="col-md-8">
				{{ Form::open(array('route' => 'update.icon', 'method' => 'post', 'class' => 'form', 'files' => 'true')) }}
		        {{ Form::file('icon', array('class' => 'form-control-upload btn btn-primary' )) }}
		        {{ Form::submit('Update icon', array('class'=>'btn btn-primary')) }}
		        {{ Form::close() }}

		         {{link_to_route('default.icon', 'Get default icon instead')}}

		        {{ HTML::image(Auth::user()->icon->icon_url, '', array('class' =>'img-rounded img-responsive' )) }}
		</div>
@stop