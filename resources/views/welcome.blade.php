


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

	<style>
			@import url(//fonts.googleapis.com/css?family=Montserrat:300,500);
		.team4 {
		font-family: "Montserrat", sans-serif;
			color: #8d97ad;
		font-weight: 300;
		}

		.team4 h1, .team4 h2, .team4 h3, .team4 h4, .team4 h5, .team4 h6 {
		color: #3e4555;
		}

		.team4 .font-weight-medium {
			font-weight: 500;
		}

		.team4 h5 {
			line-height: 22px;
			font-size: 18px;
		}

		.team4 .subtitle {
			color: #8d97ad;
			line-height: 24px;
				font-size: 13px;
		}

		.team4 ul li a {
		color: #8d97ad;
		padding-right: 15px;
		-webkit-transition: 0.1s ease-in;
		-o-transition: 0.1s ease-in;
		transition: 0.1s ease-in;
		}

		.team4 ul li a:hover {
		-webkit-transform: translate3d(0px, -5px, 0px);
		transform: translate3d(0px, -5px, 0px);
			color: #316ce8;
		}
	</style>
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
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
					 aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<div class="row ml-0 w-100">
							<div class="col-lg-12 pr-0">
								<ul class="nav navbar-nav center_nav pull-right">
									
                                    @if(Auth::check())
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#team">Our team</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#requests">Campaigns</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#statistics">Statistics</a>
                                    </li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#stories">Donation stories</a>
                                    </li>
									<li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
                                        <ul class="dropdown-menu">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                        </ul>
                                    </li>
                                    @elseif(Auth::guard('hospital')->check())
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ url('/hospital') }}">Hospital Home</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#team">Our team</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#requests">Campaigns</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#statistics">Statistics</a>
									</li>
									<li class="nav-item ">
                                        <a class="nav-link" href="#stories">Donation stories</a>
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
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
										</li>
										
										
										<li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hospital</a>
                                        <ul class="dropdown-menu">
                                                <li class="nav-item">
													<a class="nav-link" href="{{ route('hospitalLogin') }}">{{ __('Login') }} </a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="{{ route('hospitalRegister') }}">{{ __('Register') }} </a>
                                                </li>
                                        </ul>
										</li>
										
										<li class="nav-item ">
                                       	 <a class="nav-link" href="#team">Our team</a>
										</li>
										<li class="nav-item ">
											<a class="nav-link" href="#requests">Campaigns</a>
										</li>
										<li class="nav-item ">
											<a class="nav-link" href="#statistics">Statistics</a>
										</li>
										<li class="nav-item ">
											<a class="nav-link" href="#stories">Donation stories</a>
										</li>
										
                                        <!-- <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('hospitalLogin') }}">Hospital Login</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('hospitalRegister') }}">Hospital Register</a>
                                        </li> -->

                                        <!-- @if (Route::has('register'))
                                        @endif -->
                                    @endif
									
								</ul>
							</div>
						</div>
					</div>
				</div>
			</nav>
		</div>
	</header>
	<!--================Header Menu Area =================-->

       <!--================ Home Banner Area =================-->
<section class="home_banner_area">
		<div class="overlay"></div>
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content row">
					<div class="offset-lg-2 col-lg-8">
						<img class="img-fluid" src="{{asset('css/img/banner/text-img.png')}}" alt="">
						<p>Please Help Us, Donate Now to our causes

							</p>
						<!-- <a class="main_btn mr-10" href="#">donate now</a> -->
						<a class="white_bg_btn" href="#team">View Our Team</a>
					</div>
				</div>
			</div>
		</div>
</section>
	<!--================ End Home Banner Area =================-->

<section class="" >
	<div class="py-5 team4" id="team">
	<div class="container">
		<div class="row justify-content-center mb-4">
		<div class="col-md-7 text-center">
			<h2 class="mb-3">Our Amazing Team</h2>
			<h4 class="subtitle">You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time</h4>
		</div>
		</div>
		<div class="row">
		<!-- column  -->
		<div class="col-lg-4 mb-4">
			<!-- Row -->
			<div class="row">
			<div class="col-md-12">
				<img src="{{asset('OmarFormal.jpg')}}" alt="wrapkit" class="img-fluid rounded-circle" />
			</div>
			<div class="col-md-12 text-center">
				<div class="pt-2">
				<h5 class="mt-4 font-weight-medium mb-0">Omar Abdo</h5>
				<h6 class="subtitle mb-3">Software Engineer</h6>
				<p>Expeirienced Fullstack ITI Graduate</p>
				<ul class="list-inline">
				<li class="list-inline-item"><a href="https://www.linkedin.com/in/omarmohamedabdo/" class="text-decoration-none d-block px-1"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="https://github.com/omarMohamedAbdo" class="text-decoration-none d-block px-1"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
				</ul>
				</div>
			</div>
			</div>
			<!-- Row -->
		</div>
		<!-- column  -->
		<!-- column  -->
		<div class="col-lg-4 mb-4">
			<!-- Row -->
			<div class="row">
			<div class="col-md-12">
				<img src="{{asset('Dalia.jpeg')}}" style="width: 450px;" alt="wrapkit" class="img-fluid rounded-circle" />
			</div>
			<div class="col-md-12 text-center">
				<div class="pt-2">
				<h5 class="mt-4 font-weight-medium mb-0">Dalia Mohamed</h5>
				<h6 class="subtitle mb-3">Software Engineer</h6>
				<p>Expeirienced Fullstack ITI Graduate</p>
				<ul class="list-inline">
				<li class="list-inline-item"><a href="https://www.linkedin.com/in/dalia-matter/" class="text-decoration-none d-block px-1"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
				<li class="list-inline-item"><a href="https://github.com/DaliaMatter" class="text-decoration-none d-block px-1"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
				</ul>
				</div>
			</div>
			</div>
			<!-- Row -->
		</div>
		<!-- column  -->
		
		<!-- column  -->
		<div class="col-lg-4 mb-4">
			<!-- Row -->
			<div class="row">
			<div class="col-md-12">
				<img src="{{asset('Mahmoud.jpeg')}}" style="width: 450px;" alt="wrapkit" class="img-fluid rounded-circle" />
			</div>
			<div class="col-md-12 text-center">
				<div class="pt-2">
				<h5 class="mt-4 font-weight-medium mb-0">Mahmoud Assem</h5>
				<h6 class="subtitle mb-3">Software Engineer</h6>
				<p>Expeirienced Fullstack ITI Graduate</p>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="https://www.linkedin.com/in/mahmoud-assem-30b7a9153/" class="text-decoration-none d-block px-1"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="https://github.com/mahmoud2121996" class="text-decoration-none d-block px-1"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
				</ul>
				</div>
			</div>
			</div>
			<!-- Row -->
		</div>
		</div>
	</div>
	</div>
</section>

<!--================ Start important-points section =================-->
<section class="donation_details pad_top" id="statistics">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="{{asset('css/img/icons/home1.png')}}" alt="">
					<h4>Total Donations</h4>
					<p>
						{{ $totalDonations }} blood bag 
					</p>
				</div>
				
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="{{asset('css/img/icons/home3.png')}}" alt="">
					<h4>Highest Donation</h4>
					<p>
					{{ $maxDonation }} blood bag 
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="{{asset('css/img/icons/home2.png')}}" alt="">
					<h4>Most Donating Hospital</h4>
					<p>
					{{ $topHospital }} Hospital  
					</p>
				</div>
				<div class="col-lg-3 col-md-6 single_donation_box">
					<img src="{{asset('css/img/icons/home4.png')}}" alt="">
					<h4>Most Donating Donor</h4>
					<p>
					{{ $topDonor }}
					</p>
				</div>
			</div>
		</div>
	</section>
	<!--================ End important-points section =================-->

<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap"id="requests">
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Our Major Campaigns</h1>
					<p>
						We Help others by providing campaigns and donations
					</p>
				</div>
			</div>

			<div class="row">
				<div id="our-major-cause" class="owl-carousel">

					 @foreach( $campaigns as $campaign)
						<div class="card">
							<div class="card-body">
								<figure>
									@if($campaign->blood_type == 'A')
									<img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type A.jpg')}}" alt="Card image cap">
									@elseif($campaign->blood_type == 'B')
									<img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type B.jpg')}}" alt="Card image cap">
									@elseif($campaign->blood_type == 'AB')
									<img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type AB.jpg')}}" alt="Card image cap">
									@else
									<img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type O.jpg')}}" alt="Card image cap">
									@endif
								</figure>
								<div class="progress">
									<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($campaign->received_amount / $campaign->needed_amount)*100 }}%;">
										<span>Collected {{ ($campaign->received_amount / $campaign->needed_amount)*100 }}%</span>
									</div>
								</div>
								<div class="card_inner_body">
									<div class="card-body-top">
										<span>Raised: {{ $campaign->received_amount }}</span> / {{ $campaign->needed_amount }}
									</div>
									@if(isset($campaign->name))
									<h4 class="card-title">{{ $campaign->name }}</h4>
									@else
									<h4 class="card-title">{{ $campaign->hospital->name }}</h4>
									@endif
									<p><strong> Hospital: </strong> {{ $campaign->hospital->name }}, <strong> Blood Type : </strong> {{ $campaign->blood_type }} </p>
									<p class="card-text">{{ $campaign->details }}</p>
								</div>
							</div>
						</div>
               		 @endforeach

					
					<!-- <div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d1.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: 76%;">
									<span>Funded 76%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: $7,689</span> / $10,000
								</div>
								<h4 class="card-title">Did not find your Package</h4>
								<p class="card-text">inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially
									in the workplace that’s why it’s crucial.
								</p>
								<a href="#" class="main_btn2">donate here</a>
							</div>
						</div>
					</div> -->

				</div>
			</div>
	
		</div>
	</section>
	<!--================ Ens Our Major Cause section =================-->

<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap"id="stories">
	<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12">
					<h1>Inspiring Donation Stories</h1>
					<p>
						See our donor stories and how it impacts our life and life of every patient
					</p>
				</div>
			</div>
			<div class="row">
				<!-- <div id="our-major-cause" class="owl-carousel"> -->
				@foreach( $stories as $story)
				<div class="col-lg-4">
						<div class="card">
							<div class="card-body">
								<figure>
									@if($story->image)
									<img style="height:285px;" src="{{asset('/stories/'.$story->image)}}" alt="" class="img-fluid">
									@else
									<img style="height:285px;" src="{{asset('css/img/elements/d.jpg')}}" alt="" class="img-fluid">
									@endif
								</figure>
								<div class="card_inner_body">
									<h4 class="card-title">{{ $story->title }} </h4>
									<p><strong> Author: </strong> {{ $story->user->name }}</p>
									<p class="card-text">“{{ $story->story }}”</p>
								</div>
							</div>
						</div>
					</div>
				@endforeach
				<!-- </div> -->
			</div>
	
		</div>
	</section>
	<!--================ Ens Our Major Cause section =================-->


<!--================ Start Clients Logo Area =================-->
<!-- <section class="clients_logo_area section_gap">
		<div class="container">
			<div class="clients_slider owl-carousel">
				<div class="item">
					<img src="{{asset('css/img/clients-logo/c-logo-1.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('css/img/clients-logo/c-logo-2.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('css/img/clients-logo/c-logo-3.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('css/img/clients-logo/c-logo-4.png')}}" alt="">
				</div>
				<div class="item">
					<img src="{{asset('css/img/clients-logo/c-logo-5.png')}}" alt="">
				</div>
			</div>
		</div>
	</section> -->
	<!--================ End Clients Logo Area =================-->
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

