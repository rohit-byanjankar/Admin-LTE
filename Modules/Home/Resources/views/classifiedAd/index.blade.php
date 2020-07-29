@extends('layouts.master')
@section('content')
<div class="wrapper">
	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-3 tabhead">
						<div class="card card-header title-wd">
							Categories
						</div>
						@foreach($categories as $category)
						<div class="card card-body">
							<a href="{{route('adcat',$category->id)}}">
								{{ $category->name}} ({{$category->classifieds->where('approved',1)->count()}})
							</a>
						</div>
						@endforeach
					</div>

					<div class="col-lg-6"> {{--ad-content--}}
						<div class="main-ws-sec">
							<div class="ad-st">
								<ul>
									<li>
										<a class="" href="{{ route('classified.create')}}" title=""> <i class="fa fa-plus"> Advertisement</i></a></li>
								</ul>
							</div>
							<!--classified-st end-->
						</div>
						@if($classifieds->count()>0)
						@foreach($classifieds as $classified)
						@if($classified->approved == 1)
						<div class="forum-questions  mt-2 mb-2 ">
							<div class="usr-question">
								<div class="ad_quest">
									@can('update', $classified)
									<a href="{{route('classified.edit',$classified->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
									@endcan

									@can('delete',$classified)
									<form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('classified.destroy' ,$classified->id) }}" method="post" style="display:inline">
										@csrf
										@method('DELETE')
										<button class="btn btn-danger btn-sm">
											<i class="fa fa-trash-o"></i></button>
									</form>
									@endcan
									<div class="card card-header">
										<h3> {{ $classified->title }} </h3>
									</div>
									<div class="card card-body">
										<p> <div class="img-rounded">
									<a href="{{ route('classified.show', $classified->id) }}">
										<img src="{{ url($classified->image)}}" height="110" width="100" alt="">
									</a>
									<br>
								</div>
								 {{ $classified->description }}</p>
									</div>
									<span class="posted_time">
										<i class="fa fa-clock-o"></i> {{ \carbon\carbon::parse($classified->published_at)->format('d D-M Y') }} <br>
									</span>
									<p class="pull-right font-italic"> By : {{$classified->user->name}} <br> Contact: {{$classified->user->phone_number}} </p> <br>
									<p class="pull-right font-italic"> </p>
								</div>
								<!--usr_quest end-->
							</div>
							<!--usr-question end-->
						</div>
						<!--forum-questions end-->
						@endif
						@endforeach
						@else
						<div class="forum-questions  mt-2 mb-2">
							<div class="usr-question">
								<h2> No classifieds Available..</h2>
							</div>
						</div>
						@endif
						<div class="text-center">
							{!! $classifieds->links(); !!}
						</div>
					</div>

					<div class="col-lg-3 rightad pd-right-none no-pd pull-right">
						<div class="widget widget-user">
							<h3 class="title-wd text-center"> LATEST ADS</h3>
							<ul>
								@if($classifieds->count()>0)
								@foreach($limclassifieds as $limclassified)
								<li>
									<div class="usr-msg-details">
										<img src="{{url($limclassified->image)}}" width="40" height="60" alt="">
										<div class="usr-mg-info">
											<a href="{{route('classified.show', $classified->id)}}">
												<h2> <b> {{ $limclassified->title }} </b></h2>
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
											<h2 class="text-center">No Ads..</h2>
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
		</div>
	</section>
	<!--forum-page end-->
</div>
<!--theme-layout end-->
@endsection

@section('scripts')
<script>
	(adsbygoogle = window.adsbygoogle || []).push({
		google_ad_client: "ca-pub-1183769025334076",
		enable_page_level_ads: true
	});
</script>
@endsection