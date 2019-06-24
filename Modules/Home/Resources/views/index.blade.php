@extends('layouts.master')
<div class="wrapper">

	@section('content')
	<main>
		<div class="main-section">
			<div class="container">
				<div class="main-section-data">
					<div class="row">
						<div class="col-lg-3 col-md-4 pd-left-none no-pd">
							<div class="main-left-sidebar no-margin">
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
										<li><a href="#" title="">Help Center</a></li>
										<li><a href="#" title="">About</a></li>
										<li><a href="#" title="">Privacy Policy</a></li>
										<li><a href="#" title="">Community Guidelines</a></li>
										<li><a href="#" title="">Cookies Policy</a></li>
										<li><a href="#" title="">Career</a></li>
										<li><a href="#" title="">Language</a></li>
										<li><a href="#" title="">Copyright Policy</a></li>
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
						<div class="col-lg-6 col-md-8 no-pd">
							<div class="main-ws-sec">
								<div class="post-st">
									<ul>

										<li><a class="" href="{{ route('userposts.create')}}" title="">Add a Post</a></li>
									</ul>
								</div>
								<!--post-st end-->
								<div class="posts-section">
									<div class="post-bar">
										<div class="post_topbar">
											<div class="usy-dt">
												<img src="http://via.placeholder.com/50x50" alt="">
												<div class="usy-name">
													<h3>John Doe</h3>
													<span><img src="images/clock.png" alt="">3 min ago</span>
												</div>
											</div>
											<div class="ed-opts">
												<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
												<ul class="ed-options">
													<li><a href="#" title="">Edit Post</a></li>
													<li><a href="#" title="">Unsaved</a></li>
													<li><a href="#" title="">Unbid</a></li>
													<li><a href="#" title="">Close</a></li>
													<li><a href="#" title="">Hide</a></li>
												</ul>
											</div>
										</div>
										<div class="epi-sec">
											<ul class="descp">
												<li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
												<li><img src="images/icon9.png" alt=""><span>India</span></li>
											</ul>
											<ul class="bk-links">
												<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
												<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
											</ul>
										</div>
										<div class="job_descp">
											<h3>Senior Wordpress Developer</h3>
											<ul class="job-dt">
												<li><a href="#" title="">Full Time</a></li>
												<li><span>$30 / hr</span></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam luctus hendrerit metus, ut ullamcorper quam finibus at. Etiam id magna sit amet... <a href="#" title="">view more</a></p>
											<ul class="skill-tags">
												<li><a href="#" title="">HTML</a></li>
												<li><a href="#" title="">PHP</a></li>
												<li><a href="#" title="">CSS</a></li>
												<li><a href="#" title="">Javascript</a></li>
												<li><a href="#" title="">Wordpress</a></li>
											</ul>
										</div>
									</div>
									<!--post-bar end-->
								</div>
								<!--posts-section end-->
							</div>
							<!--main-ws-sec end-->
						</div>
						<div class="col-lg-3 pd-right-none no-pd">
							<div class="right-sidebar">
								<div class="widget widget-about">
									<img src="images/wd-logo.png" alt="">
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