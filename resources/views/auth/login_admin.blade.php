<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>KreatifMarket.id</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

<!-- Custom Theme files -->
<link href="{{asset('css/bootstrap-grid.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/icons.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/style.css?v=1')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('css/colors/blue.css')}}" rel='stylesheet' type='text/css' />

@yield('style')
<!----font-Awesome----->
</head>
<body>
<div id="wrapper">

	<div class="clearfix"></div>

	<div id="sign-in-dialog" class="zoom-anim-dialog dialog-with-tabs">

		<!--Tabs -->
		<div class="sign-in-form">

			<ul class="popup-tabs-nav">
				<li class="active"><a href="#login">Log In</a></li>
				<!-- <li><a href="#register">Register</a></li> -->
			</ul>

			<div class="popup-tabs-container">

				<!-- Login -->
				<div class="popup-tab-content" id="login" style="">

					<!-- Welcome Text -->
					<div class="welcome-text">
						<h3>Welcome Admin!</h3>
					</div>

					<!-- Form -->
					<form method="POST" action="{{ route('admin.login.submit') }}" id="login-form">
	          {{ csrf_field() }}
						<div class="input-with-icon-left">
							<i class="icon-material-baseline-mail-outline"></i>
							<input id="email" type="email" class="input-text with-border" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
	            @if ($errors->has('email'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('email') }}</strong>
	                </span>
	            @endif
	          </div>

						<div class="input-with-icon-left">
							<i class="icon-material-outline-lock"></i>
							<input id="password" type="password" class="input-text with-border" name="password" id="password" placeholder="Password">
	            @if ($errors->has('password'))
	                <span class="invalid-feedback">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	            @endif
						</div>
						<a href="#" class="forgot-password">Forgot Password?</a>
					</form>

					<!-- Button -->
					<button class="button full-width button-sliding-icon ripple-effect" type="submit" form="login-form" style="width: 30px;">Log In <i class="icon-material-outline-arrow-right-alt"></i></button>

					<!-- Social Login -->
					<div class="social-login-separator"><span>or</span></div>
					<!-- <div class="social-login-buttons">
						<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
						<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
					</div> -->

				</div>

				<!-- Register -->
				<div class="popup-tab-content" id="register" style="display: none;">

					<!-- Welcome Text -->
					<div class="welcome-text">
						<h3>Let's create your account!</h3>
					</div>

					<!-- Account Type -->
					<div class="account-type">
						<div>
							<input type="radio" name="account-type-radio" id="freelancer-radio" class="account-type-radio" checked="">
							<label for="freelancer-radio" class="ripple-effect-dark"><i class="icon-material-outline-account-circle"></i> Freelancer</label>
						</div>

						<div>
							<input type="radio" name="account-type-radio" id="employer-radio" class="account-type-radio">
							<label for="employer-radio" class="ripple-effect-dark"><i class="icon-material-outline-business-center"></i> Employer</label>
						</div>
					</div>

					<!-- Form -->
					<form method="post" id="register-account-form">
						<div class="input-with-icon-left">
							<i class="icon-material-baseline-mail-outline"></i>
							<input type="text" class="input-text with-border" name="emailaddress-register" id="emailaddress-register" placeholder="Email Address" required="">
						</div>

						<div class="input-with-icon-left" data-tippy-placement="bottom" data-tippy="" data-original-title="Should be at least 8 characters long">
							<i class="icon-material-outline-lock"></i>
							<input type="password" class="input-text with-border" name="password-register" id="password-register" placeholder="Password" required="">
						</div>

						<div class="input-with-icon-left">
							<i class="icon-material-outline-lock"></i>
							<input type="password" class="input-text with-border" name="password-repeat-register" id="password-repeat-register" placeholder="Repeat Password" required="">
						</div>
					</form>

					<!-- Button -->
					<button class="margin-top-10 button full-width button-sliding-icon ripple-effect" type="submit" form="register-account-form" style="width: 30px;">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

					<!-- Social Login -->
					<div class="social-login-separator"><span>or</span></div>
					<div class="social-login-buttons">
						<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
						<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
					</div>

				</div>

			</div>
		</div>
	</div>

		<!-- Footer / End -->

</div>

	<!-- Wrapper / End -->


	<!-- Scripts
	================================================== -->
	<script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
	<script src="{{url('js/tippy.all.min.js')}}"></script>
	<script src="{{url('js/bootstrap-slider.min.js')}}"></script>
	<script src="{{url('js/clipboard.min.js')}}"></script>
	<script src="{{url('js/magnific-popup.min.js')}}"></script>
	<script src="{{url('js/slick.min.js')}}"></script>
	<script src="{{url('js/custom.js?v=1')}}"></script>


	</body>
	</html>
