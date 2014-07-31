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
			<div id="dashNavLeft" class="col-md-2">
				<div id="dashNavLeftLogo" class="col-md-12">
					<div class="col-md-8 col-md-offset-2">
						<img src="img/base/logo.png" class="img-responsive centerize" alt="logo" />
					</div>
				</div>
				<ul class="col-md-12">
					<li><a href="#">Dashboard</a></li>
					<li class="parentLi"><a href="#">User Settings</a>
						<ul>
							<li><a href="#">Create a new user</a></li>
							<li><a href="#">Edit an user</a></li>
							<li><a href="#">User global settings</a></li>
							<li><a href="#">User permissions</a></li>
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

			<div id="dashNavTop" class="col-md-10">
				<div class="col-md-3 col-md-offset-9">
					<div class="col-md-6">
						<ul id="notificationsButton">
							<li class="parentLi"><img src="img/icons/bell.png" alt="Notifications"/>
								<ul>
									<li><a href="#">Notification 1</a></li>
									<li><a href="#">Notification 2</a></li>
									<li><a href="#">Notification 3</a></li>
									<li><a href="#">Notification 4</a></li>
								</ul>
							</li>
							<li class="parentLi"><img src="img/icons/flag.png" alt="Task" alt="Tasks"/>
								<ul>
									<li><a href="#">Task 1</a></li>
									<li><a href="#">Task 2</a></li>
									<li><a href="#">Task 3</a></li>
									<li><a href="#">Task 4</a></li>
									<li><a href="#">Task 5</a></li>
								</ul>
							</li>
						</ul><!--notificationsButton-->
					</div>
					<div class="col-md-6">
						pics
					</div>
				</div>
			</div><!-- dashNavTop -->
			@yield('content')
		</div><!-- main row -->


	</body>
</html>