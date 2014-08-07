@extends('layout')
	@section('content')

	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.dashboard')}}</h2>
	</div>


	<div class="col-md-12">
		<p>{{Auth::user()->first_name;}}, you are now on dashboard page!</p>
	</div>
@stop