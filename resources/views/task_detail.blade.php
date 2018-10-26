@extends('layouts.app-all')
@section('style')
<style>
.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 40%;
    margin-right: 20px;
}
</style>
@stop
@section('content')
<div class="single-page-header" data-background-image="images/single-task.jpg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><a href="#"><img src="{{asset('images/browse-companies-02.png')}}" alt=""></a></div>
						<div class="header-details">
							<h3>{{$projects->title}}</h3>
							<h5>About the Employer</h5>
							<ul>
								<li><a href="#"><i class="icon-material-outline-business"></i> Acue</a></li>
								<li><div class="star-rating" data-rating="5.0"><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span><span class="star"></span></div></li>
								<li><img class="flag" src="{{asset('images/flags/de.svg')}}" alt=""> Germany</li>
								<li><div class="verified-badge-with-title">Verified</div></li>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<div class="salary-box">
							<div class="salary-type">Project Budget</div>
							@if($projects->budget_level == 'Freelancer Deals')
							@else
							<div class="salary-amount">IDR {{$projects->budget_min}} - IDR {{$projects->budget_max}}</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="background-image-container" style="background-image: url(&quot;images/single-task.jpg&quot;);">
	</div>
</div>
<div class="container">
	<div class="row">

		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<!-- Description -->
			<div class="single-page-section">
				<h3 class="margin-bottom-25">Project Description</h3>
				<p>{!!$projects->description!!}</p>
			</div>

			<!-- Atachments -->
			<div class="single-page-section">
				<h3>Attachments</h3>
				<div class="attachments-container">
					<a href="{{asset('files/projects/'.$projects->id.'_'.$projects->title.'/'.$projects->file)}}" download class="attachment-box ripple-effect"><span>{{substr($projects->file,7,-4)}}</span><i>{{strtoupper(substr($projects->file,-3))}}</i></a>
				</div>
			</div>

			<!-- Skills -->
			<div class="single-page-section">
				<h3>Skills Required</h3>
				<div class="task-tags">
					<?php
					$span = "<span>";
					$array = str_split($projects->skill);
					for ($i = 0; $i <= count($array)-1; $i++) {
					 if($i==count($array)-2){
							$span .= '</span>';
					 }else if($i==count($array)-1){
						 $span .= '';
					 }else if($array[$i] == ','){
							$span .= '</span> <span>';
						}else{
							$span .= $array[$i];
						}

					 }
					 ?>
					 {!!$span!!}
				</div>
			</div>
			<div class="clearfix"></div>

			<!-- Freelancers Bidding -->
			<div class="boxed-list margin-bottom-60">
				<div class="boxed-list-headline">
					<h3><i class="icon-material-outline-group"></i> Freelancers Bidding</h3>
				</div>
				<ul class="boxed-list-ul">
					<li>
						<div class="bid">
							<!-- Avatar -->
							<div class="bids-avatar">
								<div class="freelancer-avatar">
									<div class="verified-badge"></div>
									<a href="#"><img src="{{asset('images/user-avatar-big-01.jpg')}}" alt=""></a>
								</div>
							</div>

							<!-- Content -->
							<div class="bids-content">
								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="#">Tom Smith <img class="flag" src="{{asset('images/flags/gb.svg')}}" alt="" data-tippy-placement="top" data-tippy="" data-original-title="United Kingdom"></a></h4>
									<div class="star-rating" data-rating="4.5">
									</div>
								</div>
							</div>

							<!-- Bid -->
							<div class="bids-bid">
								<div class="bid-rate">
									<div class="rate">$4,400</div>
									<span>in 7 days</span>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>

		</div>


		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

				<div class="countdown green margin-bottom-35">6 days, 23 hours left</div>

				<div class="sidebar-widget">
					<form action="{{url('task/bid/'.$projects->projects_uniq.'/'.$projects->title)}}" method="get">
						{{ csrf_field() }}
						<div class="bidding-widget">
							<div class="bidding-headline"><h3>Bid on this job!</h3></div>
							<div class="bidding-inner">

								<!-- Headline -->
								<span class="bidding-detail">Set your <strong>minimal rate</strong></span>

								<!-- Price Slider -->
								<div class="bidding-value">IDR <span id="biddingVal"> {{$projects->budget_max}}</span></div>

								<input class="bidding-slider" name="ammount" type="text" value="{{$projects->budget_max/2}}" data-slider-handle="custom" data-slider-currency="IDR" data-slider-min="{{$projects->budget_min}}" data-slider-max="{{$projects->budget_max}}" data-slider-value="{{$projects->budget_max/2}}" data-slider-step="25000" data-slider-tooltip="hide" style="display: none;" data-value="{{$projects->budget_max}}">

								<!-- Headline -->
								<span class="bidding-detail margin-top-30">Set your <strong>delivery time</strong></span>

								<!-- Fields -->
								<div class="bidding-fields">
									<div class="bidding-field">
										<!-- Quantity Buttons -->
										<div class="qtyButtons" style="width: 100%;">
											<div class="qtyDec"></div>
											<input type="text" name="qtyInput" value="1">
											<div class="qtyInc"></div>
										</div>
										</div>

										<select class="selectpicker default" tabindex="-98" name="time">
												<option selected="">Days</option>
												<option>Hours</option>
											</select>
										</div>
									</div>
								</div>

								<!-- Button -->
								<button type="submit" id="snackbar-place-bid" class="button ripple-effect move-on-hover full-width margin-top-30"><span>Place a Bid</span></button>
							</form>
              <form action="{{url('task/ask/'.$projects->projects_uniq.'/'.$projects->title)}}" method="get">
                {{ csrf_field() }}

                <!-- Button -->
                <button type="submit" id="snackbar-place-bid" class="button ripple-effect move-on-hover full-width margin-top-30"><span>Ask Host</span></button>
              </form>
						</div>
						<div class="bidding-signup">Don't have an account? <a href="#sign-in-dialog" class="register-tab sign-in popup-with-zoom-anim">Sign Up</a></div>
					</div>
					<!-- Sidebar Widget -->
					<div class="sidebar-widget">
						<h3>Bookmark or Share</h3>

						<!-- Bookmark Button -->
						<button class="bookmark-button margin-bottom-25">
							<span class="bookmark-icon"></span>
							<span class="bookmark-text">Bookmark</span>
							<span class="bookmarked-text">Bookmarked</span>
						</button>

						<!-- Copy URL -->
						<div class="copy-url">
							<input id="copy-url" type="text" value="" class="with-border">
							<button class="copy-url-button ripple-effect" data-clipboard-target="#copy-url" data-tippy-placement="top" data-tippy="" data-original-title="Copy to Clipboard"><i class="icon-material-outline-file-copy"></i></button>
						</div>

						<!-- Share Buttons -->
						<div class="share-buttons margin-top-25">
							<div class="share-buttons-trigger"><i class="icon-feather-share-2"></i></div>
							<div class="share-buttons-content">
								<span>Interesting? <strong>Share It!</strong></span>
								<ul class="share-buttons-icons">
									<li><a href="#" data-button-color="#3b5998" data-tippy-placement="top" data-tippy="" data-original-title="Share on Facebook" style="background-color: rgb(59, 89, 152);"><i class="icon-brand-facebook-f"></i></a></li>
									<li><a href="#" data-button-color="#1da1f2" data-tippy-placement="top" data-tippy="" data-original-title="Share on Twitter" style="background-color: rgb(29, 161, 242);"><i class="icon-brand-twitter"></i></a></li>
									<li><a href="#" data-button-color="#dd4b39" data-tippy-placement="top" data-tippy="" data-original-title="Share on Google Plus" style="background-color: rgb(221, 75, 57);"><i class="icon-brand-google-plus-g"></i></a></li>
									<li><a href="#" data-button-color="#0077b5" data-tippy-placement="top" data-tippy="" data-original-title="Share on LinkedIn" style="background-color: rgb(0, 119, 181);"><i class="icon-brand-linkedin-in"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>



			</div>
		</div>

	</div>
</div>
<div class="margin-top-15"></div>
@stop
@section('script')

@stop
