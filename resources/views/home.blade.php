@extends('layouts.donor')

@section('content')

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
						<a class="main_btn mr-10" href="#">donate now</a>
						<a class="white_bg_btn" href="#">view activity</a>
					</div>
				</div>
			</div>
		</div>
</section>
	<!--================ End Home Banner Area =================-->
  
@endsection
