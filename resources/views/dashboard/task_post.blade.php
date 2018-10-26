@extends('dashboard.layouts.app-all')
@section('style')
<!-- <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
tinymce.init({
	selector: '#mytextarea'
});
</script> -->
<!-- Include CSS for icons. -->
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
		<div class="dashboard-content-inner" style="min-height: 269px;">

			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Post a Task</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="{{url('/')}}">Home</a></li>
						<li><a href="{{url('/dashboard')}}">Dashboard</a></li>
						<li>Post a Task</li>
					</ul>
				</nav>
			</div>

			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<form action="{{url('user/dashboard/task/post')}}" method="post" enctype="multipart/form-data">
						<div class="dashboard-box margin-top-0">

							<!-- Headline -->
							<div class="headline">
								<h3><i class="icon-feather-folder-plus"></i> Task Submission Form</h3>
							</div>

							<div class="content with-padding padding-bottom-10">
									{{ csrf_field() }}
									<div class="row">

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Project Name</h5>
												<input type="text" class="with-border" name="project_name" placeholder="e.g. build me a website">
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Category</h5>
												<div class="btn-group bootstrap-select with-border">
													<select class="selectpicker with-border" data-size="7" title="Select Category" name="category" tabindex="-98">
														<option class="bs-title-option" value="">Select Category</option>
														@foreach($category as $category_key)
														<option value="{{$category_key->id}}">{{$category_key->name}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</div>

										<div class="col-xl-4">
											<div class="submit-field">
												<h5>Location  <i class="help-icon" data-tippy-placement="right" data-tippy="" data-original-title="Leave blank if it's an online job"></i></h5>
												<div class="input-with-icon">
													<div id="autocomplete-container">
														<div class="pac-container pac-logo" style="display: none; width: 279px; position: absolute; left: 982px; top: 393px;"></div>
														<input id="autocomplete-input" name="location" class="with-border" type="text" placeholder="Anywhere">
													</div>
													<i class="icon-material-outline-location-on"></i>
												</div>
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>What is your estimated budget?</h5>
												<div class="row">
													<div class="col-xl-6">
														<div class="input-with-icon">
															<input class="with-border" type="number" name="budget_min" min="0" placeholder="Minimum" required>
															<i class="currency">IDR</i>
														</div>
													</div>
													<div class="col-xl-6">
														<div class="input-with-icon">
															<input class="with-border" type="number" name="budget_max" min="0" placeholder="Maximum" required>
															<i class="currency">IDR</i>
														</div>
													</div>
												</div>
												<div class="feedback-yes-no margin-top-0">
													<div class="radio">
														<input id="radio-1" name="radio" type="radio" value="Fixed Price Project" checked="">
														<label for="radio-1"><span class="radio-label"></span> Fixed Price Project</label>
													</div>

													<div class="radio">
														<input id="radio-2" name="radio" type="radio" value="Hourly Project">
														<label for="radio-2"><span class="radio-label"></span> Hourly Project</label>
													</div>
												</div>
											</div>
										</div>

										<div class="col-xl-6">
											<div class="submit-field">
												<h5>What skills are required? <i class="help-icon" data-tippy-placement="right" data-tippy="" data-original-title="Up to 5 skills that best describe your project"></i></h5>
												<div class="keywords-container">
													<div class="keyword-input-container">
														<input type="text" class="keyword-input with-border" placeholder="Add Skills">
														<input type="button" class="keyword-input-button ripple-effect" value="+"></input>
													</div>
													<div class="keywords-list" style="height: auto;width: 100%;"><!-- keywords go here --></div>
													<div class="clearfix"></div>
												</div>

											</div>
										</div>

										<div class="col-xl-12">
											<div class="submit-field">
												<h5>Describe Your Project</h5>
												<textarea id="mytextarea" name="editordata" required></textarea>
												<div class="uploadButton margin-top-30">
													<input class="uploadButton-input" type="file" name="file" accept="image/*, application/pdf" id="upload" multiple="">
													<label class="uploadButton-button ripple-effect" for="upload">Upload Files</label>
													<span class="uploadButton-file-name">Images or documents that might be helpful in describing your project</span>
												</div>
											</div>
										</div>

									</div>
							</div>
						</div>
						<div class="col-xl-12">
							<button type="submit" class="button ripple-effect big margin-top-30"><i class="icon-feather-plus"></i> Post a Task</button>
						</div>
					</form>
				</div>



			</div>
			<!-- Row / End -->

			<!-- Footer -->
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
			<!-- Footer / End -->

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->
@stop
@section('script')
<!-- Include external JS libs. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/mode/xml/xml.min.js"></script>

<!-- Include Editor JS files. -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.8.4/js/froala_editor.pkgd.min.js"></script>

<!-- Initialize the editor. -->
<script>
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


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAgeuuDfRlweIs7D6uo4wdIHVvJ0LonQ6g&amp;libraries=places"></script>
<!-- Google Autocomplete -->
<script>
function init() {
	var input = document.getElementById('autocomplete-input');
	var autocomplete = new google.maps.places.Autocomplete(input);

	autocomplete.addListener('place_changed', function() {
		var place = autocomplete.getPlace();
		$('#autocomplete-input').val(place.formatted_address);
	});
}
google.maps.event.addDomListener(window, 'load', init);
</script>

<!-- Google API -->

@stop
