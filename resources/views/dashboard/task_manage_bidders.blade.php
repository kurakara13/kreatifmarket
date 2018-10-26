@extends('dashboard.layouts.app-all')
@section('style')

<link rel="stylesheet" type="text/css" href="{{asset('vendors/DataTables/datatables.css')}}"/>
<style>
table.dataTable thead th, table.dataTable thead td {
		padding: 10px 18px;
		border-bottom: 1px solid #f0f0f0;
}

table.dataTable.no-footer {
		border-bottom: 1px solid #f0f0f0;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
		color: #333 !important;
		border: none;
		box-shadow: 0 1px 4px 0 rgba(0,0,0,.12);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, #dcdcdc));
		background: -webkit-linear-gradient(top, white 0%, #dcdcdc 100%);
		background: -moz-linear-gradient(top, white 0%, #dcdcdc 100%);
		background: -ms-linear-gradient(top, white 0%, #dcdcdc 100%);
		background: -o-linear-gradient(top, white 0%, #dcdcdc 100%);
		background: linear-gradient(to bottom, white 0%, #dcdcdc 100%);
		background: none;
}

label, legend {
    display: block;
    font-weight: 700;
    font-size: 16px;
    font-weight: 400;
    margin-bottom: 8px;
    text-indent: -9999px;
    position: absolute;
    top: -85px;
    left: 60px;
}
</style>
@stop
@section('content')
<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title">Dashboard Navigation</span>
				</a>

				<!-- Navigation -->
				@include('dashboard.layouts.navigation')
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>My Active Bids</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>My Active Bids</li>
					</ul>
				</nav>
			</div>

			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-material-outline-search"></i></h3>
						</div>

						<div class="content">
							<table id="example" class="display" cellspacing="0" width="100%">
								 <thead>
										 <tr style="box-shadow: 0 1px 4px 0 rgba(0,0,0,.12);position: absolute;top: -57px;width: 200px;left: 300px;">
											 <td style="width:150px">Task Filtering</td>
										 </tr>
								 </thead>
								 <tbody>
									 @foreach($freelancer_bids as $freelancer_bids_key)
									 <tr>
										 <td style="font-size:12px;background:white">
											 <div class="content">
													<!-- Overview -->
													<div class="freelancer-overview manage-candidates">
														<div class="freelancer-overview-inner">

															<!-- Avatar -->
															<div class="freelancer-avatar">
																<div class="verified-badge"></div>
																<a href="#"><img src="{{asset('images/user-avatar-big-02.jpg')}}" alt=""></a>
															</div>

															<!-- Name -->
															<div class="freelancer-name">
																<h4><a href="#">{{$freelancer_bids_key->username}} <img class="flag" src="images/flags/de.svg" alt="" data-tippy-placement="top" data-tippy="" data-original-title="Germany"></a></h4>

																<!-- Details -->
																<span class="freelancer-detail-item"><a href="#"><i class="icon-feather-mail"></i> {{$freelancer_bids_key->email}}</a></span>

																<!-- Rating -->
																<div class="freelancer-rating">
																	<div class="star-rating" data-rating="5.0"></div>
																</div>

																<!-- Bid Details -->
																<ul class="dashboard-task-info bid-info">
																	<li><strong>IDR {{$freelancer_bids_key->bid_ammount}}</strong><span>Fixed Price</span></li>
																	<li><strong>{{$freelancer_bids_key->finish_time}} {{$freelancer_bids_key->time_type}}</strong><span>Delivery Time</span></li>
																</ul>

																<!-- Buttons -->
																<div class="margin-top-25 margin-bottom-0">
																	<a href="#small-dialog-1" class="popup-with-zoom-anim button ripple-effect"><i class="icon-material-outline-check"></i> Accept Offer</a>
																	<a href="{{url('user/dashboard/task/conversation/'.$freelancer_bids_key->bids_uniq.'/'.$freelancer_bids_key->title)}}" class="button ripple-effect" style="background-color:#f7a714;"><i class="icon-brand-rocketchat"></i> Show Conversation</a>
																</div>
															</div>
														</div>
													</div>
												</div>
											</td>
									 </tr>
									 @endforeach
								 <tbody>
							 </table>
						</div>
					</div>
				</div>

			</div>

			<!-- blank -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->
<div id="small-dialog-1" class="zoom-anim-dialog dialog-with-tabs mfp-hide">

	<!--Tabs -->
	<div class="sign-in-form">

		<ul class="popup-tabs-nav" style="pointer-events: none;">
			<li class="active"><a href="#tab1">Accept Offer</a></li>
		</ul>

		<div class="popup-tabs-container">

			<!-- Tab -->
			<div class="popup-tab-content" id="tab" style="">

				<!-- Welcome Text -->
				<div class="welcome-text">
					<h3>Accept Offer From David</h3>
					<div class="bid-acceptance margin-top-15">
						$3200
					</div>

				</div>

				<form id="terms">
					<div class="radio">
						<input id="radio-1" name="radio" type="radio" required="">
						<label for="radio-1"><span class="radio-label"></span>  I have read and agree to the Terms and Conditions</label>
					</div>
				</form>

				<!-- Button -->
				<button class="margin-top-15 button full-width button-sliding-icon ripple-effect" type="submit" form="terms">Accept <i class="icon-material-outline-arrow-right-alt"></i></button>

			</div>

		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{asset('vendors/DataTables/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
	$('#example').DataTable();
} );
</script>
<style>
.dataTables_wrapper {
    position: relative;
    clear: both;
    zoom: 1;
		padding: 50px;
    padding-top: 20px;
}

.dataTables_wrapper .dataTables_length {
    float: left;
    display: none;
}

.dataTables_wrapper .dataTables_filter {
    float: left;
   	text-align: left;
}

.dataTables_wrapper .dataTables_filter input {
    margin-left: 0px;
}
</style>
@stop
