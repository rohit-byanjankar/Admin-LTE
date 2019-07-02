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
									<h3> {{ $post->title }} </h3>
									<img src="{{url( $post->image )}}" width="120" height="100" alt="">



									<ul class="quest-tags">
										@foreach($post->tags as $tag)
										<li><a href="#" title="">{{ $tag->name}}</a></li>
										@endforeach
									</ul>
									<p>
										{{ $post->content }}
									</p>

								</div>
								<p class="pull-right font-italic"> Published By: {{$post->user->name}}</p>

								<!--usr_quest end-->
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-post-view end-->

					</div>
					<div class="col-lg-3">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">LATEST POSTS</h3>
							<ul>
								@foreach($limposts as $limpost)
								<li>
									<div class="usr-msg-details">
										<a href="{{ route('userposts.show',$limpost->id)}}">
											<img src="{{ url($limpost->image)}}" width="55" height="50" alt="">
											<div class="usr-mg-info">
												<b> {{ $limpost->title }} </b>
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