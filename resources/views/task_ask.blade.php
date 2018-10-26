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

	.bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 132px;
    margin-left: 10%;
}
</style>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">

<!-- Include Editor style. -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/css/froala_style.min.css" rel="stylesheet" type="text/css" />

<!-- include libraries(jQuery, bootstrap) -->
@stop
@section('content')
<div id="titlebar" class="gradient">
	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<h2>Ask Task</h2>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">{{$projects->title}}</a></li>
						<li>Ask</li>
					</ul>
				</nav>

			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">

		<div class="col-xl-10 col-lg-10 offset-xl-1 offset-lg-1">

			<section id="contact" class="margin-bottom-60">

				<form action="{{url('/user/task/conversation/post/'.$projects->projects_uniq.'/'.$projects->title)}}" id="form-conversation" method="post" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div>
						<textarea id="mytextarea" name="editordata"></textarea>
						<div class="uploadButton margin-top-30">
							<input class="uploadButton-input" type="file" name="file" accept="image/*, application/pdf" id="upload" multiple="">
							<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
							<span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
						</div>
					</div>
				</form>

					<input type="button" class="submit button margin-top-15" id="submit" value="Send Message" onclick="submitconv()">

			</section>

		</div>

	</div>
</div>
@stop
@section('script')

	<!-- Include external JS libs. -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

	<!-- Include Editor JS files. -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>
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

	$(document).ready(function() {
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
