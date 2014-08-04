@extends('layout')
	@section('content')


	<h1>You are now on dashboard. Welcome {{Auth::user()->first_name}}. You are 
	{{Auth::user()->roles->first()->name}}
	</h1>
@stop