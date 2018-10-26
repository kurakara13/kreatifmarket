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
					<nav id="navigation">
						<ul id="responsive">
							<li><h1>Admin Page</h1></li>
						</ul>
					</nav>

					<div class="clearfix"></div>
					<!-- Main Navigation / End -->

				</div>
				<!-- Left Side Content / End -->


				<!-- Right Side Content / End -->
	      <div class="right-side">

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
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 270px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 192px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
										<ul>
											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-manage-candidates.html">
													<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
													<span class="notification-text">
														<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
													</span>
												</a>
											</li>

											<!-- Notification -->
											<li>
												<a href="dashboard-manage-bidders.html">
													<span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
													<span class="notification-text">
														<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project
													</span>
												</a>
											</li>

											<!-- Notification -->
											<li>
												<a href="dashboard-manage-jobs.html">
													<span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
													<span class="notification-text">
														Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.
													</span>
												</a>
											</li>

											<!-- Notification -->
											<li>
												<a href="dashboard-manage-candidates.html">
													<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
													<span class="notification-text">
														<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
													</span>
												</a>
											</li>
										</ul>
									</div></div></div>
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
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 288px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 183px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
										<ul>
											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-messages.html">
													<span class="notification-avatar status-online"><img src="{{asset('images/user-avatar-small-03.jpg')}}" alt=""></span>
													<div class="notification-text">
														<strong>David Peterson</strong>
														<p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
														<span class="color">4 hours ago</span>
													</div>
												</a>
											</li>

											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-messages.html">
													<span class="notification-avatar status-offline"><img src="{{asset('images/user-avatar-small-02.jpg')}}" alt=""></span>
													<div class="notification-text">
														<strong>Sindy Forest</strong>
														<p class="notification-msg-text">Hi Tom! Hate to break it to you, but I'm actually on vacation until...</p>
														<span class="color">Yesterday</span>
													</div>
												</a>
											</li>

											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-messages.html">
													<span class="notification-avatar status-online"><img src="{{asset('images/user-avatar-placeholder.png')}}" alt=""></span>
													<div class="notification-text">
														<strong>Marcin Kowalski</strong>
														<p class="notification-msg-text">I received payment. Thanks for cooperation!</p>
														<span class="color">Yesterday</span>
													</div>
												</a>
											</li>
										</ul>
									</div></div></div>
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
								<li><a href="{{url('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
								<li><a href="d{{url('dashboard/setting')}}"><i class="icon-material-outline-settings"></i> Settings</a></li>
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

					<div class="clearfix"></div>
					<!-- Main Navigation / End -->

				</div>
				<!-- Left Side Content / End -->


				<!-- Right Side Content / End -->
	      <div class="right-side">

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
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 270px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 192px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
										<ul>
											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-manage-candidates.html">
													<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
													<span class="notification-text">
														<strong>Michael Shannah</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
													</span>
												</a>
											</li>

											<!-- Notification -->
											<li>
												<a href="dashboard-manage-bidders.html">
													<span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
													<span class="notification-text">
														<strong>Gilbert Allanis</strong> placed a bid on your <span class="color">iOS App Development</span> project
													</span>
												</a>
											</li>

											<!-- Notification -->
											<li>
												<a href="dashboard-manage-jobs.html">
													<span class="notification-icon"><i class="icon-material-outline-autorenew"></i></span>
													<span class="notification-text">
														Your job listing <span class="color">Full Stack PHP Developer</span> is expiring.
													</span>
												</a>
											</li>

											<!-- Notification -->
											<li>
												<a href="dashboard-manage-candidates.html">
													<span class="notification-icon"><i class="icon-material-outline-group"></i></span>
													<span class="notification-text">
														<strong>Sindy Forrest</strong> applied for a job <span class="color">Full Stack Software Engineer</span>
													</span>
												</a>
											</li>
										</ul>
									</div></div></div>
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
									<div class="header-notifications-scroll" data-simplebar="init" style="height: 288px;"><div class="simplebar-track vertical" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; top: 0px; height: 183px;"></div></div><div class="simplebar-track horizontal" style="visibility: visible;"><div class="simplebar-scrollbar" style="visibility: visible; left: 0px; width: 25px;"></div></div><div class="simplebar-scroll-content" style="padding-right: 17px; margin-bottom: -34px;"><div class="simplebar-content" style="padding-bottom: 17px; margin-right: -17px;">
										<ul>
											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-messages.html">
													<span class="notification-avatar status-online"><img src="{{asset('images/user-avatar-small-03.jpg')}}" alt=""></span>
													<div class="notification-text">
														<strong>David Peterson</strong>
														<p class="notification-msg-text">Thanks for reaching out. I'm quite busy right now on many...</p>
														<span class="color">4 hours ago</span>
													</div>
												</a>
											</li>

											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-messages.html">
													<span class="notification-avatar status-offline"><img src="{{asset('images/user-avatar-small-02.jpg')}}" alt=""></span>
													<div class="notification-text">
														<strong>Sindy Forest</strong>
														<p class="notification-msg-text">Hi Tom! Hate to break it to you, but I'm actually on vacation until...</p>
														<span class="color">Yesterday</span>
													</div>
												</a>
											</li>

											<!-- Notification -->
											<li class="notifications-not-read">
												<a href="dashboard-messages.html">
													<span class="notification-avatar status-online"><img src="{{asset('images/user-avatar-placeholder.png')}}" alt=""></span>
													<div class="notification-text">
														<strong>Marcin Kowalski</strong>
														<p class="notification-msg-text">I received payment. Thanks for cooperation!</p>
														<span class="color">Yesterday</span>
													</div>
												</a>
											</li>
										</ul>
									</div></div></div>
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
								<li><a href="{{url('dashboard')}}"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
								<li><a href="d{{url('dashboard/setting')}}"><i class="icon-material-outline-settings"></i> Settings</a></li>
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
