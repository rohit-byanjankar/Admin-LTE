@extends('layouts.master')

@section('content')
<div class="wrapper">

	<section class="profile-account-setting">
		<div class="container">
			<div class="account-tabs-setting">
				@auth
				<div class="text-center">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>

				@if(session()->has('error'))
				<div class="alert alert-danger text-center alert-dismissible">
					{{ session()->get('error')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				@if(session()->has('success'))
				<div class="alert alert-success text-center alert-dismissible">
					{{ session()->get('success')}}
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				@endif
				@endauth
				<div class="row">
					<div class="col-lg-3">
						<div class="acc-leftbar">
							<div class="nav nav-tabs" id="nav-tab" role="tablist">

								<a class="nav-item nav-link" id="nav-status-tab" data-toggle="tab" href="#nav-status" role="tab" aria-controls="nav-status" aria-selected="false"><i class="fa fa-user"></i>Profile</a>

								<a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Change Password</a>

								<a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false"><i class="fa fa-flash"></i>Notifications</a>
								<a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests" role="tab" aria-controls="nav-requests" aria-selected="false"><i class="fa fa-group"></i>Requests</a>
								<a class="nav-item nav-link" id="security-login" data-toggle="tab" href="#security-login" role="tab" aria-controls="security-login" aria-selected="false"><i class="fa fa-user-secret"></i>Security and Login</a>
								<a class="nav-item nav-link" id="privacy" data-toggle="tab" href="#privacy" role="tab" aria-controls="privacy" aria-selected="false"><i class="fa fa-paw"></i>Privacy</a>
								<a class="nav-item nav-link" id="blockking" data-toggle="tab" href="#blockking" role="tab" aria-controls="blockking" aria-selected="false"><i class="fa fa-cc-diners-club"></i>Blocking</a>
								<a class="nav-item nav-link" id="nav-deactivate-tab" data-toggle="tab" href="#nav-deactivate" role="tab" aria-controls="nav-deactivate" aria-selected="false"><i class="fa fa-random"></i>Deactivate Account</a>
							</div>
						</div>
						<!--acc-leftbar end-->
					</div>

					<div class="col-lg-9">
						<div class="tab-content" id="nav-tabContent">



							<div class="tab-pane fade show active" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
								<div class="acc-setting">
									<h3>Profile Status</h3>
									<form method="post" action="{{route('profilechange')}} " enctype="multipart/form-data">
										@csrf
										<div class="cp-field">
											<h5>UserName:</h5>
											<div class="cpp-fiel">
												<i class="fa fa-user"></i>
												<input type="text" name="name" value="{{old('name', $user->name)}}" />

											</div>
										</div>

										<div class="cp-field">
											<h5>About Yourself:</h5>
											<textarea name="about">{{old('about', $user->about)}} </textarea>
										</div>

										<div class="cp-field">
											<h5>Profile Picture:</h5>
											<div class="cpp-fiel">
												<i class="fa fa-image"></i>
												<input type="file" name="dp" />
											</div>
										</div>

										<div class="cp-field">
											<h5>Phone Number:</h5>
											<div class="cpp-fiel">
												<i class="fa fa-phone"></i>
												<input type="text" value="{{old('phone_number', $user->phone_number)}}" name="phone" />
											</div>
										</div>

										<div class="save-stngs pd3">
											<ul>

												<li><button type="submit">Save Setting</button></li>

											</ul>
										</div>
										<!--save-stngs end-->
									</form>

									<div class="pro-work-status">
										<!-- <h4>Work Status  -  Last Months Working Status</h4> -->
									</div>
									<!--pro-work-status end-->
								</div>
								<!--acc-setting end-->
							</div>

							<div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
								<div class="acc-setting">
									<h3>Account Setting</h3>
									<form method="post" action="{{ url('changepassword') }}">
										@csrf
										<div class="cp-field">
											<h5>Old Password</h5>
											<div class="cpp-fiel">
												<input type="password" name="oldPassword" placeholder="Old Password" required>
												<i class="fa fa-lock"></i>
											</div>
										</div>
										<div class="cp-field">
											<h5>New Password</h5>
											<div class="cpp-fiel">
												<input type="password" name="newPassword" placeholder="New Password" required>
												<i class="fa fa-lock"></i>
											</div>
										</div>
										<div class="cp-field">
											<h5>Repeat Password</h5>
											<div class="cpp-fiel">
												<input type="password" name="repeatPassword" placeholder="Repeat Password" required>
												<i class="fa fa-lock"></i>
											</div>
										</div>
										<div class="save-stngs pd2">
											<ul>
												<li><button type="submit">Save Setting</button></li>
												<!-- <li><button type="submit">Restore Setting</button></li> -->
											</ul>
										</div>
										<!--save-stngs end-->
									</form>
								</div>
								<!--acc-setting end-->
							</div>
							<div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
								<div class="acc-setting">
									<h3>Notifications</h3>
									<div class="notifications-list">
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Poonam Verma</a> Bid on your Latest project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Tonney Dhman</a> Comment on your project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Poonam Verma </a> Bid on your Latest project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Tonney Dhman</a> Comment on your project</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
										<div class="notfication-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="notification-info">
												<h3><a href="#" title="">Jassica William</a> Comment on your project.</h3>
												<span>2 min ago</span>
											</div>
											<!--notification-info -->
										</div>
										<!--notfication-details end-->
									</div>
									<!--notifications-list end-->
								</div>
								<!--acc-setting end-->
							</div>
							<div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
								<div class="acc-setting">
									<h3>Requests</h3>
									<div class="requests-list">
										<div class="request-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="request-info">
												<h3>Jessica William</h3>
												<span>Graphic Designer</span>
											</div>
											<div class="accept-feat">
												<ul>
													<li><button type="submit" class="accept-req">Accept</button></li>
													<li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
												</ul>
											</div>
											<!--accept-feat end-->
										</div>
										<!--request-detailse end-->
										<div class="request-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="request-info">
												<h3>John Doe</h3>
												<span>PHP Developer</span>
											</div>
											<div class="accept-feat">
												<ul>
													<li><button type="submit" class="accept-req">Accept</button></li>
													<li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
												</ul>
											</div>
											<!--accept-feat end-->
										</div>
										<!--request-detailse end-->
										<div class="request-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="request-info">
												<h3>Poonam</h3>
												<span>Wordpress Developer</span>
											</div>
											<div class="accept-feat">
												<ul>
													<li><button type="submit" class="accept-req">Accept</button></li>
													<li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
												</ul>
											</div>
											<!--accept-feat end-->
										</div>
										<!--request-detailse end-->
										<div class="request-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="request-info">
												<h3>Bill Gates</h3>
												<span>C & C++ Developer</span>
											</div>
											<div class="accept-feat">
												<ul>
													<li><button type="submit" class="accept-req">Accept</button></li>
													<li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
												</ul>
											</div>
											<!--accept-feat end-->
										</div>
										<!--request-detailse end-->
										<div class="request-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="request-info">
												<h3>Jessica William</h3>
												<span>Graphic Designer</span>
											</div>
											<div class="accept-feat">
												<ul>
													<li><button type="submit" class="accept-req">Accept</button></li>
													<li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
												</ul>
											</div>
											<!--accept-feat end-->
										</div>
										<!--request-detailse end-->
										<div class="request-details">
											<div class="noty-user-img">
												<img src="http://via.placeholder.com/35x35" alt="">
											</div>
											<div class="request-info">
												<h3>John Doe</h3>
												<span>PHP Developer</span>
											</div>
											<div class="accept-feat">
												<ul>
													<li><button type="submit" class="accept-req">Accept</button></li>
													<li><button type="submit" class="close-req"><i class="la la-close"></i></button></li>
												</ul>
											</div>
											<!--accept-feat end-->
										</div>
										<!--request-detailse end-->
									</div>
									<!--requests-list end-->
								</div>
								<!--acc-setting end-->
							</div>
							<div class="tab-pane fade" id="nav-deactivate" role="tabpanel" aria-labelledby="nav-deactivate-tab">
								<div class="acc-setting">
									<h3>Deactivate Account</h3>
									<form>
										<div class="cp-field">
											<h5>Email</h5>
											<div class="cpp-fiel">
												<input type="text" name="email" placeholder="Email">
												<i class="fa fa-envelope"></i>
											</div>
										</div>
										<div class="cp-field">
											<h5>Password</h5>
											<div class="cpp-fiel">
												<input type="password" name="password" placeholder="Password">
												<i class="fa fa-lock"></i>
											</div>
										</div>
										<div class="cp-field">
											<h5>Please Explain Further</h5>
											<textarea></textarea>
										</div>
										<div class="cp-field">
											<div class="fgt-sec">
												<input type="checkbox" name="cc" id="c4">
												<label for="c4">
													<span></span>
												</label>
												<small>Email option out</small>
											</div>
											<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pretium nulla quis erat dapibus, varius hendrerit neque suscipit. Integer in ex euismod, posuere lectus id,</p>
										</div>
										<div class="save-stngs pd3">
											<ul>
												<li><button type="submit">Save Setting</button></li>
												<li><button type="submit">Restore Setting</button></li>
											</ul>
										</div>
										<!--save-stngs end-->
									</form>
								</div>
								<!--acc-setting end-->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--account-tabs-setting end-->
		</div>
	</section>

</div>
@endsection