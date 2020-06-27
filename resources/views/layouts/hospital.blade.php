<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="img/favicon.png" type="image/png">
	<title>Blood Bank</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('css/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('css/vendors/linericon/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/vendors/owl-carousel/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/vendors/lightbox/simpleLightbox.css')}}">
	<link rel="stylesheet" href="{{asset('css/vendors/nice-select/css/nice-select.css')}}">
	<link rel="stylesheet" href="{{asset('css/vendors/animate-css/animate.css')}}">
	<link rel="stylesheet" href="{{asset('css/vendors/jquery-ui/jquery-ui.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/magnific-popup.css')}}">
	<!-- main css -->
	<link rel="stylesheet" href="{{asset('css/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/css/responsive.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
	@yield('css')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8">
    </script>
</head>

<body>
	<!--================Header Menu Area =================-->
	<header class="header_area">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="/">
						<img src="{{asset('css/img/logo.png')}}" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									
									@auth('hospital')
									<li class="nav-item active">
										<a class="nav-link" href="/hospital">home</a>
									</li>

									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Donations</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{ route('donations.index') }}">
													All Donations
												</a>
											</li>

											<li class="nav-item">
												<a class="nav-link" href="{{ route('chart.index') }}">Reports</a>
											</li>
										</ul>
									</li>

									

									<li class="nav-item">
										<a class="nav-link" href="{{ route('inventoryshow') }}">Inventory</a>
									</li>

									<!-- requests start  -->
									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requests</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{ route('requests.create') }}">
													New Request
												</a>

											</li>
											<li class="nav-item">
												<a class="nav-link" href="{{ route('requests.create',['private' => 1]) }}">
													New private Request
												</a>

											</li>

											<li class="nav-item">
												<a class="nav-link" href="{{ route('requests.index') }}">
													View Requests
												</a>

											</li>

											<li class="nav-item">
												<a class="nav-link" href="{{ route('requests.index',['type'=>'my requests']) }}">
													My Requests
												</a>

											</li>

											<li class="nav-item">
												<a class="nav-link" href="{{ route('requests.index',['type'=>'recived requests']) }}">
													Recived Requests
												</a>
											</li>
										</ul>
									</li>
									<!-- requests end  -->
									<li class="nav-item">
										<a class="nav-link" href="{{ route('otherHospitals') }}">Reviews</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="{{ route('hospitalInbox') }}">Messages</a>
									</li>

									<li class="nav-item">
										<a class="nav-link" href="{{ route('hospitalProfile') }}">Profile</a>
									</li>

									<li class="nav-item submenu dropdown">
										<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::guard('hospital')->user()->name }}</a>
										<ul class="dropdown-menu">
											<li class="nav-item">
												<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
													{{ __('Logout') }}
												</a>

												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
												</form>
											</li>
										</ul>
									</li>

									@else
									<li class="nav-item submenu dropdown">
										<a class="nav-link" href="{{ route('hospitalLogin') }}">{{ __('Hospital Login') }} </a>
									</li>

									@if (Route::has('register'))
									<li class="nav-item submenu dropdown">
										<a class="nav-link" href="{{ route('hospitalRegister') }}">{{ __('Hospital Register') }}</a>
									</li>
									@endif
									@endauth

								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->


	<main>
		@yield('content')
	</main>
	<!--================ Start Experience Area =================-->
<section class="experience_donation section_gap"  style=" bottom: 0;width: 100%;">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-12">
					<h1>Experience How your Donation Can Reach</h1>
					<p>Copyright &copy; ITI 2020</p>
					<a href="https://github.com/omarMohamedAbdo/blood-bank" class="main_btn2 mr-10"><i class="fa fa-github fa-lg" aria-hidden="true"></i>  Github</a>
				</div>
			</div>
		</div>
</section>
	<!--================ End Experience Area =================-->
	@yield('js')
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="{{asset('js/js/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('js/js/popper.js')}}"></script>
	<script src="{{asset('js/js/bootstrap.min.js')}}"></script>
	<!-- <script src="vendors/lightbox/simpleLightbox.min.js"></script> -->
	<script src="{{asset('css/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!-- <script src="vendors/isotope/imagesloaded.pkgd.min.js"></script> -->
	<script src="{{asset('css/vendors/isotope/isotope-min.js')}}"></script>
	<script src="{{asset('css/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('js/js/jquery.ajaxchimp.min.js')}}"></script>
	<!-- <script src="vendors/counter-up/jquery.waypoints.min.js"></script> -->
	<!-- <script src="vendors/flipclock/timer.js"></script> -->
	<!-- <script src="vendors/counter-up/jquery.counterup.js"></script> -->
	<script src="{{asset('js/js/mail-script.js')}}"></script>
	<script src="{{asset('js/js/custom.js')}}"></script>
</body>

</html>