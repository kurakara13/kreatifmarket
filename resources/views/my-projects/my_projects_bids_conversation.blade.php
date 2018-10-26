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

			.thumb_desc img{
				max-width:500px;
				border:1px solid;
				padding: 10px;
				border-color: #cbcbcb;
			}

			.system_message{
				text-align: center;
		    background-color: beige;
		    height: 75px;
		    padding-top: 20px;
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
	                 <legend>Project Conversation </legend>
									 <div class="jobs-item" style="padding:50px;padding-bottom:0px">
										 <div class="jobs_right">
											 <div class="date" style="font-size:40px;line-height:normal;">30 <span>Jul</span></div>
											 <div class="date_desc"><h6 class="title" style="font-size:40px"><a href="">{{$title}}</a></h6>
											 </div>
										 </div>
									 </div>
									 <hr>
									 <table id="example" class="display" cellspacing="0" width="100%">
									 		<thead>
									 				<tr>
														<td style="width:150px;display:none">No</td>
														<td style="width:150px">Freelancer</td>
									 				</tr>
									 		</thead>
											<tbody>
												<?php $i=1; ?>
												@foreach($conversation as $conversation_key)
												<tr>
													<td style="display:none">{{$i++}}</td>
													<td style="font-size:12px;background:white">
														@if($conversation_key->system_message == 1)
														<div class="system_message">
															{{$conversation_key->created_at}}<br>
															{{Auth::user()->username}} {!!$conversation_key->description!!} {{$freelancer_bids->bid_ammount}}
														</div>
														@else
														<div class="candidates-item" style="margin: 20px;margin-left: 5px;">
														<div class="candidate_1">
															<div class="" style="width: 25%;float:left">
																@if($user->images == null)
																	@if($conversation_key->user_status == "Host")
																	<img src="{{asset('images/user.png')}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
																	@else
																	<img src="{{asset('images/freelancer.png')}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
																	@endif
																@else
																	@if($conversation_key->user_status == "Host")
																	<img src="{{asset('images/user/'.Auth::user()->images)}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
																	@else
																	<img src="{{asset('images/user/'.$user->images)}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
																	@endif
																@endif
																<hr>
																@if($conversation_key->user_status == "Host")
																<h6 class="title"><a href="#"><h4><i class="fa fa-user" style="color:blue"></i> {{Auth::user()->username}}</h4></a></h6>
																@else
																<h6 class="title"><a href="#"><h4><i class="fa fa-user" style="color:blue"></i> {{$user->username}}</h4></a></h6>
																@endif
																<h6 class="title"><a href="#"><h4><i class="fa fa-check" style="color:green"></i> {{$conversation_key->user_status}}</h4></a></h6>

															</div>
															<div class="thumb_desc" style="width: 65%;margin-left:20px;margin-top:10px">
																<h4>Message :</h4>
																<br>
																{!!$conversation_key->description!!}
																@if($conversation_key->file != null)
																<hr>
																<a href="{{asset('files/projects/'.$freelancer_bids->projects_id.'_'.$title.'/'.$conversation_key->file)}}" download>{{substr($conversation_key->file,7)}}</a>
																@endif
															</div>
															<div class="clearfix"></div>
														 </div>
													 </div>
													 @endif
													 </td>
												</tr>
												@endforeach
									 		<tbody>
										</table>
										<hr>
										<div class="search_form1">
										<h3>Reply Message</h3>
										<hr>
										<form action="{{url('dashboard/my-projects/bids/conversation/'.$id.'/'.$title)}}" method="post" enctype="multipart/form-data">
											{{ csrf_field() }}
											<input type="hidden" name="bids_uniq" value="{{$bids_uniq}}">
											<div class="row">
												<div class="col-md-12">
														<label for="Description" class="col-md-2 col-form-label text-md-right">Message <span>*</span></label>

														<div class="col-md-10">
															<textarea id="summernote" name="editordata" required></textarea>
															<span class="invalid-feedback" style="display:none">
																	<strong>Wrong Input</strong>
															</span>
														</div>
												</div>
												<div class="col-md-12">
														<label for="Description" class="col-md-2 col-form-label text-md-right">File <span>*</span></label>

														<div class="col-md-10">
															<input type="file" name="file">
															<span class="invalid-feedback" style="display:none">
																	<strong>Wrong Input</strong>
															</span>
														</div>
												</div>
												<div class="col-md-12">
														<label for="Description" class="col-md-2 col-form-label text-md-right"></label>

														<div class="col-md-10">
															<input type="submit" value="Send Your Message" style="width:100%">
														</div>
												</div>
											</div>

										</form>
									</div>
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
	$('#example').DataTable({
		"order": [ 0, 'desc' ]
	});

	$('#summernote').summernote({
		tabsize: 2,
		height: 200
	});
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
