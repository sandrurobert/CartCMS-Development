<!DOCTYPE html>

<html>
	<head>

	</head>

	<body>
		 Hi there! Please follow this link to register on Cart CMS!
		 {{$welcome}}

		 <a href="{{route('user.invited', $token)}}">Follow this link</a>
	</body>
</html>