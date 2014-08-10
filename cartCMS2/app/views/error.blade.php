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
				<div class="col-md-12 no-padding">
					<h1 id="errorTitle">ERROR</h1>
				</div>
				<div class="col-md-12 no-padding" style="text-align: center;">
					@include('notifications')
				</div>
			</div><!-- dashContent -->
		</div><!-- dashContentHolder -->