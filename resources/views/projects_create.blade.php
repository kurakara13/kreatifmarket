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
			<h2>Create Your Project</h2>
			<div class="search_form1">
			<form action="{{url('create')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="row">
					<div class="col-md-12">
							<label for="title" class="col-md-2 col-form-label text-md-right">Title <span>*</span></label>

							<div class="col-md-10">
								<input id="title" type="text" class="form-control" style="" name="title" required>
								<span class="invalid-feedback" style="display:none">
										<strong>Wrong Input</strong>
								</span>
							</div>
					</div>
					<div class="col-md-12">
							<label for="Description" class="col-md-2 col-form-label text-md-right">Description <span>*</span></label>

							<div class="col-md-10">
								<textarea id="summernote" name="editordata"></textarea>
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
							<label for="title" class="col-md-2 col-form-label text-md-right">Finish Day <span>*</span></label>

							<div class="col-md-10">
								<input id="title" type="number" class="form-control" style="width:220px" name="finish_day" placeholder="In Day" required>
								<span class="invalid-feedback" style="display:none">
										<strong>Wrong Input</strong>
								</span>
							</div>
							<br><br><br>
					</div>
					<div class="col-md-12">
							<label for="title" class="col-md-2 col-form-label text-md-right">Budget Level <span>*</span></label>

							<div class="col-md-10">
								<select id="budget_level" class="form-control" style="width:220px" name="budget_level" required>
									<option value="">-Choose Level-</option>
									<option value="Freelancer Deals">Freelancer Deals</option>
									<option value="Tiny Under 500.000<">Tiny Under 500.000</option>
									<option value="Small Under 500.000 - 5 Million">Small Under 500.000 - 5 Million</option>
									<option value="Normal 5 - 10 Million">Normal 5 - 10 Million</option>
									<option value="Expert Under 10 Million">Expert Under 10 Million</option>
								</select>
							</div>
							<br><br><br>
					</div>
					<div class="col-md-12" id="projects_budget">
							<label for="title" class="col-md-2 col-form-label text-md-right">Project Budget<span>*</span></label>

							<div class="col-md-10">
								<input id="budget" type="number" class="form-control" style="width:400px" name="budget" placeholder="Rp. ">
								<span class="invalid-feedback" style="display:none">
										<strong>Wrong Input</strong>
								</span>
							</div>
							<br><br><br>
					</div>
					<div class="col-md-12">
							<label for="title" class="col-md-2 col-form-label text-md-right">Project Filtering<span>*</span></label>

							<div class="col-md-10">
								<div id="navigation" style="padding:10px;border:1px solid;border-color: #cccccc;">
									<ul class="check-box" style="list-style-type: none;">
										<li class="check"><input type="checkbox" class="chek" name="filter[]" value="Web Development"> Web Development</li>
										<li><input id="check" type="checkbox" class="chek" name="filter[]" value="Data Entry"> Data Entry</li>
										<li><input id="check" type="checkbox" class="chek" name="filter[]" value="Framework"> Framework</li>
										<li><input id="check" type="checkbox" class="chek" name="filter[]" value="Laravel"> Laravel</li>
										<li><input id="check" type="checkbox" class="chek" name="filter[]" value="PHP"> PHP</li>
										<li><input id="check" type="checkbox" class="chek" name="filter[]" value="Mysql"> Mysql</li>
										<li><input id="check" type="checkbox" class="chek" name="filter[]" value="Codeignieter"> Codeignieter</li>
									</ul>
								</div>
							</div>
							<br><br><br>
					</div>
				</div>
			 <input type="submit" value="Post your Project" style="width:100%">
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
