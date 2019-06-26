@extends('layouts.master')

@section('content')
<div class="wrapper">

	<section class="forum-page">

			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-2 col-md-2 pd-left-none ">

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
						<!--main-left-sidebar end-->
					</div>

					<div class="col-lg-7">
						<div class="card card-header text-center">
						<h3>ANNOUNCEMENTS <i class="fa fa-bullhorn"></i></h3>	
						</div>
						@foreach($announcements as $announcement)
						<div class="forum-questions mt-2 mb-2">
							<div class="usr-question">

								<div class="usr_quest">
									<a href="{{ route('userannouncements.show', $announcement->id) }}">
										<div class="card card-header">
											<h3 class="text-center"> {{ $announcement->title }} </h3>
										</div>

									</a>
									


								</div>
								<!--usr_quest end-->
								<span class="quest-posted-time"><i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($announcement->published_at)->format('d D-M Y') }}</span>
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-questions end-->
						@endforeach
						<div class="text-center">
							{!! $announcements->links(); !!}
						</div>
					</div>

					<div class="col-lg-3 no-margin no-padding">
						<div class="card card-default no-margin no-padding">
							<div class="card card-header bg-light text-white no-margin no-padding">
								<h3 class="title-wd text-center">LATEST ANNOUNCEMENTS</h3>
							</div>
							@foreach($limannouncements as $limannouncement)
							<div class="card card-body card-text no-margin no-padding">
								<ol type="a">
									<li>
										<a href="{{ route('userannouncements.show', $limannouncement->id) }}">
											<h1 class="text-center"> <b> {{ $limannouncement->title }} </b></h1>
										</a>

									</li>
								</ol>
							</div>
							@endforeach
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
</div>
<!--theme-layout end-->

@endsection