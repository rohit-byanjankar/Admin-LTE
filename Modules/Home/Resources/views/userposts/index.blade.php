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

							<li><a class="" href="{{ route('userposts.create')}}" title="">Add a Post</a></li>
						</ul>
					</div>
					<!--post-st end-->
				</div>
			</div>
		</div>	
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-8">
						@foreach($posts as $post)
						<div class="forum-questions  mt-2 mb-2">
							<div class="usr-question">
								<div class="usr_img">
									<a href="{{ route('userposts.show', $post->id) }}">
										<img src="{{ url($post->image)}}" alt="">
									</a>
								</div>
								<div class="usr_quest">
									<h3> {{ $post->title }} </h3>
									<p> {{ $post->description }}</p>
									<ul class="quest-tags">
										<li><a href="#" title=""> {{ $post->category->name }} </a></li>
									</ul>

								</div>
								<!--usr_quest end-->
								<span class="post-posted-time"><i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($post->published_at)->format('d D-M Y') }} <br>
									Published By: {{ $post->user->name}}
								</span>

							</div>
							<!--usr-question end-->
						</div>
						<!--forum-questions end-->
						@endforeach

						<div class="text-center"> 
								{!! $posts->links(); !!}
						</div>
					</div>
					<div class="col-lg-4">
						<div class="widget widget-user">
							<h3 class="title-wd text-center">LATEST POSTS</h3>
							<ul>
								@foreach($limposts as $limpost)
								<li>
									<div class="usr-msg-details">
										<div class="usr_img">
											<a href="{{ route('userposts.show',$limpost->id)}}">
												<img height="60px"  width="200px" src="{{ url($limpost->image)}}" alt="">
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