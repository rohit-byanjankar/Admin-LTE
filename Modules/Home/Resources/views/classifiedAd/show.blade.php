@extends('layouts.master')

<div class="wrapper">
	@section('content')
	<section class="forum-page">
		<div class="container">
			<div class="forum-questions-sec">
				<div class="row">
					<div class="col-lg-3 pr-5">
						<div class="card card-default">
							<div class="card card-header">
								Categories
							</div>
							<div class="card card-body">


								@foreach($categories as $category)
								<div class="mt-2">


									<a href="{{route('adcat',$category->id)}}">{{$category->name}} ({{$category->classifieds->count()}} ) </a>

								</div>
								@endforeach

							</div>
						</div>
					</div>


					<div class="col-lg-6">

						<div class="details mr-3 pr-2">



							<div class="card card-header">
								General Details
							</div>
							<div class="card card-body">
								<table>
									<tr>
										<th>
											Title:
										</th>
										<td>
											{{$classified->title}}
										</td>
									</tr>

									<tr>
										<th>
											Description:
										</th>
										<td>
											{{$classified->description}}
										</td>
									</tr>

									<tr>
										<th>
											Ad Post Date:
										</th>
										<td>
											{{$classified->created_at}}
										</td>
									</tr>

								</table>

							</div>

							<div class="card card-header mt-3">
								Seller Details
							</div>
							<div class="card card-body mb-3">
								<table>
									<tr>
										<th>
											Posted By:
										</th>
										<td>
											{{$classified->user->name}}
										</td>

									</tr>
									<tr>
										<th>Member since:</th>
										<td> {{$classified->user->created_at}}
										</td>
									</tr>
									<tr>
										<th>
											Email :

										</th>
										<td>
											{{$classified->user->email}}

										</td>

									</tr>
									<tr>
										<th>
											Address :
										</th>
										<td>
											{{$classified->user->address}}

										</td>

									</tr>
									<tr>
										<th>
											Number :
										</th>
										<td>
											{{$classified->user->phone_number}}

										</td>
								</table>
							</div>


							<div class="card card-header">
								Pricing Details
							</div>
							<div class="card card-body">
								<ul>
									<li class="mt-2">
										Price : {{$classified->price}}

									</li>

								</ul>

							</div>

						</div>
					</div>
					<div class="col-lg-3">
						<div class="widget widget-user border pt-1 pl-3 pr-3 pb-1">

							<img src="{{url($classified->image)}}" width="100%" height="30% alt="">
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