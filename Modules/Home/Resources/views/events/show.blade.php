@extends('layouts.master')



<div class="wrapper">
	@section('content')
	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">

				<div class="col-lg-8 middlebody">

					<div class="card-group">

						<div class="card border-secondary mt-2 mb-2">

							@if(File::exists($event->image))
							<a href="{{route('userevents.show',$event->id)}}">
								<img class="card-img-top" height="40%" src="{{url($event->image)}}" alt="">
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

					<div class="card mb-2">
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

						</div>
					</div>

					<div class="card">
						<div class="card-header">
							Details
						</div>
						<div class="card-body">
						<div class="details">
							{{$event->details}} 
						</div>
						<div class="info">
						{{	$now = $event->event_date;}}
							Days: {{Carbon::now()->diffInDays($now , false);}}
						</div>
						</div>
					</div>


				</div>



				<div class="col-lg-3 pd-right-none no-pd pull-right">
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