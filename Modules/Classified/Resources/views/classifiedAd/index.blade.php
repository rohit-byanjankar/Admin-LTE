@extends('layouts.master')

<div class="wrapper">
@section('content')
	<section class="forum-page">
		<div class="container">
			<div class="col-lg-3 col-md-4 pd-left-none no-pd">
				<div class="col-lg-6 col-md-8 no-pd">

				</div>
			</div>
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-3 tabhead">
						<div class="card card-header title-wd">
							Categories
						</div>
						@foreach($categories as $category)
						<div class="card card-body">
							<a href="{{route('adcat',$category->id)}}">
								{{ $category->name}} ({{$category->classifieds->count()}})
							</a>
						</div>
						@endforeach
					</div>

					<div class="col-lg-6 ad-content">
						<div class="main-ws-sec">
							<div class="ad-st">
								<ul>

									<li>
										<a class="" href="{{ route('classified.create')}}" title=""> <i class="fa fa-plus"> Advertisement</i></a></li>
								</ul>
							</div>
							<!--classified-st end-->
						</div>
						@if($classifieds->count()>0)
						
						
						@foreach($classifieds as $classified)
						<div class="forum-questions  mt-2 mb-2">
							<div class="usr-question">
								<div class="ad_img img-rounded">
									<a href="{{ route('classified.show', $classified->id) }}">
										<img src="{{ url($classified->image)}}" height="110" width="100" alt="">
									</a>
								</div>
								<div class="ad_quest">

									<div class="card card-header">
										<h3> {{ $classified->title }} </h3>
									</div>
									<div class="card card-body">

										<p> {{ $classified->description }}</p>
									</div>


									<span class="posted_time">
										<i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($classified->published_at)->format('d D-M Y') }} <br>

									</span>
									<p class="pull-right font-italic"> By : {{$classified->user->name}} <br> Contact: {{$classified->user->phone_number}} </p> <br>
									<p class="pull-right font-italic"> </p>

								</div>
								<!--usr_quest end-->


							</div>
							<!--usr-question end-->
						</div>
						<!--forum-questions end-->
						@endforeach

						@else
						<div class="forum-questions  mt-2 mb-2">
							<div class="usr-question">

								<h2> No classifieds Available..</h2>
							</div>
						</div>
						@endif

						<div class="text-center">
							{!! $classifieds->links(); !!}
						</div>
					</div>

					<div class="col-lg-3 tabhead">
						<div class="widget widget-user">
						

								<h3 class="title-wd text-center"> LATEST ADS</h3>
							
							<ul>
								@if($limclassifieds->count()>0)
								@foreach($limclassifieds as $limclassified)
								<li>
									<div class="usr-msg-details">
										<div class="usr_img">
											<a href="{{ route('classified.show',$limclassified->id)}}">
												<img height="60px" width="200px" src="{{ url($limclassified->image)}}" alt="">
											</a>
										</div>
										<div class="usr-mg-info">
											<h2> <b> {{ $limclassified->title }} </b></h2>

										</div>
										<!--usr-mg-info end-->
									</div>

								</li>
								@endforeach

							</ul>
							@else
							<div class="usr-msg-details text-center">
								<h3>
									No Recent Posts...
								</h3>
							</div>
							@endif



						</div>

						<!-- advertisement -->
						<div class="widget widget-adver">
							<img src="http://via.placeholder.com/370x270" alt="">
						</div>

						<div class="widget widget-user">
							<h3 class="title-wd text-center">Your classifieds</h3>
							@foreach($userclassifieds as $userclassified)

							<ul>
								<li>
									<div class="usr-msg-details">
										<div class="usr_img">
											<a href="{{ route('classified.show',$userclassified->id)}}">
												<img height="60px" width="200px" src="{{ url($userclassified->image)}}" alt="">
											</a>
										</div>
										<div class="usr-mg-info">
											<h2> <b> {{ $userclassified->title }} </b></h2>

										</div>
										<!--usr-mg-info end-->
									</div>
									<!--usr-mg-info end-->
								</li>
							</ul>
							@endforeach
						</div>





						<!-- classified -->

					</div>
				</div>
			</div>
			<!--forum-questions-sec end-->

		</div>
	</section>
	<!--forum-page end-->






</div>
<!--theme-layout end-->

@endsection