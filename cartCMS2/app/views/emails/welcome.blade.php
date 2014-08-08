<!DOCTYPE html>

<html>
	<head>

	</head>

	<body>
		 Hi there {{ $email }}! You we're invited by an owner to join CartCMS as a/an {{ $rank }}!

		 Please follow the link below to register on Cart CMS!

		 <a href="{{route('user.invited', $token)}}">Follow this link to continue your registration! >></a>
	</body>
</html>s