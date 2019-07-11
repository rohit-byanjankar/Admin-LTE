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
								<li><a class="" href="{{ route('userposts.create')}}" title=""><i class= "fa fa-plus"> Article </i> </a></li>
							</ul>
						</div>
						<!--post-st end-->
					</div>
				</div>
			</div>
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-8">
						@if($posts->count()>0)
						@foreach($posts as $post)
						<div class="forum-questions  mt-2 mb-2">
							<div class="usr-question">
								<div class="usr_img">
									<a href="{{ route('userposts.show', $post->id) }}">
										<img src="{{ url($post->image)}}" height="60" alt="">
									</a>
								</div>
								<div class="usr_quest">
									<div class="card card-header">
										<h3> {{ $post->title }} </h3>
									</div>
									<div class="card card-body">
										<p> {{ $post->description }}</p>
									</div>
									<ul class="quest-tags">
										@foreach($post->tags as $tag)
										<li><a href="#" title=""> {{ $tag->name }} </a></li>
										@endforeach
									</ul>
									<span class="posted_time">
										<i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($post->published_at)->format('d D-M Y') }} <br>
									</span>
									<p class="pull-right font-italic"> By : {{$post->user->name}} </p>
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
								<h2> No Posts Available..</h2>
							</div>
						</div>
						@endif
						<div class="text-center">
							{!! $posts->links(); !!}
						</div>
					</div>
					<div class="col-lg-4">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">LATEST POSTS</h3>
							<ul>
								@if($limposts->count()>0)
								@foreach($limposts as $limpost)
								<li>
									<div class="usr-msg-details">
										<div class="usr_img">
											<a href="{{ route('userposts.show',$limpost->id)}}">
												<img height="60px" width="200px" src="{{ url($limpost->image)}}" alt="">
											</a>
										</div>
										<div class="usr-mg-info">
											<h2> <b> {{ $limpost->title }} </b></h2>
											<p> {{ $limpost->category->name}} </p>
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
					</div>
				</div>
			</div>
			<!--forum-questions-sec end-->
		</div>
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