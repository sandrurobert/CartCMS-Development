<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		{{ HTML::style('css/style.css'); }}
		{{ HTML::script('js/jquery-1.11.1.min.js'); }}
		{{ HTML::script('js/custom.js'); }}
	</head>

	<body>
		<div class="row">
			<div id="dashNavTop" class="col-md-12">
				{{Auth::user()->email}}
			</div>
		</div><!-- top bar navigation row -->

		<div id="dashLogoHolder" class="row">
			<div class="col-md-2 col-md-offset-5">
				<img src="{{asset('img/base/logo_black.png')}}" class="img-responsive centerize" alt="logo" />
			</div>
		</div>

		<div id="dashContentHolder" class="row">
			<div id="dashContent" class="col-md-10 col-md-offset-1 no-padding">
				<div id="dashNavLeft" class="col-md-2 no-padding">
					<ul class="col-md-12">
						<li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
						<li><a href="{{route('site.settings')}}">Site Settings</a></li>
						<li class="parentLi"><a href="#">Security Settings</a>
							<ul>
								<li><a href="#">General settings</a></li>
								<li><a href="#">Website trackers</a></li>
								<li><a href="#">Captcha & antispam</a></li>
							</ul>
						</li>
						<li class="parentLi"><a href="#">User Settings</a>
							<ul>
								<li><a href="#">Create a new user</a></li>
								<li><a href="#">Edit an user</a></li>
								<li><a href="{{route('user.settings')}}">Your Profile, {{Auth::user()->first_name;}}</a></li>
								<li><a href="{{route('change.rank')}}">User permissions</a></li>
							</ul>
						</li>
						<li class="parentLi"><a href="#">Products</a>
							<ul>
								<li><a href="#">Add a new product</a></li>
								<li><a href="#">Check all products</a></li>
								<li><a href="#">Categories</a></li>
								<li><a href="#">Resealed products</a></li>
								<li><a href="#">Defective products</a></li>
								<li><a href="#">Sales History</a></li>
							</ul>
						</li>
						<li class="parentLi"><a href="#">Customers</a>
							<ul>
								<li><a href="#">Check customers</a></li>
								<li><a href="#">Reviews</a></li>
								<li><a href="#">Employee abuses</a></li>
							</ul>
						</li>
						<li class="parentLi"><a href="#">Categories</a>
							<ul>
								<li><a href="#">Check categories</a></li>
								<li><a href="#">Add a new category</a></li>
								<li><a href="#">Most visited categories</a></li>
							</ul>
						</li>
						<li><a href="#">Shipping Plans</a></li>
						<li><a href="{{route('user.logout')}}">Sign out</a></li>
					</ul>
				</div><!-- dashNavLeft -->

				<div class="col-md-10 no-padding">
					@yield('content')
				</div>
			</div><!-- dashContent -->
		</div><!-- dashContentHolder -->
	</body>
</html>

