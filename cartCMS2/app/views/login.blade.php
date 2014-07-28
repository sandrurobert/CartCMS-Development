<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
		{{ HTML::style('css/style.css'); }}
		{{ HTML::script('js/jquery-1.11.1.min.js'); }}
		{{ HTML::script('js/custom.js'); }}
	</head>
	<body style="background: #293a4b;" >

	    <div id="login-row" class="row fadeIn" >
	      <div class="col-md-2 col-md-offset-5" >
	        <img src="{{asset('img/base/logo.png')}}" class="img-responsive centerize" alt="Logo" />
	      </div>
	    </div>  <!-- login-row-->
		<div class="row fadeIn">
	      <div class="col-md-4 col-md-offset-4">
	        <div class="box blueBox">
	          <div class="boxHeader">
	            <h4 class="boxHeaderTitle">
	              <img class="boxHeaderImgLeft" src="{{asset('img/icons/login.png')}}" />
	                Login Box
	            </h4>
	          </div><!-- boxHeader -->

	          <div class="info yellowInfo">
	            <h4 class="infoTitle">
	              <img class="infoTitleImgLeft" src="{{asset('img/icons/info.png')}}" />
	                You're about to login into CartCMS!
	            </h4>
	          </div><!-- information box -->

	          {{ Form::open(array('route' => 'user.login', 'method' => 'post', 'class' => 'boxContainer')) }}
	            <div class="boxInputs">
	              {{Form::text('username', null, array('class' => 'basicInput importantInput', 'title' => 'username', 'placeholder' => 'E-mail'))}}
	            </div>
	            <div class="boxInputs">
	              {{Form::password('password', array('id' => 'password', 'class' => 'basicInput importantInput', 'title' => 'password', 'placeholder' => 'Password'))}}
	            </div>
	            <div class="boxButtons">
	              {{ Form::submit('Sign In', array('class' => 'redBtn width-90', 'id' => 'submit-login'))}}
	            </div><!--  boxButtons  -->
	          {{Form::close()}}<!--  boxContainer  -->
	          @include('notifications')
	        </div><!-- blueBox -->
	        <div class="col-md-6 col-md-offset-6 no-padding">
	          {{ HTML::linkRoute('user.recover', 'Lost Password?', array(), array('id' => 'lostPassword')); }}
	        </div>
	      </div><!--  col-md-4  -->
	    </div>

	</body>
</html>