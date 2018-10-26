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
</style>

<!-- include libraries(jQuery, bootstrap) -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
@stop
@section('content')
<div class="banner_1">
	<div class="container">
		<div id="search_wrapper1">
		   <div id="search_form" class="clearfix">
				 <h1>Start your Projects search</h1>
		        <p>
		       <input type="text" class="text" placeholder="Enter Keyword(s)" style="width:31%">
		       <label class="btn2 btn-2 btn2-1b"><input type="submit" value="Find Projects"></label>
		      </p>
           </div>
		</div>
   </div>
</div>
<div class="container">
	<div class="single">
	 <div class="form-container">
			<h2>Ask Host Project</h2>
			<div class="search_form1">
			<form action="{{url('projects/ask/'.$id.'/'.$title)}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
							<label for="title" class="col-md-2 text-md-right" style="text-align:right;padding:5px">Title <span>*</span></label>

							<div class="col-md-10">
								<h3>: {{$title}}</h3>
							</div>
							<br><br>
					</div>
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
@stop
@section('script')
<script>
	$(document).ready(function() {
			$('#summernote').summernote({
        tabsize: 2,
        height: 200
      });

			$('#budget_level').change(function(){
				if($(this).val() == "Freelancer Deals"){
					$('#projects_budget').attr('style','display:none');
					$('#budget').val(null);
					$("input").prop('required',false);
				}else {
					$('#projects_budget').attr('style','');
					$('#budget').val(null);
					$("input").prop('required',true);

				}
			});
	});
</script>
@stop
