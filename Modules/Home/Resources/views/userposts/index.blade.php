@extends('layouts.master')

<div class="wrapper">
	@section('content')
	<section class="companies-info">
		<div class="container">
			<div class="user-post-st">
				<ul>
					<li><a class="" href="{{ route('userposts.create')}}" title=""><i class="fa fa-plus"> Article </i> </a></li>
				</ul>
			</div>
			<!--user-post-st end-->
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

							@can('update',$post)
							<a href="{{route('userposts.edit',$post->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
							@endcan

							@can('delete',$post)
							<form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('userposts.destroy', $post->id) }}" method="post" style="display:inline">
								@csrf
								@method('DELETE')
								<button class="btn btn-danger btn-sm">
									<i class="fa fa-trash-o"></i></button>
							</form>
							@endcan

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
			

			<div class="col-lg-3 pd-right-none no-pd pull-right">
				<div class="widget widget-user">
					<h3 class="title-wd text-center"> LATEST ARTICLES</h3>
					<ul>
						@if($posts->count()>0)
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
									<h2 class="text-center">No recent articles..</h2>
								</div>
								<!--usr-mg-info end-->
							</div>
						</li>

						@endif
					</ul>
				</div>
				<!--widget-user end-->


				<div class="widget widget-adver">
					<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
					<!-- Community4 -->
					<ins class="adsbygoogle"
					     style="display:block"
					     data-ad-client="ca-pub-1233158957061590"
					     data-ad-slot="4133398193"
					     data-ad-format="auto"
					     data-full-width-responsive="true"></ins>
					<script>
					     (adsbygoogle = window.adsbygoogle || []).push({});
					</script>
				</div>
				<!--for advertisement-->

			</div>
		</div>
</div>

</section>
<!--forum-page end-->








@endsection