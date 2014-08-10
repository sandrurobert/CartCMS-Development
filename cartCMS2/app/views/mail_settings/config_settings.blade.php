@extends('layout')
	@section('content')


	<div class="col-md-12">
		<h1 id="dashPageTitle">{{Lang::get('pages.mail_settings')}}</h2>
	</div>

	<div class="col-md-12">
		@include('notifications')
		{{ Form::open(array('route' => 'mail.config', 'method' => 'put', 'class' => 'form-inline')) }}

		<div id="boxInputs_Inline">
			{{Form::label('driver', Lang::get('mail_settings.driver'))}}
			{{Form::text('driver', $settings['driver'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('host', Lang::get('mail_settings.host'))}}
			{{Form::text('host', $settings['host'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('port', Lang::get('mail_settings.port'))}}
			{{Form::text('port', $settings['port'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('address', Lang::get('mail_settings.address'))}}
			{{Form::text('address', $settings['address'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('name', Lang::get('mail_settings.name'))}}
			{{Form::text('name', $settings['name'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('encryption', Lang::get('mail_settings.encryption'))}}
			{{Form::text('encryption', $settings['encryption'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('username', Lang::get('mail_settings.username'))}}
			{{Form::text('username', $settings['username'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('password', Lang::get('mail_settings.password'))}}
			{{Form::text('password', $settings['password'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('sendmail', Lang::get('mail_settings.sendmail'))}}
			{{Form::text('sendmail', $settings['sendmail'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::label('pretend', Lang::get('mail_settings.pretend'))}}
			{{Form::text('pretend', $settings['pretend'], array('class' => 'basicInput form-control importantInput'))}}
		</div>

		<div id="boxInputs_Inline">
			{{Form::submit(Lang::get('mail_settings.update'), array('class' => 'redBtn width-20 right'))}}
		</div>
		{{ Form::close()}}
		<div id="boxInputs_Inline" class="no-padding">
			<a href="{{route('mail.config.default.values')}}">Restore to default values</a>
		</div>
	</div>
@stop