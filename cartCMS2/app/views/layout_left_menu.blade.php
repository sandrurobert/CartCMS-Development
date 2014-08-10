@if (Auth::check())

				<div id="dashNavLeft" class="col-md-2 no-padding">
					<ul class="col-md-12">
						<li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
						<li><a href="{{route('site.settings')}}">Site Settings</a></li>
						<li><a href="{{route('mail.config')}}">Mail Settings</a></li>
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

@endif