@extends('layouts.master')
<div class="wrapper">

	@section('content')
	<main>
		<div class="main-section ">
			<div class="container">
				<div class="main-section-data">
					<div class="row">
						<div class="col-lg-3 col-md-4 pd-left-none no-pd ">
							<div class="main-left-sidebar  no-margin ">
								<div class="user-data full-width">
									<div class="user-profile">
										<div class="username-dt">
											<div class="usr-pic">
												<img src="{{ asset(Auth::user()->image)}}" height="100" alt="">
											</div>
										</div>
										<!--username-dt end-->
										<div class="user-specs">
											<h3> {{ Auth::user()->name }} </h3>

										</div>
									</div>
									<!--user-profile end-->
									<ul class="user-fw-status">
										<li>
											<span>{{ Auth::user()-> about}}</span>
										</li>

										<li>
											<a href="#" title="">View Profile</a>
										</li>
									</ul>
								</div>
								<!--user-data end-->

								<div class="tags-sec full-width">
									<ul>
										<li>Some Content</li>
									</ul>
									<div class="cp-sec">
										<img src="images/logo2.png" alt="">
										<p><img src="images/cp.png" alt="">Copyright 2018</p>
									</div>
								</div>
								<!--tags-sec end-->
							</div>
							<!--main-left-sidebar end-->
						</div>


						<div class="col-lg-6 col-md-8 no-pd">
							<div class="main-ws-sec ">
								<div class="post-topbar">
									<div class="user-picy">
										<img src="http://via.placeholder.com/100x100" alt="">
									</div>
									<div class="post-st">
										<ul>

											<li><a class="" href="{{ route('userposts.create')}}" title="">Add a Post</a></li>
										</ul>
									</div>
									<!--post-st end-->
								</div>
								<!--post-topbar end-->

								<!--post-st end-->


								<div class="posts-section">
									@if($posts->count()>0)
									@foreach($posts as $post)
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="{{ asset($post->image) }}" height="30" width="30" alt="">

												<div class="usy-name">
													<span> {{$post->Category->name}}. </span>
													<span><i class="fa fa-clock"></i> {{ \carbon\carbon::parse($post->published_at)->format('d D-M Y') }}</span>
												</div>
											</div>

										</div>

										<div class="job_descp">
											<a href="{{route('userposts.show',$post->id)}}">
												<h3>{{$post->title}}</h3>
											</a>


											<p>{{$post->description}} </p>

											<ul class="skill-tags">
												<i class="fa fa-tag"></i>
												@if($post->tags->count()>0)
												@foreach($post->tags as $tag)
												<li><a href="#">{{ $tag->name}}</a></li>
												@endforeach
												@else
												<li> No Tags.. </li>
												@endif
											</ul>
										</div>
									</div>
									@endforeach

									@else
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<h3 class="text-center">
													No Posts Available..
												</h3>
											</div>
										</div>
									</div>

									@endif

									<!--post-bar end-->
									<div class="text-center">
										{!! $posts->links(); !!}
									</div>

								</div>
								<!--posts-section end-->
							</div>
							<!--main-ws-sec end-->
						</div>

						<div class="col-lg-3 pd-right-none no-pd">
							<div class="right-sidebar">
								<div class="widget widget-about">

									<h3>Community Media</h3>
									<span>Connect with your Community</span>
									<div class="sign_link">
										<h3><a href="{{ route('userposts.create') }}" title="" class="">Create a Post</a></h3>
									</div>

								</div>
							</div>
							<!--right-sidebar end-->
						</div>
					</div>
				</div><!-- main-section-data end-->
			</div>
		</div>
	</main>

</div>
<!--theme-layout end-->
@endsection
