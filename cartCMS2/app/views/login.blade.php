<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		{{ HTML::style('css/style.css'); }}
		{{ HTML::script('js/jquery-1.11.1.min.js'); }}
		{{ HTML::script('js/custom.js'); }}
	</head>
	<body>
		<div id="container">
			<div id="logo">
				<img src="{{asset('img/logo.png')}}" alt="logo" />
			</div>
			<div id="box">
				<div id="boxHeader">
					<img src="{{asset('img/login.png')}}" alt="login" />
					<div id="boxHeaderp">
						<p>Sign In</p>
					</div>
					<img src="{{asset('img/x.png')}}" class="floatRight" alt="x" />
				</div>
				<div id="infoBox">
					<img src="{{asset('img/info.png')}}" alt="info" />
					<p>You’re about to login into CartCMS</p>
				</div>
				<div id="loginBox">
					{{ Form::open(array('route' => 'user.login', 'method' => 'post', 'class' => 'form-login')) }}
						{{Form::text('username', null, array('placeholder' => 'Username', 'class' => 'username-login', 'id' => 'username', 'title' => 'username'))}}
						{{Form::password('password', array('id' => 'password', 'class' => 'password-login', 'title' => 'password'))}}
						{{ Form::submit('Sign In', array('class' => 'submit', 'id' => 'submit-login'))}}
					{{Form::close()}}
				</div>
			</div>
			<div id="hr"></div>
			<div id="copyrights">
				<p>Copyright @ 2014 UserX & Axxwee</p>
			</div>
		</div>
	</body>
</html>
