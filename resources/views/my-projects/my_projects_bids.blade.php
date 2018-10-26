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
	                 <legend>Project Bids </legend>
									 <div class="jobs-item" style="padding:50px;padding-bottom:0px">
										 <div class="jobs_right">
											 <div class="date" style="font-size:40px;line-height:normal;">30 <span>Jul</span></div>
											 <div class="date_desc"><h6 class="title" style="font-size:40px"><a href="{{url('dashboard/my-projects/detail/'.$projects->projects_uniq.'/'.$projects->title)}}">{{$projects->title}}</a></h6>
												 <span class="meta">{{$projects->projects_filtering}}</span>
											 </div>
										 </div>
									 </div>
									 <hr>
									 <table id="example" class="display" cellspacing="0" width="100%">
									 		<thead>
									 				<tr>
									 					<td style="width:150px">Freelancer</td>
									 				</tr>
									 		</thead>
											<tbody>
												@foreach($freelancer_bids as $freelancer_bids_key)
												<tr>
													<td style="font-size:12px;background:white">
														<div class="candidates-item" style="margin: 20px;margin-left: 5px;">
														<div class="candidate_1">
															<div class="thumb" style="width: 25%;">
																@if($freelancer_bids_key->images == null)
																<img src="{{asset('images/freelancer.png')}}" class="img-responsive" alt="" style="height: 110px;width:100%"/>
																@else
																<img src="{{asset('images/user/'.$freelancer_bids_key->images)}}" class="img-responsive" alt="" style="height: 110px;;width:100%"/>
																@endif
															</div>
															<div class="thumb_desc" style="width: 65%;">
																<h6 class="title"><a href="#"><h4>Kurakara</h4></a></h6>
																<table class="">
																	<tbody>
																		<tr>
																			<th>Date</th>
																			<td>: {{substr($freelancer_bids_key->created_at, 0,-3)}} WIB</td>
																			<th>Ammount</th>
																			@if($freelancer_bids_key->bid_ammount != null)
																			<td>: IDR {{strrev(implode('.',str_split(strrev(strval($freelancer_bids_key->bid_ammount)),3)))}}</td>
																			@else
																			<td>: -</td>
																			@endif
																		</tr>
																		<tr>
																			<th>Experience</th>
																			<td>: 25 Projects Done</td>
																			<th>Provinsi</th>
																			<td>: Jawa Tengah</td>
																		</tr>
																	</tbody>
													 			</table>
																<hr>
																<ul class="top-btns" style="padding-left:0px;position:inherit">
																	<li>
																		<a href="{{url('dashboard/my-projects/bids/conversation/'.$freelancer_bids_key->bids_uniq.'/'.$projects->title)}}">
																			<div class="btn btn-warning">
																				Show Conversation
																				@if(DB::table('conversation')->where('bids_id', $freelancer_bids_key->id)->where('read_message', 0)->where('user_status', 'Freelancer')->count() != 0)
																				<span class="notif">
																					{{DB::table('conversation')->where('bids_id', $freelancer_bids_key->id)->where('read_message', 0)->where('user_status', 'Freelancer')->count()}}
																				</span>
																				@endif
																			</div>
																		</a>
																	</li>
																	<li><button class="btn btn-warning">View Freelancer</button></li>
																	@if($freelancer_bids_key->bid_ammount != null)
																	<li><a href="{{url('dashboard/my-projects/bids/accepted/'.$freelancer_bids_key->bids_uniq.'/'.$projects->title)}}"><button class="btn btn-warning">Accept Bid</button></a></li>
																	@endif
																</ul>
															</div>
															<div class="clearfix"></div>
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
<style>
.dataTables_wrapper {
    position: relative;
    clear: both;
    zoom: 1;
		padding: 50px;
    padding-top: 20px;
}
</style>
@stop
