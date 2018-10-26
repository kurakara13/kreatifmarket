@extends('admin.layouts.app-all')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/DataTables/datatables.css')}}"/>
<style>
.site-panel .well{
	background-color: white;
}

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
				@include('admin.layouts.navigation')
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
				<h3>Manage Task</h3>
				<span>Manage all task for best requitmen!</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Dashboard</li>
					</ul>
				</nav>
			</div>
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">
						<table id="example" class="display" cellspacing="0" width="100%">
							 <thead>
									 <tr style="box-shadow: 0 1px 4px 0 rgba(0,0,0,.12);">
										 <td>Projects Name</td>
										 <td>Owner</td>
										 <td style="    width: 90px;">Careated At</td>
										 <td>Status</td>
										 <td style="text-align:center;width: 99px;">Active</td>
										 <td style="text-align:center;width: 105px;">Action</td>
									 </tr>
							 </thead>
							 <tbody>
								 @foreach($projects as $projects_key)
								 <tr>
									 <td style="background:white">{{$projects_key->title}}</td>
									 <td style="background:white">{{$projects_key->users}}</td>
									 <td style="background:white">{{substr($projects_key->created_at,0,10)}}</td>
									 <td style="background:white">{{$projects_key->projects_status}}</td>
									 <td style="background:white;text-align:center">
										 @if($projects_key->active == 0)
										 <form action="{{url('admin/dashboard/task/manage/active')}}" method="post">
											 {{ csrf_field() }}
											 <input type="hidden" name="id" value="{{$projects_key->projects_id}}">
											 <input type="hidden" name="active" value="1">
											 <button type="submit" class="button ripple-effect">SetActive</button>
										 </form>
										 @else
										 <form action="{{url('admin/dashboard/task/manage/active')}}" method="post">
											 {{ csrf_field() }}
											 <input type="hidden" name="id" value="{{$projects_key->projects_id}}">
											 <input type="hidden" name="active" value="1">
											 <button type="submit" class="button ripple-effect" style="background-color: #ecc22a;">NonActive</button>
										 </form>
										 @endif
									 </td>
									 <td>
										 <a class="button" style="background: white;padding: 0pc;color: #2a41e8;width: 32px;padding-top:7px;"><i class="icon-material-outline-search" style="font-size:x-large"></i></a>
										 <a class="button" style="background: white;padding: 0pc;color: red;width: 32px;padding-top:7px;"><i class="icon-material-outline-delete" style="font-size:x-large"></i></a>
										 <a class="button" style="background: white;padding: 0pc;width: 32px;padding-top:7px;color: #ecc22a;"><i class="icon-brand-rocketchat" style="padding-left: 5px;font-size:x-large"></i></a>
									 </td>
								 </tr>
								 @endforeach
							 <tbody>
						 </table>
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
	$('#example').DataTable({
	});
} );
</script>
<style>
/* border-radius: 4px;
    box-shadow: 0 4px 12px rgba(102,103,107,.15);
    font-size: 25px; */
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
</script>
@stop
