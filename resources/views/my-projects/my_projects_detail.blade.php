@extends('layouts.app-all')
@section('style')
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
	                 <legend>My Projects Detail </legend>
									 <div class="jobs-item">
										 <div class="jobs_right">
											 <div class="date" style="font-size:40px;line-height:normal;">30 <span>Jul</span></div>
											 <div class="date_desc"><h6 class="title" style="font-size:40px"><a href="{{url('projects/detail/'.$projects->projects_uniq.'/'.$projects->title)}}">{{$projects->title}}</a></h6>
												 <span class="meta">{{$projects->projects_filtering}}</span>
											 </div>
										 </div>
									 </div>
									 <br><br>
									 <div class="description">
							       {!!$projects->description!!}
									 </div>
									 <hr>
									 <ul class="top-btns" style="padding-left:0px">
										 <li>
											 <a href="{{url('dashboard/my-projects/bids/'.$projects->projects_uniq.'/'.$projects->title)}}">
												 <div class="btn btn-warning">
													 Show Bids
													 <span class="notif">
														 20
													 </span>
												 </div>
											 </a>
										 </li>
										 <li><button class="btn btn-warning">Cancel Projects</button></li>
									 </ul>
									 <dl class="experience">
											<div class="row">
												<div class="col-sm-5" style="    border: 1px solid;padding:25px;margin-left:20px;">
													<h3>About Projects</h3>
													<ul class="f_list f_list1 left" style="margin-left:40px">
														<li><i class="fa fa-check green"></i> Published</li>
														<li><i class="fa fa-check green"></i> 12/02/2018 18:20 WIB</li>
														<li><i class="fa fa-check green"></i> Freelancer Deals</li>
														<li><i class="fa fa-check green"></i> 7 Day</li>
														<li><i class="fa fa-check green"></i> 3 Freelancer Bids</li>
													</ul>
												</div>
												<div class="col-sm-1">
												</div>
												<div class="col-sm-5" style="    border: 1px solid;padding:25px">
													<h3>About Freelancer</h3>
													<ul class="f_list f_list1 left" style="margin-left:40px">
														<li><i class="fa fa-check green"></i> Still Selecting</li>
													</ul>
												</div>
												<div class="col-sm-1">
												</div>
											</div>
						       </dl>
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
@stop
