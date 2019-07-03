@extends('layouts.master')

<div class="wrapper">
	@section('content')
	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-9">
						<div class="forum-post-view">
							<div class="usr-question">

								<div class="usr_quest">
									<h3> {{ $advertisement->title }} </h3>
									<img src="{{url( $advertisement->image )}}" width="120" height="100" alt="">



								
									<p>
										{{ $advertisement->content }}
									</p>

								</div>
								<p class="pull-right font-italic"> Published By: namehere</p>

								<!--usr_quest end-->
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-advertisement-view end-->

					</div>
					<div class="col-lg-3">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">LATEST advertisementS</h3>
							<ul>
								@foreach($limadvertisements as $limadvertisement)
								<li>
									<div class="usr-msg-details">
										<a href="{{ route('ad.show',$limadvertisement->id)}}">
											<img src="{{ url($limadvertisement->image)}}" width="55" height="50" alt="">
											<div class="usr-mg-info">
												<b> {{ $limadvertisement->title }} </b>
											</div>
										</a>

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






</div>
<!--theme-layout end-->
@endsection