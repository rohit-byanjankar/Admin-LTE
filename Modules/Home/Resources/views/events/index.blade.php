@extends('layouts.master')

@section('content')
<div class="wrapper">
	<section class="companies-info">

		<div class="container">
			<div class="companies-list col-lg-9">
				<div class="row">


					@if($events->count()>0)


					@foreach($events as $event)
					<div class="col-lg-4">
						<div class="company_profile_info">
							<h2 class="card card-header">{{$event->title}}</h2>
							<a href="{{ route('userevents.show', $event->id)}}">
								<img src="{{url($event->image)}}" width="90" height="100" alt="">

								<ul class="react-links pull-left">
									<li><a href="#" title=""><i class="fa fa-map-marker"></i> {{ $event->venue}}</a></li> <br/>
									<li><a href="#" title=""><i class="fa fa-hourglass" aria-hidden="true"></i> {{ $event->duration }}hours </a></li> <br/>
									<li><a href="#" title=""><i class="fa fa-calendar"></i> {{ $event->event_date}} </a></li>
								</ul>

						</div>

					</div>
					<!--forum-questions end-->
					@endforeach


					@else
					<div class="forum-questions mt-2 mb-2">
						<div class="usr-question ">


							<h3> No Events Available..</h3>
						</div>
					</div>
					@endif
				</div>
				<div class="text-center">
					{!! $events->links(); !!}
				</div>
			</div>


			<div class="col-lg-3 pd-right-none no-pd pull-right">
				<div class="widget widget-user">
					<h3 class="title-wd text-center">UPCOMING EVENTS</h3>
					<ul>
						@foreach($limevents as $limevent)
						<li>
							<div class="usr-msg-details">
								<img src="{{url($limevent->image)}}" width="40" height="60" alt="">
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