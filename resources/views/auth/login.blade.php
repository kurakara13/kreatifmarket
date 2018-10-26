@extends('layouts.app-all')
@section('style')
@stop
@section('content')
<div id="sign-in-dialog" class="zoom-anim-dialog dialog-with-tabs">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li class="active"><a href="#login">Log In</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Login -->
			<div class="popup-tab-content" id="login" style="">

				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>We're glad to see you again!</h3>
					<span>Don't have an account? <a href="{{url('register')}}">Sign Up!</a></span>
				</div>

				<!-- Form -->
				<form method="POST" action="{{ route('user.login.submit') }}" id="login-form">
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
				<div class="social-login-buttons">
					<button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Log In via Facebook</button>
					<button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Log In via Google+</button>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
@stop
