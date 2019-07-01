@extends('layouts.master')

<div class="wrapper">
	@section('content')
	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-8">
						<div class="forum-post-view">
							<div class="usr-question">
								
								<div class="usr_quest">
									<h3> {{ $announcement->title }} </h3>
									<span> Published at: {{ $announcement->published_at}}</span>


									
									<p>
										{{ $announcement->details }}
									</p>

								</div>
								<!--usr_quest end-->
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-post-view end-->

					</div>
					<div class="col-lg-4">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">LATEST ANNOUNCEMENT</h3>
							<ul>
								@foreach($limannouncements as $limannouncement)
								<li>
									<div class="usr-msg-details">
										
										<div class="usr-mg-info">
											<h2> <b> {{ $limannouncement->title }} </b></h2>
											<p> {{ $limannouncement->published_till}} </p>
										</div>
										<!--usr-mg-info end-->
									</div>

								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!--forum-questions-sec end-->

	</section>
	<!--forum-page end-->




	<div class="overview-box" id="question-box">
		<div class="overview-edit">
			<h3>Ask a Question</h3>
			<form>
				<input type="text" name="question" placeholder="Type Question Here">
				<input type="text" name="tags" placeholder="Tags">
				<textarea placeholder="Description"></textarea>
				<button type="submit" class="save">Submit</button>
				<button type="submit" class="cancel">Cancel</button>
			</form>
			<a href="#" title="" class="close-box"><i class="la la-close"></i></a>
		</div>
		<!--overview-edit end-->
	</div>
	<!--overview-box end-->

</div>
<!--theme-layout end-->
@endsection				