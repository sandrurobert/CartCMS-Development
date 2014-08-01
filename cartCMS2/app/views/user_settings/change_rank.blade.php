@extends('layout')
	@section('content')


	<h1>Change user rank</h1>
	@foreach($users as $user)
		<div class="col-md-12">
			<div class="col-md-6">
				{{$user->email}} - {{$user->roles->first()->name}}
			</div>
			<div class="col-md-6">
				{{ Form::open(array('route' => array('change.rank', $user->id), 'method' => 'put', 'class' => 'form')) }}
					{{ Form::select('rank_id', $ranks, $user->roles->first()->id, array('class' => 'form-control category-dropdown')) }}
					{{ Form::submit('Submit')}}
				{{Form::close()}}
			</div>
		</div>
	@endforeach
@stop