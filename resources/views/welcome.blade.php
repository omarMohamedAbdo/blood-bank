


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
                                    @elseif(Auth::guard('hospital')->check())
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ url('/hospital') }}">Hospital Home</a>
                                        </li>
                                    @else
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                        <li class="nav-item ">
                                        <a class="nav-link" href="{{ route('hospitalLogin') }}">Hospital Login</a>
                                        </li>
                                        <li class="nav-item">
                                        <a class="nav-link" href="{{ route('hospitalRegister') }}">Hospital Register</a>
                                        </li>

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
						<p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price You may see some
							for as low as each.</p>
						<!-- <a class="main_btn mr-10" href="#">donate now</a> -->
						<a class="white_bg_btn" href="#">view activity</a>
					</div>
				</div>
			</div>
		</div>
</section>
	<!--================ End Home Banner Area =================-->

<section class="">
	<div class="py-5 team4">
	<div class="container">
		<div class="row justify-content-center mb-4">
		<div class="col-md-7 text-center">
			<h3 class="mb-3">Our Amazing Team</h3>
			<h6 class="subtitle">You can relay on our amazing features list and also our customer services will be great experience for you without doubt and in no-time</h6>
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
				<p>You can relay on our amazing features list and also our customer services will be great experience.</p>
				<ul class="list-inline">
				<li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
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
				<p>You can relay on our amazing features list and also our customer services will be great experience.</p>
				<ul class="list-inline">
				<li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
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
				<p>You can relay on our amazing features list and also our customer services will be great experience.</p>
				<ul class="list-inline">
					<li class="list-inline-item"><a href="https://www.linkedin.com/in/mahmoud-assem-30b7a9153/" class="text-decoration-none d-block px-1"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a></li>
					<li class="list-inline-item"><a href="#" class="text-decoration-none d-block px-1"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a></li>
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
<!--================ Start Experience Area =================-->
<section class="experience_donation section_gap">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-lg-12">
					<h1>Experience How your Donation Can Reach</h1>
					<p>he French Revolution constituted for the conscience of the dominant aristocratic class a fall from innocence, and upturning
						of the natural chain of events that resounded.</p>
					<a href="#" class="main_btn2 mr-10">make donation now</a>
					<a href="#" class="main_btn2">Create Fundraising today</a>
				</div>
			</div>
		</div>
	</section>
	<!--================ End Experience Area =================-->
	<!--================ Start Footer Area  =================-->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-5  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">About Me</h6>
						<p>
							Do you want to be even more successful? Learn to love learning and growth. The more effort you put into improving your skills,
						</p>
					</div>
				</div>
				<div class="col-lg-5 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6 class="footer_title">Newsletter</h6>
						<p>Stay updated with our latest trends</p>
						<div id="mc_embed_signup">
							<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
							 method="get" class="subscribe_form relative">
								<div class="input-group d-flex flex-row">
									<input name="EMAIL" placeholder="Enter Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '"
									 required="" type="email">
									<button class="btn sub-btn">
										<span class="lnr lnr-arrow-right"></span>
									</button>
								</div>
								<div class="mt-10 info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget f_social_wd">
						<h6 class="footer_title">Follow Us</h6>
						<p>Let us be social</p>
						<div class="f_social">
							<a href="#">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a href="#">
								<i class="fa fa-dribbble"></i>
							</a>
							<a href="#">
								<i class="fa fa-behance"></i>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<p class="copyright"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</p>
				</div>
			</div>
		</div>
	</footer>
    <!--================ End Footer Area  =================-->
    
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

