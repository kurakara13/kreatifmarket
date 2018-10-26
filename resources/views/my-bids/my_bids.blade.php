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

		.table tr td{
			background: aliceblue;
			font-size: 12px;
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
										  <a href="{{url('dashboard/my-projects')}}" class="list-group-item">
												My Projects
												@if($count != 0)
												<span class="notif" style="margin-left:100px">{{$count}}</span>
												@endif
											</a>
											<a href="{{url('dashboard/my-bids')}}" class="list-group-item active">
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
														<div class="jobs-item with-thumb">
													   <div class="jobs_right">
															<div class="clearfix"> </div>
															<ul class="top-btns">
																<li>
																	<a href="{{url('dashboard/my-bids/bids/conversation/'.$freelancer_bids_key->bids_uniq.'/'.$freelancer_bids_key->title)}}">
																	 <div class="btn btn-warning">
																		Show conversation
																		@if(DB::table('conversation')->where('bids_id', $freelancer_bids_key->id)->where('user_status', 'Host')->where('read_message', 0)->count() != 0)
																		<span class="notif">
																			{{DB::table('conversation')->where('bids_id', $freelancer_bids_key->id)->where('user_status', 'Host')->where('read_message', 0)->count()}}
																		</span>
																		@endif
																	 </div>
																  </a>
																</li>
																<li><a href="{{asset('projects/bid/'.$freelancer_bids_key->projects_uniq.'/'.$freelancer_bids_key->title)}}"><button class="btn btn-warning">New Bid</button></a></li>
																<li><button class="btn btn-warning">Cancel Bid</button></li>
															</ul>
															<br><br><br><br>
															<div class="row">
																<div class="col-sm-2">
																	Project :
																</div>
																<div class="col-sm-10">
																	<div class="date">30 <span>Jul</span></div>
																	<div class="date_desc"><h6 class="title"><a href="jobs_single.html">{{$freelancer_bids_key->title}}</a></h6>
																	  <span class="meta">{{$freelancer_bids_key->projects_filtering}}</span>
																	</div>
																	<br><br>
																</div>
																<div class="col-sm-2">
																	Message :
																</div>
																<div class="col-sm-10">
																	<?php
																		$message = DB::table('conversation')->select('description', 'file')->where('bids_id', $freelancer_bids_key->id)->first();
																	 ?>
																	 {!!$message->description!!}
																</div>
																<div class="col-sm-2">
																	File :
																</div>
																<div class="col-sm-10">
																	@if($message->file != null)
																	<a href="{{asset('files/projects/'.$freelancer_bids_key->projects_id.'_'.$freelancer_bids_key->title.'/'.$message->file)}}" download>{{substr($message->file,7)}}</a>
																	@else
																	-
																	@endif
																</div>
																<div class="col-sm-2">
																</div>
																<div class="col-sm-10">
																	<hr>
																	<table class="table" style="background:aliceblue">
											                    <tbody>
											                        <tr class="unread checked">
											                            <td class="hidden-xs" style="width:110px;padding:10px;font-size:12px">
											                                <b>Project Status</b>
											                            </td>
											                            <td style="width:180px;padding:10px;font-size:12px">
											                                :

																											<span class="btn btn-info" style="padding:1px">{{$freelancer_bids_key->projects_status}}</span>
											                            </td>
																									<td class="hidden-xs" style="width:50px;padding:10px;font-size:12px">
											                                Freelancer
											                            </td>
																									<td style="padding:10px">
																											:
																											@if($freelancer_bids_key->active == 1)
																											<span class="btn btn-success" style="padding:1px">Active</span>
																											@else
																											<span class="btn btn-warning" style="padding:1px">No Action</span>
																											@endif
																									</td>
											                        </tr>
																							<tr class="unread checked">
																									<td class="hidden-xs" style="width:110px;padding:10px;font-size:12px">
																											<b>Date</b>
																									</td>
																									<td style="width:180px;padding:10px;font-size:12px">
																											: {{$freelancer_bids_key->created_at}} WIB
																									</td>
																									<td class="hidden-xs" style="width:50px;padding:10px;font-size:12px">
																											Ammount
																									</td>
																									<td style="width:150px;padding:10px;font-size:12px">
																											:
																											@if($freelancer_bids_key->bid_ammount== null)
																											 -
																											 @else
																												IDR {{strrev(implode('.',str_split(strrev(strval($freelancer_bids_key->bid_ammount)),3)))}}
																											 @endif
																									</td>
																							</tr>
											                </tbody>
											             </table>
																</div>
															</div>
									            </div>
														<div class="clearfix"> </div>
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
