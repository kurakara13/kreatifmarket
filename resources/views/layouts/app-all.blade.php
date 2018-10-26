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

	<!-- Header Container
	================================================== -->
	<header id="header-container" class="fullwidth ">

		<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Left Side Content -->
				<div class="left-side">

					<!-- Logo -->
					<div id="logo">
						<a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
					</div>

					<!-- Main Navigation -->
	        <nav id="navigation">
						<ul id="responsive">
							<li><a href="{{url('/')}}">Home</a></li>

							<li>
								<a href="">Find Work</a>
								<ul class="dropdown-nav">
									<li><a href="#">Browse Jobs (belum design)</a></li>
									<li><a href="#">Browse Tasks (belum design)</a></li>
									<li><a href="#">Browse Companies (belum design)</a></li>
								</ul>
							</li>

							<li>
	              <a href="">For Employers</a>
								<ul class="dropdown-nav">
									<li><a href="#">Find a Freelancer (belum design)</a></li>
									<li><a href="#">Post a Job (belum design	)</a></li>
									<li><a href="{{url('user/dashboard/task/post')}}">Post a Task</a></li>
								</ul>
							</li>
							@if(isset(Auth::user()->email))
							<li>
	              <a href="#">Dashboard</a>
								<ul class="dropdown-nav">
									<li><a href="{{url('/dashboard')}}">Dashboard</a></li>
									<li><a href="#">Messages (belum)</a></li>
									<li><a href="#">Bookmarks (belum)</a></li>
									<li><a href="#">Reviews (belum)</a></li>
									<li>
										<a href="#">Jobs</a>
										<ul class="dropdown-nav">
											<li><a href="#">Manage Jobs (belum)</a></li>
											<li><a href="#">Manage Candidates (belum)</a></li>
											<li><a href="#">Post a Job (belum)</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Tasks</a>
										<ul class="dropdown-nav">
											<li><a href="{{url('user/dashboard/task/manage')}}">Manage Tasks</a></li>
											<li><a href="{{url('user/dashboard/task/my-active-bids')}}">My Active Bids</a></li>
											<li><a href="{{url('user/dashboard/task/post')}}">Post a Task</a></li>
										</ul>
									</li>
									<li><a href="#">Settings (belum)</a></li>
								</ul>
							</li>
							@endif

						</ul>
					</nav>
					<div class="clearfix"></div>
					<!-- Main Navigation / End -->

				</div>
				<!-- Left Side Content / End -->


				<!-- Right Side Content / End -->
	      <div class="right-side">

					@if(isset(Auth::user()->email))
					<!--  User Notifications -->
					<div class="header-widget hide-on-mobile">

						<!-- Notifications -->
						<div class="header-notifications">

							<!-- Trigger -->
							<div class="header-notifications-trigger">
								<a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<div class="header-notifications-headline">
									<h4>Notifications</h4>
									<button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" data-tippy="" data-original-title="Mark all as read">
										<i class="icon-feather-check-square"></i>
									</button>
								</div>

								<div class="header-notifications-content">
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 270px;">
										<div class="simplebar-track vertical" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 192px;"></div>
										</div>
										<div class="simplebar-track horizontal" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
										</div>
										<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
											<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
												<ul>
													<!-- Notification -->
													<li class="notifications-not-read">
														<a href="#">
															<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
															<span class="notification-text">
																<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>

						<!-- Messages -->
						<div class="header-notifications">
							<div class="header-notifications-trigger">
								<a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<div class="header-notifications-headline">
									<h4>Messages</h4>
									<button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" data-tippy="" data-original-title="Mark all as read">
										<i class="icon-feather-check-square"></i>
									</button>
								</div>

								<div class="header-notifications-content">
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 288px;">
										<div class="simplebar-track vertical" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 183px;"></div>
										</div>
										<div class="simplebar-track horizontal" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
										</div>
										<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
											<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
												<ul>
													<!-- Notification -->
													<li class="notifications-not-read">
														<a href="#">
															<span class="notification-avatar status-online"><img src="{{asset('images/user-avatar-small-03.jpg')}}" alt=""></span>
															<div class="notification-text">
																<strong>David Peterson</strong>
																<p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
																<span class="color">4 hours ago</span>
															</div>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<a href="dashboard-messages.html" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
							</div>
						</div>

					</div>
					<!--  User Notifications / End -->

					<!-- User Menu -->
					<div class="header-widget">

						<!-- Messages -->
						<div class="header-notifications user-menu">
							<div class="header-notifications-trigger">
								<a href="#"><div class="user-avatar status-online"><img src="{{asset('images/user-avatar-small-01.jpg')}}" alt=""></div></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-online"><img src="{{asset('images/user-avatar-small-01.jpg')}}" alt=""></div>
										<div class="user-name">
											Tom Smith <span>Freelancer</span>
										</div>
									</div>

									<!-- User Status Switcher -->
									<div class="status-switch" id="snackbar-user-status">
										<label class="user-online current-status">Online</label>
										<label class="user-invisible">Invisible</label>
										<!-- Status Indicator -->
										<span class="status-indicator" aria-hidden="true"></span>
									</div>
							</div>

							<ul class="user-menu-small-nav">
								<li><a href="{{url('user/dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
								<li><a href="#"><i class="icon-material-outline-settings"></i> Settings (belum)</a></li>
								<li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										<i class="icon-material-outline-power-settings-new"></i> Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
									</form>
								</li>

							</ul>

							</div>
						</div>

					</div>
					@else
					<div class="header-widget">
						<a href="{{url('login')}}" class="log-in-button"><i class="icon-feather-log-in"></i> <span>Log In / Register</span></a>
					</div>
					@endif

					<!-- Mobile Navigation Button -->
					<span class="mmenu-trigger">
						<button class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</span>

				</div>
				<!-- Right Side Content / End -->

			</div>
		</div>
		<!-- Header / End -->

	</header>
	<header id="header-container" class="fullwidth cloned unsticky">

		<!-- Header -->
		<div id="header">
			<div class="container">

				<!-- Left Side Content -->
				<div class="left-side">

					<!-- Logo -->
					<div id="logo">
						<a href="{{url('/')}}"><img src="{{asset('images/logo.png')}}" alt=""></a>
					</div>

					<!-- Main Navigation -->
	        <nav id="navigation">
						<ul id="responsive">
							<li><a href="{{url('/')}}">Home</a></li>

							<li>
								<a href="">Find Work</a>
								<ul class="dropdown-nav">
									<li><a href="#">Browse Jobs (belum design)</a></li>
									<li><a href="#">Browse Tasks (belum design)</a></li>
									<li><a href="#">Browse Companies (belum design)</a></li>
								</ul>
							</li>

							<li>
	              <a href="">For Employers</a>
								<ul class="dropdown-nav">
									<li><a href="#">Find a Freelancer (belum design)</a></li>
									<li><a href="#">Post a Job (belum design	)</a></li>
									<li><a href="{{url('user/dashboard/task/post')}}">Post a Task</a></li>
								</ul>
							</li>
							@if(isset(Auth::user()->email))
							<li>
	              <a href="#">Dashboard</a>
								<ul class="dropdown-nav">
									<li><a href="{{url('/dashboard')}}">Dashboard</a></li>
									<li><a href="#">Messages (belum)</a></li>
									<li><a href="#">Bookmarks (belum)</a></li>
									<li><a href="#">Reviews (belum)</a></li>
									<li>
										<a href="#">Jobs</a>
										<ul class="dropdown-nav">
											<li><a href="#">Manage Jobs (belum)</a></li>
											<li><a href="#">Manage Candidates (belum)</a></li>
											<li><a href="#">Post a Job (belum)</a></li>
										</ul>
									</li>
									<li>
										<a href="#">Tasks</a>
										<ul class="dropdown-nav">
											<li><a href="{{url('user/dashboard/task/manage')}}">Manage Tasks</a></li>
											<li><a href="{{url('user/dashboard/task/my-active-bids')}}">My Active Bids</a></li>
											<li><a href="{{url('user/dashboard/task/post')}}">Post a Task</a></li>
										</ul>
									</li>
									<li><a href="#">Settings (belum)</a></li>
								</ul>
							</li>
							@endif

						</ul>
					</nav>
					<div class="clearfix"></div>
					<!-- Main Navigation / End -->

				</div>
				<!-- Left Side Content / End -->


				<!-- Right Side Content / End -->
	      <div class="right-side">

					@if(isset(Auth::user()->email))
					<!--  User Notifications -->
					<div class="header-widget hide-on-mobile">

						<!-- Notifications -->
						<div class="header-notifications">

							<!-- Trigger -->
							<div class="header-notifications-trigger">
								<a href="#"><i class="icon-feather-bell"></i><span>4</span></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<div class="header-notifications-headline">
									<h4>Notifications</h4>
									<button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" data-tippy="" data-original-title="Mark all as read">
										<i class="icon-feather-check-square"></i>
									</button>
								</div>

								<div class="header-notifications-content">
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 270px;">
										<div class="simplebar-track vertical" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 192px;"></div>
										</div>
										<div class="simplebar-track horizontal" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
										</div>
										<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
											<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
												<ul>
													<!-- Notification -->
													<li class="notifications-not-read">
														<a href="#">
															<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
															<span class="notification-text">
																<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>

						<!-- Messages -->
						<div class="header-notifications">
							<div class="header-notifications-trigger">
								<a href="#"><i class="icon-feather-mail"></i><span>3</span></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<div class="header-notifications-headline">
									<h4>Messages</h4>
									<button class="mark-as-read ripple-effect-dark" data-tippy-placement="left" data-tippy="" data-original-title="Mark all as read">
										<i class="icon-feather-check-square"></i>
									</button>
								</div>

								<div class="header-notifications-content">
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 288px;">
										<div class="simplebar-track vertical" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 183px;"></div>
										</div>
										<div class="simplebar-track horizontal" style="visibility: visible;">
											<div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div>
										</div>
										<div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;">
											<div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
												<ul>
													<!-- Notification -->
													<li class="notifications-not-read">
														<a href="#">
															<span class="notification-avatar status-online"><img src="{{asset('images/user-avatar-small-03.jpg')}}" alt=""></span>
															<div class="notification-text">
																<strong>David Peterson</strong>
																<p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
																<span class="color">4 hours ago</span>
															</div>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>

								<a href="dashboard-messages.html" class="header-notifications-button ripple-effect button-sliding-icon">View All Messages<i class="icon-material-outline-arrow-right-alt"></i></a>
							</div>
						</div>

					</div>
					<!--  User Notifications / End -->

					<!-- User Menu -->
					<div class="header-widget">

						<!-- Messages -->
						<div class="header-notifications user-menu">
							<div class="header-notifications-trigger">
								<a href="#"><div class="user-avatar status-online"><img src="{{asset('images/user-avatar-small-01.jpg')}}" alt=""></div></a>
							</div>

							<!-- Dropdown -->
							<div class="header-notifications-dropdown">

								<!-- User Status -->
								<div class="user-status">

									<!-- User Name / Avatar -->
									<div class="user-details">
										<div class="user-avatar status-online"><img src="{{asset('images/user-avatar-small-01.jpg')}}" alt=""></div>
										<div class="user-name">
											Tom Smith <span>Freelancer</span>
										</div>
									</div>

									<!-- User Status Switcher -->
									<div class="status-switch" id="snackbar-user-status">
										<label class="user-online current-status">Online</label>
										<label class="user-invisible">Invisible</label>
										<!-- Status Indicator -->
										<span class="status-indicator" aria-hidden="true"></span>
									</div>
							</div>

							<ul class="user-menu-small-nav">
								<li><a href="{{url('user/dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
								<li><a href="#"><i class="icon-material-outline-settings"></i> Settings (belum)</a></li>
								<li>
									<a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
										<i class="icon-material-outline-power-settings-new"></i> Logout
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
									</form>
								</li>

							</ul>

							</div>
						</div>

					</div>
					@else
					<div class="header-widget">
						<a href="{{url('login')}}" class="log-in-button"><i class="icon-feather-log-in"></i> <span>Log In / Register</span></a>
					</div>
					@endif

					<!-- Mobile Navigation Button -->
					<span class="mmenu-trigger">
						<button class="hamburger hamburger--collapse" type="button">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</span>

				</div>
				<!-- Right Side Content / End -->

			</div>
		</div>
		<!-- Header / End -->

	</header>
	<div class="clearfix"></div>
	<!-- Header Container / End -->

	@yield('content')

	<!-- Footer
	================================================== -->
	<div id="footer">

		<!-- Footer Top Section -->
		<div class="footer-top-section">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">

						<!-- Footer Rows Container -->
						<div class="footer-rows-container">

							<!-- Left Side -->
							<div class="footer-rows-left">
								<div class="footer-row">
									<div class="footer-row-inner footer-logo">
										<img src="{{asset('images/logo2.png')}}" alt="">
									</div>
								</div>
							</div>

							<!-- Right Side -->
							<div class="footer-rows-right">

								<!-- Social Icons -->
								<div class="footer-row">
									<div class="footer-row-inner">
										<ul class="footer-social-links">
											<li>
												<a href="#" data-tippy-placement="bottom" data-tippy-theme="light" data-tippy="" data-original-title="Facebook">
													<i class="icon-brand-facebook-f"></i>
												</a>
											</li>
											<li>
												<a href="#" data-tippy-placement="bottom" data-tippy-theme="light" data-tippy="" data-original-title="Twitter">
													<i class="icon-brand-twitter"></i>
												</a>
											</li>
											<li>
												<a href="#" data-tippy-placement="bottom" data-tippy-theme="light" data-tippy="" data-original-title="Google Plus">
													<i class="icon-brand-google-plus-g"></i>
												</a>
											</li>
											<li>
												<a href="#" data-tippy-placement="bottom" data-tippy-theme="light" data-tippy="" data-original-title="LinkedIn">
													<i class="icon-brand-linkedin-in"></i>
												</a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>

						</div>
						<!-- Footer Rows Container / End -->
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Top Section / End -->

		<!-- Footer Middle Section -->
		<div class="footer-middle-section">
			<div class="container">
				<div class="row">

					<!-- Links -->
					<div class="col-xl-2 col-lg-2 col-md-3">
						<div class="footer-links">
							<h3>For Candidates</h3>
							<ul>
								<li><a href="#"><span>Browse tasks</span></a></li>
								<li><a href="#"><span>Add Resume</span></a></li>
								<li><a href="#"><span>task Alerts</span></a></li>
								<li><a href="#"><span>My Bookmarks</span></a></li>
							</ul>
						</div>
					</div>

					<!-- Links -->
					<div class="col-xl-2 col-lg-2 col-md-3">
						<div class="footer-links">
							<h3>For Employers</h3>
							<ul>
								<li><a href="#"><span>Browse Candidates</span></a></li>
								<li><a href="#"><span>Post a task</span></a></li>
								<li><a href="#"><span>Post a Task</span></a></li>
								<li><a href="#"><span>Plans &amp; Pricing</span></a></li>
							</ul>
						</div>
					</div>

					<!-- Links -->
					<div class="col-xl-2 col-lg-2 col-md-3">
						<div class="footer-links">
							<h3>Helpful Links</h3>
							<ul>
								<li><a href="#"><span>Contact</span></a></li>
								<li><a href="#"><span>Privacy Policy</span></a></li>
								<li><a href="#"><span>Terms of Use</span></a></li>
							</ul>
						</div>
					</div>

					<!-- Links -->
					<div class="col-xl-2 col-lg-2 col-md-3">
						<div class="footer-links">
							<h3>Account</h3>
							<ul>
								<li><a href="#"><span>Log In</span></a></li>
								<li><a href="#"><span>My Account</span></a></li>
							</ul>
						</div>
					</div>

					<!-- Newsletter -->
					<div class="col-xl-4 col-lg-4 col-md-12">
						<h3><i class="icon-feather-mail"></i> Sign Up For a Newsletter</h3>
						<p>Weekly breaking news, analysis and cutting edge advices on task searching.</p>
						<form action="#" method="get" class="newsletter">
							<input type="text" name="fname" placeholder="Enter your email address">
							<button type="submit"><i class="icon-feather-arrow-right"></i></button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Middle Section / End -->

		<!-- Footer Copyrights -->
		<div class="footer-bottom-section">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						© 2018 <strong>Hireo</strong>. All Rights Reserved.
					</div>
				</div>
			</div>
		</div>
		<!-- Footer Copyrights / End -->

	</div>
	<!-- Footer / End -->

</div>

<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="{{url('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{url('js/jquery-migrate-3.0.0.min.js')}}"></script>
<script src="{{url('js/mmenu.min.js')}}"></script>
<script src="{{url('js/tippy.all.min.js')}}"></script>
<script src="{{url('js/simplebar.min.js')}}"></script>
<script src="{{url('js/bootstrap-slider.min.js')}}"></script>
<script src="{{url('js/bootstrap-select.min.js')}}"></script>
<script src="{{url('js/snackbar.js')}}"></script>
<script src="{{url('js/clipboard.min.js')}}"></script>
<script src="{{url('js/counterup.min.js')}}"></script>
<script src="{{url('js/magnific-popup.min.js')}}"></script>
<script src="{{url('js/slick.min.js')}}"></script>
<script src="{{url('js/custom.js?v=1')}}"></script>
@yield('script')


</body>
</html>
