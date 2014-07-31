@extends('layout')
	@section('content')


	<h1>You are now on dashboard. Welcome {{Auth::user()->first_name}}</h1>
@stop