@extends('dashboard.layouts.app-all')
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

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />


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
				<h3>Conversation!</h3>
				<span>We are glad for good conversation</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li>Dashboard</li>
						<li>Conversation</li>
					</ul>
				</nav>
			</div>

			<div class="messages-container margin-top-0">

					<div class="messages-container-inner">

						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content">

							<div class="messages-headline" style="background-color:#f7a714">
								<h3 style=";color:white"><i class="icon-brand-rocketchat"></i> {{$title}}</h3>
							</div>

							<!-- Message Content Inner -->
							<div class="message-content-inner" style="overflow-y: hidden;    max-height: inherit;">
								<table id="example" class="display" cellspacing="0" width="100%">
									 <thead>
											 <tr style="box-shadow: 0 1px 4px 0 rgba(0,0,0,.12);position: absolute;top: 46px;width: 200px;left: 300px;">
												 <td style="width:150px;display:none">No</td>
												 <td style="width:150px">Message Filtering</td>
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
													 {{Auth::user()->username}} {!!$conversation_key->description!!} {{$conversation_key->bid_ammount}}
												 </div>
												 @else
												 <div class="candidates-item" style="margin: 20px;margin-left: 5px;">
												 <div class="candidate_1" style="display:flex">
													 <div class="" style="width: 20%;float:left">
														 @if($user->images == null)
															 @if($conversation_key->user_status == "Host")
															 <img src="{{asset('images/user/user.png')}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
															 @else
															 <img src="{{asset('images/user/freelancer.png')}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
															 @endif
														 @else
															 @if($conversation_key->user_status == "Host")
															 <img src="{{asset('images/user/'.Auth::user()->images)}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
															 @else
															 <img src="{{asset('images/user/'.$user->images)}}" class="img-responsive" alt="" style="height: 110px;width:150px;border:1px solid;padding:5px;border-color: #cbcbcb;border-radius: 10px;"/>
															 @endif
														 @endif
														 <div class="little-profile" style="border-top: 1px solid #f0f0f0;margin-top:20px;padding-top:10px">
															 @if($conversation_key->user_status == "Host")
															 <h6 class="title"><a href="#"><h4><i class="fa fa-user" style="color:blue"></i> {{Auth::user()->username}}</h4></a></h6>
															 @else
															 <h6 class="title"><a href="#"><h4><i class="fa fa-user" style="color:blue"></i> {{$user->username}}</h4></a></h6>
															 @endif
															 <h6 class="title"><a href="#"><h4><i class="fa fa-check" style="color:green"></i> {{$conversation_key->user_status}}</h4></a></h6>
														 </div>
													 </div>
													 <div class="thumb_desc" style="width: 80%;margin-left:5%;margin-top:10px">
														 <h4>Message :</h4>
														 <br>
														 {!!$conversation_key->description!!}
														 @if($conversation_key->file != null)
														 <div class="little-profile" style="border-top: 1px solid #f0f0f0;margin-top:20px;padding-top:10px">
															 <a href="{{asset('files/projects/'.$conversation_key->projects_id.'_'.$title.'/'.$conversation_key->file)}}" download>{{substr($conversation_key->file,7)}}</a>
														 </div>
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
							</div>
							<!-- Message Content Inner / End -->

							<!-- Reply Area -->
							<div class="message-reply">
								<form action="{{url('/user/dashboard/task/conversation/post/'.$projects_uniq.'/'.$title)}}" method="post" id="form-conversation" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="hidden" name="bids_uniq" value="{{$id}}">
									<div class="row">
										<div class="col-xl-12" style="padding-left:50px">
											<div class="submit-field">
												<h5>Message</h5>
												<textarea id="mytextarea" name="editordata"></textarea>
												<div class="uploadButton margin-top-30">
													<input class="uploadButton-input" type="file" name="file" accept="image/*, application/pdf" id="upload" multiple="">
													<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
													<span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
												</div>
											</div>
										</form>
											<input type="button" value="Send Your Message" style="width:100%" onclick="submitconv()">
										</div>
									</div>

							</div>

						</div>
						<!-- Message Content -->

					</div>
			</div>

			<div class="dashboard-footer-spacer" style="padding-top: 125px;"></div>
			<div class="small-footer margin-top-15">
				<div class="small-footer-copyrights">
					© 2018 <strong>Hireo</strong>. All Rights Reserved.
				</div>
				<ul class="footer-social-links">
					<li>
						<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Facebook">
							<i class="icon-brand-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Twitter">
							<i class="icon-brand-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="Google Plus">
							<i class="icon-brand-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="#" data-tippy-placement="top" data-tippy="" data-original-title="LinkedIn">
							<i class="icon-brand-linkedin-in"></i>
						</a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>

			<!-- blank -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->
@stop
@section('script')
<!-- Create a tag that we will use as the editable area. -->

	<!-- Include external JS libs. -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

	<!-- Include Editor JS files. -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
function  submitconv(){
	var description = $('#mytextarea').val();
	var file = $('#upload').val();
	if(description == ""){
		description = null;
	}

	if(file == ""){
		file = null;
	}

	if(file == null && description == null){
		alert('File atau Pesan tidak boleh kosong!')
	}else {
		event.preventDefault();document.getElementById('form-conversation').submit();
	}
}
  $(function() {
    $('textarea').froalaEditor({
			heightMin: 200,
			// Set custom buttons with separator between them.
toolbarButtons: [
									'fullscreen', 'bold', 'italic', 'underline', '|',
									'color', 'inlineStyle', 'paragraphStyle', '|',
									'align', 'formatOL', 'formatUL', '|',
									'insertLink', 'insertImage', 'insertVideo', 'embedly', 'insertFile', 'insertTable', '|',
									'clearFormatting', '|',
									'spellChecker', 'help', '|',
									'undo', 'redo'],
toolbarButtonsXS: ['undo', 'redo' , '-', 'bold', 'italic', 'underline']
		});
  });
</script>
<script type="text/javascript" src="{{asset('vendors/DataTables/datatables.min.js')}}"></script>
<script>
$(document).ready(function() {
	$('#example').DataTable({
		"order": [ 0, 'desc' ]
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
