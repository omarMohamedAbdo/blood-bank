@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>{{ Auth::user()->name }}</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="#">Profile</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
   
  
@endsection
