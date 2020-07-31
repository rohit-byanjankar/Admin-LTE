@extends('layouts.master')
<div class="wrapper">
	@section('content')
	<section class="forum-page">
		<div class="container">
			<div class="col-lg-8">
				<div class="card-group">
					<div class="card border-secondary mt-2">
						@if(File::exists($event->image))
						<a href="{{route('userevents.show',$event->id)}}">
							<img class="card-img-top" width="250px" height="170px" src="{{url($event->image)}}">
						</a>
						@else
						<img src="uploads/noimage.png" width=100% height=50% alt="No Image">
						@endif
					</div>

					<div class="card border-secondary mt-2">
						<div class="card-body">
							<ul>
								<li>
									<div class="leftdate">
										<i class="fa fa-calendar ml-2"></i> <br>
										<p class="pull-left colordate">{{ \carbon\carbon::parse($event->event_date)->format('M d') }}</p>
									</div>
								</li>
								<li>
									<div class="mb-2 eventtitle">
										<b>{{ $event->title}}</b>
									</div>
								</li>

								<li>
									<div class="location">
										<i class="fa fa-map-marker"></i>
									</div>
									<div class="eventvenue">
										{{ $event->venue}}
									</div>
								</li>
							</ul>
							<hr>
							<p>{{$event->description}}</p>
							<p class="card-text"><small class="text-muted">Duration: {{$event->duration}} hours </small></p>
						</div>
					</div>
				</div>

				<div class="card mt-3">
					<h4 class="card-header">
						Details
					</h4>
					<div class="card-body">
						<div class="details">
							{{$event->details}} 
						</div>
						<div class="info">
						@php	$now = $event->event_date; @endphp
							Days: {{\Carbon\Carbon::now()->diffInDays($now , false)}}
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-3 pull-right">
				<div class="widget widget-user">
					<h3 class="title-wd text-center">UPCOMING EVENTS</h3>
					<ul>
						@foreach($limevents as $limevent)
						<li>
							<div class="usr-msg-details">
								<div class="usr-mg-info">
									<img src="{{url($limevent->image)}}" width="40" height="60" alt="">
									<a href="{{route('userevents.show', $limevent->id)}}">
										<h2> <b> {{ $limevent->title }} </b></h2>
									</a>
									<p> {{ $limevent->event_date}} </p>
								</div>
								<!--usr-mg-info end-->
							</div>
						</li>
						@endforeach
					</ul>
				</div>
			</div>

		</div>
	</section>
	<!--forum-page end-->
</div>
@endsection