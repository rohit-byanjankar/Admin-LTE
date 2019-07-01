<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Community Media</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<style>
		 * {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }




    /* Table Styles */

    .table-wrapper {

        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }

    .fl-table {
        border-radius: 5px;
        font-size: 15px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
        margin-top: 100px;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 12px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #4FC3A1;
    }


    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #324960;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            content: "Scroll horizontally >";
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px .625em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }
	</style>

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
						<li>
						<a href="{{ route('ad.index') }}" title="">
								<span><i class="fa fa-ticket" aria-hidden="true"></i>
								</span>
Advertisement							</a>
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
						<a href="#" title=""> {{Auth::user()->name}}
						</a>
						<img src="{{ url(Auth::user()->image) }}" width=30 height=30 alt="">

					</div>
					<div class="user-account-settingss">

						<!--search_form end-->

						<ul class="us-links">
							<li><a href="{{ route('account') }}" title="">Account Setting</a></li>
							<li><a href="#" title="">Privacy</a></li>
							<li><a href="#" title="">Faqs</a></li>
							<li><a href="#" title="">Terms & Conditions</a></li>
						</ul>
						<h3><i class="fa fa-power-off"></i>
							<a href="logout" class="text-center">Logout</a></h3>
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