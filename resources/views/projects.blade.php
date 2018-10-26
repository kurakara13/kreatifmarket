@extends('layouts.app-all')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/DataTables/datatables.css')}}"/>
<style>
	.des{
		margin-right: 20px;
	}

	.jobs-item{
		margin-bottom: 40px;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: white !important;
    border: none;
    background-color: #f15f43;
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, white), color-stop(100%, #dcdcdc));
    background: -webkit-linear-gradient(top, white 0%, #dcdcdc 100%);
    background: -moz-linear-gradient(top, white 0%, #dcdcdc 100%);
    background: -ms-linear-gradient(top, white 0%, #dcdcdc 100%);
    background: -o-linear-gradient(top, white 0%, #dcdcdc 100%);
    background: linear-gradient(to bottom, #f15f43 0%, #f15f43 100%);
}
</style>
@stop
@section('content')
<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
				 <h1>Start your Projects search</h1>
	        <p>
						<input id="projects_search" type="text" class="text" placeholder="Enter Keyword(s)" style="width:31%">
		        <a href="" id="projects_search_link" class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Projects"></a>
		      </p>
      </div>
		</div>
   </div>
</div>
<div class="container">
    <div class="single">
	   <div class="col-md-9 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Available Projects</a></li>
		   </ul>
		<div id="myTabContent" class="tab-content">
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
		    <div class="tab_grid">
					<table id="example" class="display" cellspacing="0" width="100%" style="    margin-top: 80px;">
						 <thead>
								 <tr>
									 <td style="width:150px;display:none">Freelancer</td>
								 </tr>
						 </thead>
						 <tbody>
							@foreach($projects as $projects_key)
							<tr>
								<td style="background:white">
							    <div class="jobs-item with-thumb">
								    <div class="thumb">
											@if($projects_key->image == null)
											<a href="#"><img src="{{asset('images/user.png')}}" class="img-responsive" alt=""/></a>
											@else
											<a href="#"><img src="{{asset('images/'.$projects_key->image)}}" class="img-responsive" alt=""/></a>
											@endif
										</div>
								    <div class="jobs_right">
											<div class="date">30 <span>Jul</span></div>
											<div class="date_desc"><h6 class="title"><a href="{{url('projects/detail/'.$projects_key->projects_uniq.'/'.$projects_key->title)}}">{{$projects_key->title}}</a></h6>
												<span class="meta">{{$projects_key->projects_filtering}}</span>
											</div>
											<div class="clearfix"> </div>
											<p class="description">{!!substr($projects_key->description,0,600)!!}...</p>
											<hr>
											<div class="description">
												<i class="fa fa-money des"> {{$projects_key->projects_budget}}</i>
												<i class="fa fa-user des"> 2 User Bid</i>
												<i class="fa fa-calendar des"> {{$projects_key->finish_day}} hari {{date('Y-m-d H:i:s', strtotime($projects_key->created_at . ' +'.$projects_key->finish_day.' day'))}}</i>
											</div>
											<hr>
											<ul class="top-btns" style="position:inherit">
												<li><a href="{{url('projects/ask/'.$projects_key->projects_uniq.'/'.$projects_key->title)}}" style="color:white"><button class="btn btn-warning">Ask Project</a></button></li>
												<li><button class="btn btn-warning">Bid</button></li>
												<li><button class="btn btn-warning">View</button></li>
											</ul>
										</div>
										<div class="clearfix"> </div>
										<hr>
									</div>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
			 </div>
		  </div>
	  </div>
     </div>
    </div>
   </div>
   <div class="col-md-3">
	   <div class="widget_search">
			<h5 class="widget-title">Search</h5>
			<!-- <div class="widget-content">
				<span>I'm looking for a ...</span>
                <select class="form-control jb_1">
					<option value="0">Job</option>
					<option value="">Category</option>
					<option value="">Category</option>
					<option value="">Category</option>
					<option value="">Category</option>
				</select>
                <span>in</span>
                <input type="text" class="form-control jb_2" placeholder="Location">
                <input type="text" class="form-control jb_2" placeholder="Industry / Role">
                <input type="submit" class="btn btn-default" value="Search">
			</div> -->
		 </div>
	   	  <div class="col_3">
	   	  	<h3>Category</h3>
	   	  	  <table class="table" style="margin-left:20px">
                    <tbody>
											<tr class="unread checked">
													<td class="hidden-xs">
															<a href="{{url('projects')}}">All</a>
													</td>
											</tr>
											@foreach($category as $category_key)
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                <a href="{{url('projects/search/'.$category_key->name)}}">{{$category_key->name}}</a>
                            </td>
                        </tr>
											@endforeach
                </tbody>
             </table>
	   	  </div>
	   	  <div class="col_3">
	   	  	<h3>Best Host</h3>
	   	  	<table class="table"  style="margin-left:20px">
                    <tbody>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                Kurakara
                            </td>
														<td>
																(0)
														</td>
                        </tr>
                        <tr class="unread checked">
                            <td class="hidden-xs">
                                Pengenbisa
                            </td>
														<td>
																(0)
														</td>
                        </tr>
                    </tbody>
             </table>
	   	  </div>
	   </div>
  <div class="clearfix"> </div>
 </div>
</div>
@stop
@section('script')
<script type="text/javascript" src="{{asset('vendors/DataTables/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
	$('#example').DataTable();

	$('#projects_search').change(function() {
		var link = "{{url('projects/search/')}}/"+$(this).val();
		if($(this).val() == null || $(this).val() == ""){
			$('#projects_search_link').attr('href', "{{url('/')}}");
		}else {
			$('#projects_search_link').attr('href', link);
		}
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
