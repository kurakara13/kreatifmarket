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
									 @foreach($task as $task_key)
									 <tr>
										 <td style="font-size:12px;background:white">
											 <div class="job-listing width-adjustment">

			 										<!-- Job Listing Details -->
			 										<div class="job-listing-details">

			 											<!-- Details -->
			 											<div class="job-listing-description">
			 												<h3 class="job-listing-title"><a href="#">{{$task_key->title}}</a> <span class="dashboard-status-button yellow">Expiring</span></h3>

			 												<!-- Job Listing Footer -->
			 												<div class="job-listing-footer">
			 													<ul>
			 														<li><i class="icon-material-outline-access-time"></i> {{$task_key->created_at}}</li>
			 													</ul>
			 												</div>
			 											</div>
			 										</div>
			 									</div>
												<ul class="dashboard-task-info">
													<li><strong>{{DB::table('freelancer_bid')->where('projects_id', $task_key->id)->count()}}</strong><span>Bids</span></li>
													<li><strong>IDR {{DB::table('freelancer_bid')->where('projects_id', $task_key->id)->avg('bid_ammount')}}</strong><span>Avg. Bid</span></li>
													<li><strong>IDR {{$task_key->budget_min}} - {{$task_key->budget_max}}</strong><span>Task Budget</span></li>
													<li><strong>{{$task_key->budget_level}}</strong><span>Budegt Level</span></li>
													<li><strong>{{$task_key->projects_status}}</strong><span>Task Status</span></li>
												</ul>
												<div class="">
													<a href="{{url('user/dashboard/task/manage/'.$task_key->projects_uniq.'/'.$task_key->title.'/bidders')}}" class="button ripple-effect"><i class="icon-material-outline-supervisor-account"></i> Manage Bidders <span class="button-info">3</span></a>
													<a href="#" class="button ripple-effect" style="background-color:#f7a714;" data-tippy-placement="top" data-tippy="" data-original-title="Edit"><i class="icon-material-outline-search"></i> Task Detail</a>
													<a href="#" class="button red ripple-effect"  data-tippy-placement="top" data-tippy="" data-original-title="Remove"><i class="icon-feather-trash-2"></i> Cancel Task</a>
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
