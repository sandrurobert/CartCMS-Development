@extends('layout')
	@section('content')


	<h1>User global settings</h1>
		<div class="col-md-12">
			<div class="col-md-6">
				{{ Form::open(array('route' => array('update.password', $user->id), 'method' => 'put', 'class' => 'form-control')) }}
					{{ Form::label('old_pass', 'Old Password')}}
					{{ Form::password('old_pass', null, array('class' => 'form-group'))}}

					{{ Form::label('new', 'New Password')}}
					{{ Form::password('new', array('class' => 'form-group'))}}

					{{ Form::label('new2', 'New Password Again')}}
					{{ Form::password('new2', array('class' => 'form-group'))}}

					{{ Form::submit('Submit')}}
				{{ Form::close()}}
			</div>
		</div>
@stop