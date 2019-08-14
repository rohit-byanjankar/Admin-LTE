<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>{{config('basic_settings.CM_title')}}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<<<<<<< HEAD
	<link rel="stylesheet" type="text/css" href='css/workwise/style.css'>
	<link rel="stylesheet" type="text/css" href='css/workwise/responsive.css'>
	<link rel="stylesheet" type="text/css" href='css/workwise/jqueryTab.css'>
	<link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
=======
	<link rel="stylesheet" type="text/css" href="{{asset('css/workwise/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/workwise/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/workwise/jqueryTab.css')}}">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

>>>>>>> 34e68b7cc5d3d65cf9ab8ccc1d360126edb5ea7a
	@yield('css')
</head>

<body>
	<header class="fixed-top">
		<div class="container">
			<div class="header-data">
				<nav>
					<ul>
						<li>
							<a href="{{ url('/home') }}">
								<span><i class="fa fa-home"></i></span>
								Home
							</a>
						</li>
						<li>
							<a href="{{ route('userposts.index') }}" title="">
								<span><i class="fa fa-clipboard"></i></span>
								Articles
							</a>
							<ul>
								<li><a href="{{ route('userposts.index') }}" title="">Articles</a></li>
								<li><a href="{{ route('postscategories.index') }}" title="">Categories</a></li>
							</ul>
						</li>
						<li>
							<a href="{{ route('userevents.index') }}" title="">
								<span><i class="fa fa-calendar"></i></span>
								Events
							</a>
						</li>
						<li>
							<a href="{{ route('userannouncements.index') }}" title="">
								<span><i class="fa fa-bullhorn"> </i></span>
								Announcements
							</a>

						</li>
						<li>
							<a href="{{ route('telephonedir.index') }}" title="">
								<span><i class="fa fa-phone-square" aria-hidden="true"></i>
								</span>
								Telephone Directory
							</a>
						</li>
						<li>
							<a href="{{ route('classified.index') }}" title="">
								<span><i class="fa fa-ticket" aria-hidden="true"></i>
								</span>
								Classifieds </a>
						</li>
					</ul>
				</nav>
				<!-- nav end-->

				<div class="search-bar">
					<form action="{{route('search')}}" method="POST" role="search">
						{{ csrf_field() }}
						<input type="text" name="query" placeholder="Search...">
						<button type="submit"><i class="fa fa-search"></i></button>
					</form>
				</div>
				<!-- search bar -->

				<div class="user-account">
					<div class="user-info">
						<img src="{{ url(Auth::user()->image) }}" width=30 height=30 alt="">
						<a href="#"> {{Auth::user()->name}}</a>
					</div>
					<div class="user-account-settingss">
						<ul class="us-links">
							<li><a href="{{ route('account') }}" title="">Account Setting</a></li>
							<li><a href="#" title="">Privacy</a></li>
							<li><a href="#" title="">Faqs</a></li>
							<li><a href="#" title="">Terms & Conditions</a></li>
							<i class="fa fa-power-off"></i>
							<a href="logout" class="text-center">Logout</a>
						</ul>
					</div>
					<!--user-account-settingss end-->
				</div>
			</div>
			<!--header-data end-->
		</div>
	</header>
	<!--header end-->

	@if(session()->has('error'))
	<div class="alert alert-danger text-center alert-dismissible col-md-12 mt-5">
		{{ session()->get('error')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	@if(session()->has('success'))
	<div class="alert alert-info text-center alert-dismissible col-md-12 mt-5">
		{{ session()->get('success')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif
	<div class="container">
		<div class="col-md-12 mt-5 main-content">
			@yield('content')
		</div>
	</div>
	<footer>
		<div class="footy-sec mn no-margin">
			<div class="container">
				<ul>
					<li><a href="#" title="">Community Guidelines</a></li>
					<li><a href="{{url('aboutUs')}}" title="">About Us</a></li>
					<li> <i class="fa fa-copyright"> Copyright </i> 2018
					</li>
				</ul>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/popper.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/jquery.mCustomScrollbar.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

	<!--jquery tabs -->
	@yield('scripts')
</body>