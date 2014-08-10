@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.user_view_users', array('nr' => $users->nr))}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
	</div>

	<div class="col-md-12" style="padding-top: 1%;padding-bottom: 1%;">
		<table id="dark_table">
			<tr>
				<th>ID</th>
				<th>Full name</th>
				<th>E-mail</th>
				<th>Grade</th>
				<th>Option</th>
			</tr>

				@foreach ($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->first_name}} {{$user->last_name}}</td>
						<td>{{$user->email}}</td>
						<td>{{$user->roles->first()->name}}</td>
						<td><a href="{{route('edit.user', $user->id)}}">Edit</a></td>
					</tr>
				@endforeach
		</table>
	</div>
@stop