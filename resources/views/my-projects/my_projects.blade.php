@extends('layouts.app-all')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/DataTables/datatables.css')}}"/>
<style>
	.des{
		margin-right: 20px;
	}

	.search_form1 input[type="text"] {
    padding: 8px;
    font-size: 0.85em;
    border: 1px solid #ccc;
    color: #999;
    background: none;
    outline: none;
    font-weight: 300;
    width: 100%;
    margin-bottom: 20px;
	}

	.col-form-label{
		padding: 8px;
		text-align: right;
	}

	label span{
		color: red;
	}

	.check-box li {
    display: inline-block;
		width: 420px;
	}

	.site-panel .well{
		background-color: white;
	}

	.sidebar .list-group-item {
    position: relative;
    display: block;
    padding: 20px 15px;
    margin-bottom: -1px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-left: none;
    border-right: none;
	}

	.notif{
		    background-color: red;
		    color: white;
		    border-radius: 50%;
		    font-size: 12px;
		    padding: 5px;
		    padding-top: 4px;
			}

			.btn{
				text-align: left;
			}
</style>

<!-- include libraries(jQuery, bootstrap) -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
@stop
@section('content')
<div class="banner_1" style="min-height:150px">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
				 <h1>Your Work Board</h1>
       </div>
		</div>
   </div>
</div>
<div class="container">
	<div class="single" style="padding:0px">
	 <div class="form-container">
			  <!------------- MAIN PAGE CONTENT AREA --------->
			 <div class="site-panel"style="margin-top:50px">
			    <div class="container">
			        <div class="row">
                <div class="col-md-3 well">
                  <div class= "sidebar">
                    <div class="list-group">
											<a href="{{url('dashboard')}}" class="list-group-item">Dashboard</a>
										  <a href="{{url('dashboard/my-profile')}}" class="list-group-item">My Profile</a>
										  <a href="{{url('dashboard/my-projects')}}" class="list-group-item active">
												My Projects
												@if($count != 0)
												<span class="notif" style="margin-left:100px">{{$count}}</span>
												@endif
											</a>
											<a href="{{url('dashboard/my-bids')}}" class="list-group-item">
												My Bids
												@if($count_bids != 0)
												<span class="notif" style="margin-left:100px">{{$count_bids}}</span>
												@endif
											</a>
											<!-- <a href="{{url('dashboard/my-service')}}" class="list-group-item">My Service</a> -->
										  <a href="{{url('dashboard/my-pockets')}}" class="list-group-item">My Pockets</a>
										  <a href="{{url('dashboard/message')}}" class="list-group-item">Message</a>
										</div>
                  </div>
                </div>
                <div class="col-md-9 ">
	                <div class= "content-box well">
	                 <legend>My Projects </legend>
									 <table id="example" class="display" cellspacing="0" width="100%">
									 		<thead>
									 				<tr>
									 					<td style="width:150px">Date</td>
									 					<td>Projects</td>
									 				</tr>
									 		</thead>
											<tbody>
												@foreach($projects as $projects_key)
												<tr>
													<td style="font-size:12px;background:white">{{$projects_key->created_at}} WIB</td>
													<td style="background:white">
														<div class="col-sm-12 row_1">
															<h4><a href="{{url('dashboard/my-projects/detail/'.$projects_key->projects_uniq.'/'.$projects_key->title)}}">{{$projects_key->title}}</a></h4>
															<h6>{{$projects_key->projects_filtering}}</h6>
															<p class="description">{!!substr($projects_key->description,0,600)!!}...</p>
														</div>
														<ul class="top-btns" style="padding:15px;">
															<li>
																<a href="{{url('dashboard/my-projects/bids/'.$projects_key->projects_uniq.'/'.$projects_key->title)}}">
																	<div class="btn btn-warning">
																		Show Bids
																		<?php

																		$conversation = DB::table('conversation')
																												->join('freelancer_bid','conversation.bids_id', '=', 'freelancer_bid.id')
										                                    ->join('projects','freelancer_bid.projects_id', '=', 'projects.id')
										                                    ->where('freelancer_bid.projects_id', $projects_key->id)
										                                    ->where('user_status', 'Freelancer')
										                                    ->where('read_message', 0)
										                                    ->count();
																		 ?>
																		@if($conversation != 0)
																		<span class="notif">
																			{{$conversation}}
																		</span>
																		@endif
																	</div>
																</a>
															</li>
															<li><a href="{{url('dashboard/my-projects/detail/'.$projects_key->projects_uniq.'/'.$projects_key->title)}}"><button class="btn btn-warning">View</button></a></li>
															<li><button class="btn btn-warning">Cancel Projects</button></li>
														</ul>
													</td>
												</tr>
												@endforeach
									 		<tbody>
										</table>
                </div>
			    		</div>
		        </div>
			    </div>
			 </div>
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
@stop
