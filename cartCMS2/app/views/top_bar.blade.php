@if (Auth::check())

		<div class="row">
			<div id="dashNavTop" class="col-md-12">
				<div id="dashNavTopLeft" class="col-md-6 col-md-offset-3">
					<ul>
						<li id="1" class="slideTopBar"><img src="{{asset('img/icons/bell_black.png')}}" alt="Bell"/> <span data-task-url="{{route('tasks.count')}}" id="task_counter"></span></li>
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
					<div id="slideCarouselIcon" class="col-md-12">
						{{ HTML::image(Auth::user()->icon->icon_url, '', array('class' =>'img-responsive img-rounded centerize' )) }}
					</div>
					<div id="slideCarouselTitle" class="col-md-12">
						<h1 style="margin-bottom: 0px;">{{ Auth::user()->first_name }} {{Auth::user()->last_name}}</h1>
						<h2 style="margin-bottom: 9px;">{{ Auth::user()->roles->first()->name }}</h2>
					</div>
					<div id="slideCarouselList" class="col-md-12">
						<ul>
							<li><a href="{{ route('user.settings') }}">&#9679; Edit your profile</a></li>
							<li><a href="#">&#9679; Historic</a></li>
							<li><a href="#">&#9679; My top added products</a></li>
							<li><a href="{{ route('user.logout') }}">&#9679; Sign out</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>

@endif