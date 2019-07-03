@extends('layouts.master')

@section('content')
<div class="wrapper">
	<section class="forum-page">
		<div class="container">
			<div class="col-lg-3 col-md-4 pd-left-none no-pd">
				<div class="col-lg-6 col-md-8 no-pd">
					<div class="main-ws-sec">
						<div class="post-st">
							<ul>

								<li>
									<a class="" href="{{ route('ad.create')}}" title=""> <i class="fa fa-plus"> Advertisement</i></a></li>
							</ul>
						</div>
						<!--advertisement-st end-->
					</div>
				</div>
			</div>
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-8">
						@if($advertisements->count()>0)
						@foreach($advertisements as $advertisement)
						<div class="forum-questions  mt-2 mb-2">
							<div class="usr-question">
								<div class="usr_img">
									<a href="{{ route('ad.show', $advertisement->id) }}">
										<img src="{{ url($advertisement->image)}}" height="60" alt="">
									</a>
								</div>
								<div class="usr_quest">

									<div class="card card-header">
										<h3> {{ $advertisement->title }} </h3>
									</div>
									<div class="card card-body">

										<p> {{ $advertisement->description }}</p>
									</div>


									<span class="posted_time">
										<i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($advertisement->published_at)->format('d D-M Y') }} <br>

									</span>
									<p class="pull-right font-italic"> By :asd<br> Contact:</p> <br>
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

								<h2> No advertisements Available..</h2>
							</div>
						</div>
						@endif

						<div class="text-center">
							{!! $advertisements->links(); !!}
						</div>
					</div>

					<div class="col-lg-4">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">Latest advertisements</h3>
							<ul>
								@if($limadvertisements->count()>0)
								@foreach($limadvertisements as $limadvertisement)
								<li>
									<div class="usr-msg-details">
										<div class="usr_img">
											<a href="{{ route('ad.show',$limadvertisement->id)}}">
												<img height="60px" width="200px" src="{{ url($limadvertisement->image)}}" alt="">
											</a>
										</div>
										<div class="usr-mg-info">
											<h2> <b> {{ $limadvertisement->title }} </b></h2>

										</div>
										<!--usr-mg-info end-->
									</div>

								</li>
								@endforeach

							</ul>
							@else
							<div class="usr-msg-details text-center">
								<h3>
									No Recent advertisements...
								</h3>
							</div>
							@endif



						</div>


						<div class="widget widget-user">
							@foreach($useradvertisements as $useradvertisement)
							<h3 class="title-wd text-center">Your advertisements</h3>

							<ul>
								<li>
									<div class="usr-msg-details">
										<div class="usr_img">
											<a href="{{ route('ad.show',$useradvertisement->id)}}">
												<img height="60px" width="200px" src="{{ url($useradvertisement->image)}}" alt="">
											</a>
										</div>
										<div class="usr-mg-info">
											<h2> <b> {{ $useradvertisement->title }} </b></h2>

										</div>
										<!--usr-mg-info end-->
									</div>

								</li>
							</ul>
							@endforeach
						</div>



						<!-- advertisement -->
						<div class="widget widget-adver">
							<img src="http://via.placeholder.com/370x270" alt="">
						</div>

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