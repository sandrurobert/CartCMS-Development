@extends('layout')
	@section('content')


	<h1>You are now on dashboard. Welcome {{Auth::user()->first_name}}. You are 
	@foreach(Auth::user()->roles as $role)
		{{$role->name}}
	@endforeach
	</h1>
@stop