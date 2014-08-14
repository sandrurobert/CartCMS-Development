@if (Auth::check())

				<div id="dashNavLeft" class="col-md-2 no-padding">
					<ul class="col-md-12">
						<li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
						<li class="parentLi"><a>Settings</a>
							<ul class="childUl">
								<li><a href="{{route('site.settings')}}">Site Settings</a></li>
								<li><a href="{{route('mail.config')}}">Mail Settings</a></li>
								<li class="parentLi2"><a href="#">Security Settings</a>
									<ul class="childUl2">
										<li><a href="{{route('security.general')}}">General Security</a></li>
										<li><a href="#">Captcha's and antispam</a></li>
									</ul>
								</li>
								<li class="parentLi2"><a>User Settings</a>
									<ul class="childUl2">
										<li><a href="{{route('user.create')}}">Create a new user</a></li>
										<li><a href="{{route('user.editUsers')}}">Edit an user</a></li>
										<li><a href="{{route('user.settings')}}">Your Profile, {{Auth::user()->first_name;}}</a></li>
										<li><a href="{{route('change.rank')}}">User permissions</a></li>
									</ul>
								</li>
							</ul>
						</li>
						
						<li class="parentLi"><a>Tasks</a>
							<ul class="childUl">
								@if(Auth::user()->hasRole('Owner') || Auth::user()->hasRole('Admin'))
									<li><a href="{{route('task.index')}}">All tasks</a></li>
									<li><a href="{{route('task.create')}}">Create Task</a></li>
									<li><a href="{{route('task_type.create')}}">Add Task Type</a></li>
									<li><a href="{{route('task_type.index')}}">View/Edit Task Types</a></li>
								@endif
									<li><a href="{{route('my.tasks')}}">My tasks</a></li>
							</ul>
						</li>
						<li class="parentLi"><a>Products</a>
							<ul class="childUl">
								<li><a href="#">Add a new product</a></li>
								<li><a href="#">Check all products</a></li>
								<li><a href="#">Categories</a></li>
								<li><a href="#">Resealed products</a></li>
								<li><a href="#">Defective products</a></li>
								<li><a href="#">Sales History</a></li>
							</ul>
						</li>
						<li class="parentLi"><a>Customers</a>
							<ul class="childUl">
								<li><a href="#">Check customers</a></li>
								<li><a href="#">Reviews</a></li>
								<li><a href="#">Employee abuses</a></li>
							</ul>
						</li>
						<li class="parentLi"><a>Categories</a>
							<ul class="childUl">
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