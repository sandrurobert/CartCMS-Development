@extends('layout')
	@section('content')


	<h1>You are now on site settings</h1>
	{{ Form::open(array('route' => 'site.settings', 'method' => 'post', 'class' => 'form')) }}
		{{Form::label('title', 'Title')}}
		{{Form::text('title', $settings['title'], array('class' => 'form-control'))}}

		{{Form::label('keywords', 'Keywords')}}
		{{Form::text('keywords', $settings['keywords'], array('class' => 'form-control'))}}

		{{Form::label('description', 'description')}}
		{{Form::text('description', $settings['description'], array('class' => 'form-control'))}}

		{{Form::submit('Update', array('class' => 'btn btn-primary'))}}
	{{ Form::close()}}

@stop