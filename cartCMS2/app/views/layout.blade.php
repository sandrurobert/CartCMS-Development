<!DOCTYPE html>

<html>
	<head>
		<meta charset="utf-8">
		{{ HTML::style('css/style.css'); }}
		{{ HTML::script('js/jquery-1.11.1.min.js'); }}
		{{ HTML::script('js/custom.js'); }}
	</head>

	<body>

		@include('top_bar')

		<div id="dashLogoHolder" class="row">
			<div class="col-md-2 col-md-offset-5">
				<img src="{{asset('img/base/logo_black.png')}}" class="img-responsive centerize" alt="logo" />
			</div>
		</div>

		<div id="dashContentHolder" class="row">
			<div id="dashContent" class="col-md-10 col-md-offset-1 no-padding">
				@include('layout_left_menu')

				@if (Auth::check())
					<div class="col-md-10 no-padding">
						@yield('content')
					</div>
				@endif

				@if (!Auth::check())
					<div class="col-md-12 no-padding">
						@yield('content')
					</div>
				@endif
			</div><!-- dashContent -->
		</div><!-- dashContentHolder -->


		<div id="dashFooterHolder" class="row">
			<div id="dashFooterContainer" class="col-md-12">
				More details such as online workers, administrators and customers.
			</div>
		</div><!--dashFooterHolder-->
	</body>
</html>

