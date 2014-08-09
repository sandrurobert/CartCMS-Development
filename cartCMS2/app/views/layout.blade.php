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
				<div id="dashNavTopLeft" class="col-md-6 col-md-offset-3">
					<ul>
						<li id="1" class="slideTopBar"><img src="{{asset('img/icons/bell_black.png')}}" alt="Bell"/></li>
						<li id="2" class="slideTopBar"><img src="{{asset('img/icons/flag_black.png')}}" alt="Flag"/></li>
						<li id="3" class="slideTopBar"><img src="{{asset('img/icons/user_black.png')}}" alt="Man"/></li>
					</ul>
				</div>
			</div>
		</div><!-- top bar navigation row -->

		<div id="slideCarousel" class="row">
			<div class="col-md-6 col-md-offset-3 divParent">
				<div id="notificationsCarousel" class="slidable">
					<div id="slideCarouselIcon" class="col-md-12">
						<img src="{{asset('img/icons/bell.png')}}" alt="Bell" class="img-responsive centerize" />
					</div>
					<div id="slideCarouselTitle" class="col-md-12">
						<h1>NOTIFICATIONS</h1>
					</div>
					<div id="slideCarouselList" class="col-md-12">
						<ul>
							<li><a href="#">&#9679; Robert Sandru deleted 18 products from Pet Food category. Reason: 'Old Cat food'</a></li>
							<li><a href="#">&#9679; Alex Radoi added 182 products in Vehicle Components category. Mention: '150 wheels and 32 engines'</a></li>
							<li><a href="#">&#9679; Arba Alexandru finished a dispute with a customer. Mention: 'Da-l ma in gatu ma-sii ca ne baga firma in faliment!!!'</a></li>
							<li><a href="#">&#9679; The customer Banyacskay Wener bought: 'A full of Tutorials Truck (pid: #666)'. Please process the order!</a></li>
							<li><a href="#">&#9679; The customer Barbuceanu Lucica bought: 'Porc 150kg (pid: #667)'. Please process the order!</a></li>
						</ul>
					</div>
				</div>
				<div id="tasksCarousel" class="slidable">
					<div id="slideCarouselIcon" class="col-md-12">
						<img src="{{asset('img/icons/flag.png')}}" alt="Bell" class="img-responsive centerize" />
					</div>
					<div id="slideCarouselTitle" class="col-md-12">
						<h1>TASKS</h1>
					</div>
					<div id="slideCarouselList" class="col-md-12">
						<ul>
							<li><a href="#">&#9679; Add 149 mobile phones. ( +50$ )</a></li>
							<li><a href="#">&#9679; Edit the computers preview images. ( +20$ )</a></li>
						</ul>
					</div>
				</div>
				<div id="usersCarousel" class="slidable">
					userssadsadsadsad
				</div>
			</div>
		</div>


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
								<li><a href="{{route('security.general')}}">General settings</a></li>
								<li><a href="#">Website trackers</a></li>
								<li><a href="#">Captcha & antispam</a></li>
							</ul>
						</li>
						<li class="parentLi"><a href="#">User Settings</a>
							<ul>
								<li><a href="{{route('user.create')}}">Create a new user</a></li>
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


		<div id="dashFooterHolder" class="row">
			<div id="dashFooterContainer" class="col-md-12">
				More details such as online workers, administrators and customers.
			</div>
		</div><!--dashFooterHolder-->
	</body>
</html>

