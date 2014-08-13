@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.task_index')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		
		@foreach($types as $type)

			<h1>{{$type->name}}</h1>
			<p>Added be :{{$type->added_by_id}} </p>
			{{link_to_route('task_type.edit', 'Edit', $type->id)}}
			{{link_to_route('task_type.destroy', 'Delete', $type->id)}}
		@endforeach
	</div>

@stop