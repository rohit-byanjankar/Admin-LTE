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
												<img src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" height="100" alt="">
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


									</ul>
								</div>
								<!--user-data end-->

								<div class="latestannouncement">
									<div class="card card-header announcementlatesttitle">
										Latest announcements
									</div>
									<div class="card card-body pull-left announcementmargin">

										<iframe src="{{route('latestannouncements')}}" height="200px" frameborder="0" scrolling="auto" width="100%"></iframe>
									</div>
								</div>
								<!--for latest announcements -->

								<div class="widget widget-adver mt-3">
									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Community 7 -->
									<ins class="adsbygoogle"
									     style="display:block"
									     data-ad-client="ca-pub-1233158957061590"
									     data-ad-slot="1220008987"
									     data-ad-format="auto"
									     data-full-width-responsive="true"></ins>
									<script>
									     (adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
								<!--ad-sec end-->
							</div>
							<!--main-left-sidebar end-->
						</div>
						<div class="col-lg-6 col-md-8 no-pd">
							<div class="main-ws-sec ">
								<div class="post-topbar">
									<div class="user-picy">
										<img src="{{asset(\Illuminate\Support\Facades\Auth::user()->image)}}" height="50px" alt="">
									</div>

									<div class="home-page-box">
										<ul>
											<li><a class="" href="{{ route('userposts.create')}}" title="">Add an Article </a></li>
										</ul>
									</div>
									<!--home-page-box end-->
								</div>
								<!--post-topbar end-->
								<!--post-st end-->
								<div class="posts-section">
									@if($posts->count()>0)
									@foreach($posts as $post)
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="{{$post->user->image}}" height="30" width="30" alt="">
												<div class="usy-name">
													<span> {{$post->Category->name}}. </span>
													<span><i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($post->published_at)->format('d D-M Y') }}</span>
													<span class="skill-tags mt-3">
														<i class="fa fa-tag"></i>
														@if($post->tags->count()>0)
														@foreach($post->tags as $tag)
														{{ $tag->name}}
														@endforeach
														@else
														No Tags..
														@endif
													</span>
												</div>
											</div>
										</div>
										<div class="job_descp">
											<a href="{{route('userposts.show',$post->id)}}">
												<h3>{{$post->title}}</h3>
											</a>
											<p>{{$post->description}} </p>
											<a href="{{route('userposts.show',$post->id)}}">
												<img src="{{ $post->image }}" width="90%" alt="" class="img-thumbnail">
											</a>

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
										<h3><a href="{{ route('userposts.create') }}" title="" class="btn btn-primary">Create an Article</a></h3>
									</div>

								</div>
								<!-- advertisement -->
								<div class="widget widget-adver">
									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Community5 -->
									<ins class="adsbygoogle"
									     style="display:block"
									     data-ad-client="ca-pub-1233158957061590"
									     data-ad-slot="8811009805"
									     data-ad-format="link"
									     data-full-width-responsive="true"></ins>
									<script>
									     (adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
								<!-- advertisement -->
								<div class="widget widget-adver">
									<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
									<!-- Community6 -->
									<ins class="adsbygoogle"
									     style="display:inline-block;width:370px;height:270px"
									     data-ad-client="ca-pub-1233158957061590"
									     data-ad-slot="3367111433"></ins>
									<script>
									     (adsbygoogle = window.adsbygoogle || []).push({});
									</script>
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