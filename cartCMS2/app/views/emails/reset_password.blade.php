<!DOCTYPE html>

<html>
	<head>

	</head>

	<body>
		 Hi there {{ $email }}! You choose to reset your password!

		 Please follow the link below to reset password on Cart CMS!

		 <a href="{{route('password.check.token', $token)}}">Follow this link to continue reset! >> </a>
	</body>
</html>