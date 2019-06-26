@extends('layouts.master')

<div class="wrapper">
	@section('content')
	<main>
		<div class="main-section ">
			<div class="container">
				<div class="main-section-data">
					<div class="row">

						<div class="col-lg-9 col-md-8 no-pd">
							@if($events->count()>0)
							<div class="card card-header">
								<h3 class="text-center"> EVENTS <i class="fa fa-bullhorn"></i> </h3>
							</div>

							@foreach($events as $event)
							<div class="forum-questions mt-2 mb-2">
								<div class="usr-question ">

									<div class="usr_quest">
										<a href=""><img src="http://via.placeholder.com/370x270" width="40" height="60" alt=""></a>
										<a href="{{ route('userevents.show', $event->id)}}">

											<h1> {{ $event->title }} </h1>

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
							@else
							<div class="forum-questions mt-2 mb-2">
								<div class="usr-question ">

									
										<h3> No Events Available..</h3>
								</div>
							</div>
							@endif

						</div>
						<div class="col-lg-3 pd-right-none no-pd">
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
												<p> <i class="fa fa-map-marker"></i> {{ $limevent->venue}} </p>
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

	</main>
</div>

@endsection