@extends('layouts.master')
<div class="wrapper">

	@section('content')
	<main>
		<div class="main-section ">
			<div class="container">
				<div class="main-section-data">
					<div class="row">
						<div class="col-lg-3 col-md-4 ">
							<div class="main-left-sidebar ">
								<div class="user-data full-width">
									<div class="user-profile">
										<div class="username-dt">
											<div class="usr-pic">
												<img src="{{ url(Auth::user()->image)}}" alt="">
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


						<div class="col-lg-7">
							<div class="main-ws-sec ">
								<div class="post-st">
									<ul>

										<li><a class="" href="{{ route('userposts.create')}}" title="">Add a Post</a></li>
									</ul>
								</div>
								<!--post-st end-->


								<div class="posts-section">
									@foreach($posts as $post)
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="{{ url($post->image) }}" height="30" width="30" alt="">

												<div class="usy-name">
													<span> {{$post->Category->name}}. </span>
													<span><i class="fa fa-clock"></i> {{ \carbon\carbon::parse($post->published_at)->format('d D-M Y') }}</span>
												</div>
											</div>

										</div>

										<div class="job_descp">
											<h3>{{$post->description}}</h3>
											<ul class="job-dt">
												<li>
													<a href="#" title="">
														Full Time
													</a>
												</li>
											</ul>

											<p>{{$post->content}} <a href="#" title="">view more</a></p>

											<ul class="skill-tags">
												<i class="fa fa-tag"></i>
												@foreach($post->tags as $tag)
												<li><a href="#">{{ $tag->name}}</a></li>
												@endforeach
											</ul>
										</div>
									</div>
									@endforeach
									<!--post-bar end-->
									<div class="text-center">
										{!! $posts->links(); !!}
									</div>

								</div>
								<!--posts-section end-->
							</div>
							<!--main-ws-sec end-->
						</div>

						<div class="col-lg-2">
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




	<div class="post-popup pst-pj">
		<div class="post-project">
			<h3>Post a project</h3>
			<div class="post-project-fields">
				<form>
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="title" placeholder="Title">
						</div>
						<div class="col-lg-12">
							<div class="inp-field">
								<select>
									<option>Category</option>
									<option>Category 1</option>
									<option>Category 2</option>
									<option>Category 3</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<input type="text" name="skills" placeholder="Skills">
						</div>
						<div class="col-lg-12">
							<div class="price-sec">
								<div class="price-br">
									<input type="text" name="price1" placeholder="Price">
									<i class="la la-dollar"></i>
								</div>
								<span>To</span>
								<div class="price-br">
									<input type="text" name="price1" placeholder="Price">
									<i class="la la-dollar"></i>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<textarea name="description" placeholder="Description"></textarea>
						</div>
						<div class="col-lg-12">
							<ul>
								<li><button class="active" type="submit" value="post">Post</button></li>
								<li><a href="#" title="">Cancel</a></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
			<!--post-project-fields end-->
			<a href="#" title=""><i class="la la-times-circle-o"></i></a>
		</div>
		<!--post-project end-->
	</div>
	<!--post-project-popup end-->

	<div class="post-popup job_post">
		<div class="post-project">
			<h3>Post a job</h3>
			<div class="post-project-fields">
				<form>
					<div class="row">
						<div class="col-lg-12">
							<input type="text" name="title" placeholder="Title">
						</div>
						<div class="col-lg-12">
							<div class="inp-field">
								<select>
									<option>Category</option>
									<option>Category 1</option>
									<option>Category 2</option>
									<option>Category 3</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<input type="text" name="skills" placeholder="Skills">
						</div>
						<div class="col-lg-6">
							<div class="price-br">
								<input type="text" name="price1" placeholder="Price">
								<i class="la la-dollar"></i>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="inp-field">
								<select>
									<option>Full Time</option>
									<option>Half time</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12">
							<textarea name="description" placeholder="Description"></textarea>
						</div>
						<div class="col-lg-12">
							<ul>
								<li><button class="active" type="submit" value="post">Post</button></li>
								<li><a href="#" title="">Cancel</a></li>
							</ul>
						</div>
					</div>
				</form>
			</div>
			<!--post-project-fields end-->
			<a href="#" title=""><i class="la la-times-circle-o"></i></a>
		</div>
		<!--post-project end-->
	</div>
	<!--post-project-popup end-->
</div>
<!--theme-layout end-->
@endsection
</div>