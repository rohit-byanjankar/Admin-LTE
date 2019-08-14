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
								<img src="{{url( $post->image )}}" width="85%" height="75%" alt="">
								<ul class="quest-tags">
									@foreach($post->tags as $tag)
									<li><a href="#" title="">{{ $tag->name}}</a></li>
									@endforeach
								</ul>

								<div class="usr_quest mt-2">
									<h3 style='display:inline-flex' class='title-style mb-2'>
										{{ $post->title }}
									</h3>

									<div class="article_user_info mt-2">
										<a href="">
											<img src="{{ url($post->user->image)}}" height="7%" width="7%" alt="">
										</a>
									</div>

									<div class='ml-5'>
										<p class='article_user_name' style="text-transform:capitalize">{{$post->user->name}}
										<br>
											<a href="{{route('user-profile',$post->user->id)}}"> View Profile </a>
										</p>
									</div>

									<div class='mt-2 ml-3'>
										<p style="font-family:Georgia, 'Times New Roman', Times, serif">
											{{ $post->content }}
										</p>
									</div>

								</div>
								<p class="pull-right font-italic"> Published By: {{$post->user->name}}</p>

								<!--usr_quest end-->
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-post-view end-->

					</div>

					<div class="col-lg-3 pd-right-none no-pd pull-right">
						<div class="widget widget-user">
							<h3 class="title-wd text-center"> LATEST ARTICLES</h3>
							<ul>
								@if($limposts->count()>0)
								@foreach($limposts as $limpost)
								<li>
									<div class="usr-msg-details">
										<img src="{{url($limpost->image)}}" width="40" height="60" alt="">
										<div class="usr-mg-info">
											<a href="{{route('userposts.show', $post->id)}}">
												<h2> <b> {{ $limpost->title }} </b></h2>
											</a>

										</div>
										<!--usr-mg-info end-->
									</div>
								</li>
								@endforeach
								@else
								<li>
									<div class="usr-msg-details">
										<div class="usr-mg-info">
											<h2 class="text-center">No Upcoming Events</h2>
										</div>
										<!--usr-mg-info end-->
									</div>
								</li>

								@endif
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
			<!--forum-questions-sec end-->

	</section>
	<!--forum-page end-->






</div>
<!--theme-layout end-->
@endsection