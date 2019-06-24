@extends('layouts.master')

@section('content')
<div class="wrapper">

	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-2 col-md-2 pd-left-none no-pd">
	
						<div class="main-left-sidebar no-margin">
							<div class="user-data full-width">
								<!-- important -->
								<div class="user-specs">
									<h3> Categories </h3>
								</div>
	
								<!--user-profile end-->
								<div id="tabs">
									<ul class="user-fw-status">
	
										<li>
											<a href="">
												<span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum, voluptate? Illum eligendi illo, suscipit soluta corporis minima. Ipsum eos vero et molestiae aperiam, explicabo quasi animi nesciunt aspernatur dolorem quaerat?</span>
											</a>
										</li>
	
										\
									</ul>
								</div>
	
	
							</div>
							<!--user-data end-->
						</div>
					</div>
					<!--main-left-sidebar end-->


					<div class="col-lg-6">
						<div class="card card-header">
							<h3 class="text-aqua text-center"> EVENTS <i class="fa fa-bullhorn"></i> </h3>
						</div>

						@foreach($events as $event)
						<div class="forum-questions mt-2 mb-2">
							<div class="usr-question ">

								<div class="usr_quest">
									<a href="{{ route('userevents.show', $event->id)}}">
										<div class="card card-header">
											<h3 class="text-center"> {{ $event->title }} </h3>
										</div>
									</a>


									<ul class="react-links">
										<li><a href="#" title=""><i class="fa fa-map-marker"></i> Venue: {{ $event->venue}}</a></li>
										<li><a href="#" title=""><i class="fa fa-hourglass"></i> Duration: {{ $event->duration }}hours </a></li>
										<li><a href="#" title=""><i class="fa fa-calendar"></i> Date: {{ $event->event_date}} </a></li>
									</ul>

								</div>
								<!--usr_quest end-->

								<span class="quest-posted-time"><i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($event->published_at)->format('d D-M Y') }}</span>
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-questions end-->
						@endforeach
						<div class="text-center">
							{!! $events->links(); !!}
						</div>

					</div>
					<div class="col-lg-4">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">UPCOMING EVENTS</h3>
							<ul>
								@foreach($limevents as $limevent)
								<li>
									<div class="usr-msg-details">

										<div class="usr-mg-info">
											<a href="{{route('userevents.show', $event->id)}}">
												<h2> <b> {{ $limevent->title }} </b></h2>
											</a>
											<p> {{ $limevent->venue}} </p>
											<p> {{ $limevent->event_date}} </p>
										</div>
										<!--usr-mg-info end-->
									</div>
								</li>
								@endforeach
							</ul>
						</div>
						<!--widget-user end-->


						<div class="widget widget-adver">
							<img src="http://via.placeholder.com/370x270" alt="">
						</div>
						<!--for advertisement-->
					</div>
				</div>
			</div>
			<!--forum-questions-sec end-->
		</div>
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