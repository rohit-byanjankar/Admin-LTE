@extends('layouts.master')

<div class="wrapper">
	@section('content')
	<section class="companies-info">

		<div class="container">


			<div class="companies-list col-lg-8 card middlebody">

				<h1 class="font-bold mt-2 mb-2">All announcements</h1>
				<div class="row">

					@if($announcements->count()>0)
					@foreach($announcements as $announcement)
					<div class="col-lg-4 mb-2">
						<div class="card border-secondary mt-2 mb-2">
							<div class="card-body">
								<ul>
									<li>
										<div class="mb-2 announcementtitle">

											<b>{{ $announcement->title}}</b>
										</div>
									</li>

								</ul>

								<div id="mod" class="modal mt-5">
									<p> {{$announcement->details}} </p>
									<a href="#" rel="modal:close"><i class='fa fa-chevron-left'>Go Back</i></a>
								</div>
								<a href="#mod" rel="modal:open" title="view" class="btn btn-sm btn-success">View Details</a>
								
								<hr>

								<p class="card-text"><small class="text-muted">Published Till: {{$announcement->published_till}} </small></p>
							</div>
						</div>
					</div>
					@endforeach


					@else
					<div class="forum-questions mt-2 mb-2">
						<div class="usr-question ">
							<h3> No announcements Available..</h3>
						</div>
					</div>
					@endif
				</div>


				<div class="text-center">
					{!! $announcements->links(); !!}
				</div>
			</div>


			<div class="col-lg-3 pd-right-none no-pd pull-right">
				<div class="widget widget-user">
					<h3 class="title-wd text-center">UPCOMING announcements</h3>
					<ul>
						@foreach($limannouncements as $limannouncement)
						<li>
							<div class="usr-msg-details">
								<div class="usr-mg-info">
									<a href="{{route('announcements.show', $limannouncement->id)}}">
										<h2> <b> {{ $limannouncement->title }} </b></h2>
									</a>

								</div>
								<!--usr-mg-info end-->
							</div>
						</li>
						@endforeach
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

</section>
<!--forum-page end-->

</div>
<!--theme-layout end-->

</main>
</div>

@endsection