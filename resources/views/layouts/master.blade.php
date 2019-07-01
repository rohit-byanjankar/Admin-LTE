<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Community Media</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">

	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="{{url('css/workwise/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('css/workwise/responsive.css')}}">
	<link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css">
	@yield('css')

</head>
<body>
	<header>
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
					</ul>
				</nav>
				<!-- nav end-->

				<div class="search-bar">
					<form>
						<input type="text" name="search" placeholder="Search...">
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
	@yield('content')
	<footer>
		<div class="footy-sec mn no-margin">
			<div class="container">
				<ul>
					<li><a href="#" title="">Help Center</a></li>
					<li><a href="#" title="">Privacy Policy</a></li>
					<li><a href="#" title="">Community Guidelines</a></li>
					<li><a href="#" title="">Cookies Policy</a></li>
					<li><a href="#" title="">Career</a></li>
					<li><a href="#" title="">Forum</a></li>
					<li><a href="#" title="">Language</a></li>
					<li><a href="#" title="">Copyright Policy</a></li>
				</ul>
				<p><img src="images/copy-icon2.png" alt="">Copyright 2018</p>
				<img class="fl-rgt" src="images/logo2.png" alt="">
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="{{ url('js/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ url('js/popper.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/jquery.mCustomScrollbar.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!-- <script type="text/javascript" src="{{ url('js/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{ url('js/scrollbar.js')}}"></script> -->
	<script type="text/javascript" src="{{ url('js/script2.js')}}"></script>
	<script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>
	<!--jquery tabs -->
	@yield('scripts')
</body>