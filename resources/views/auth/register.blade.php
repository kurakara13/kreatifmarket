@extends('layouts.app-all')

@section('content')
<div id="sign-in-dialog" class="zoom-anim-dialog dialog-with-tabs">
  <div class="sign-in-form">

		<ul class="popup-tabs-nav">
			<li class="active"><a href="#register">Register</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Login -->
			<div class="popup-tab-content" id="register" style="">

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
   	 	   <div class="login-form-section">
           <div class="login-content">
             <form method="POST" action="{{ route('register') }}">
               {{ csrf_field() }}
                 <div class="textbox-wrap">
                     <div class="input-with-icon-left">
                         <i class="icon-feather-user"></i>
                         <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>

                         @if ($errors->has('name'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('name') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="textbox-wrap">
                     <div class="input-with-icon-left">
                         <i class="icon-feather-user-check"></i>
                         <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>

                         @if ($errors->has('username'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('username') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="textbox-wrap">
                     <div class="input-with-icon-left">
                         <i class="icon-material-baseline-mail-outline"></i>
                         <input id="email" type="email" class="input-text with-border{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

                         @if ($errors->has('email'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('email') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="textbox-wrap">
                     <div class="input-with-icon-left">
                         <i class="icon-feather-phone-call"></i>
                         <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                         @if ($errors->has('phone'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('phone') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="textbox-wrap">
                     <div class="input-group">
                         <span class="input-group-addon "><i class="fa fa-email"></i></span>
                         <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Your Password" required>

                         @if ($errors->has('password'))
                             <span class="invalid-feedback">
                                 <strong>{{ $errors->first('password') }}</strong>
                             </span>
                         @endif
                     </div>
                 </div>

                 <div class="textbox-wrap">
                     <div class="input-group">
                         <span class="input-group-addon "><i class="fa fa-email"></i></span>
                          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Reply Your Password" required>
                     </div>
                 </div>
                 <button class="margin-top-10 button full-width button-sliding-icon" type="submit" style="width: 30px;">Register <i class="icon-material-outline-arrow-right-alt"></i></button>
             </form>
             <div class="social-login-separator"><span>or</span></div>
             <div class="social-login-buttons">
               <button class="facebook-login ripple-effect"><i class="icon-brand-facebook-f"></i> Register via Facebook</button>
               <button class="google-login ripple-effect"><i class="icon-brand-google-plus-g"></i> Register via Google+</button>
             </div>
             <br><br>
   					<div class="login-bottom">
   					 <div class="social-icons">
   						<h4>Do you have an Account? <a href="{{url('login')}}"> Login Now!</a></h4>
   					 </div>
            </div>
           </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
