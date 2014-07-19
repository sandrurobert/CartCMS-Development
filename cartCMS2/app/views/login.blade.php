<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		{{ HTML::script('js/jquery-1.11.1.min.js'); }}
		{{ HTML::script('js/custom.js'); }}
	</head>
	<body>
		<h2>Login</h2>
		{{ Form::open(array('route' => 'user.login', 'method' => 'post', 'class' => 'form-login')) }}
			{{Form::text('username', null, array('placeholder' => 'Username', 'class' => 'username-login', 'id' => 'username'))}}
			{{Form::password('password', array('id' => 'password', 'class' => 'password-login'))}}
			{{ Form::submit('Login', array('class' => 'submit', 'id' => 'submit-login'))}}
		{{Form::close()}}
		
		@include('notifications')
	</body>
</html>
