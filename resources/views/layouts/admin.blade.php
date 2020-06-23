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
                                    @guest
                                    <li class="nav-item submenu dropdown">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }} </a>

                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item submenu dropdown">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif
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
                                    @else
                                    <!-- <li class="nav-item active">
                                        <a class="nav-link" href="#">Donors</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('adminHome') }}">Home</a>
                                    </li>

                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Doners</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('userslList') }}">
                                                    View Doners
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('inactiveUserList') }}">
                                                    Inactive Doners
                                                </a>
                                            </li>

                                        </ul>
                                    </li>




                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hospitals</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('hospitalList') }}">
                                                    View Hospitals
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('inactiveHospitalList') }}">
                                                    Inactive Hospitals
                                                </a>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Requests</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    View Requests
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">
                                                    Private Requests
                                                </a>
                                            </li>

                                        </ul>
                                    </li>



                                    <li class="nav-item submenu dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</a>
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

                                    @endguest

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
    <section class="experience_donation section_gap" style=" bottom: 0;width: 100%;">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12">
                    <h1>Experience How your Donation Can Reach</h1>
                    <p>Copyright &copy; ITI 2020</p>
                    <a href="https://github.com/omarMohamedAbdo/blood-bank" class="main_btn2 mr-10"><i class="fa fa-github fa-lg" aria-hidden="true"></i> Github</a>
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