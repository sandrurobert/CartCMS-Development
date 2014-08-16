<!DOCTYPE html>

<html>
	<head>

	</head>

	<body>
		 Hi there {{ $email }}! You choose to reset your password!

		 Here is the new password :: {{ $newPass}}

		 <a href="{{route('login.page')}}">Follow this link to login! >> </a>
	</body>
</html>