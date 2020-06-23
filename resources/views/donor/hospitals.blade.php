@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Hospitals</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="/hospitals">Hospitals</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
<!--================ Start Our Major Cause section =================-->
<section class="our_major_cause section_gap_custom">
		<div class="container">
        <div id="omar"  class="alert alert-danger" style="display: none;">Hi</div>
			<div class="row">

                @foreach( $hospitals as $hospital)
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							
							<div class="card_inner_body">
								<div class="card-body-top">
                                </div>
                                <h4 class="card-title">{{ $hospital->name }}</h4>
                                <p><strong> Hospital: </strong> {{$hospital->name }}, <strong> Blood Type : </strong>  </p>
                                <p class="card-text">{{ $hospital->city }}</p>
                                <!-- <a class="main_btn2" href="{{ route('createDonation',$hospital->id) }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('donation-form').submit();">
                                                        {{ __('donate here') }}
                                </a> -->
                                <form id="donation-form" action="{{route('createDonation',$hospital)}}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" onclick="if({{ $hospital->name != Auth::user()->blood_type }})myFunction();" class="main_btn2">donate here</button>
                                </form>
                                
								<!-- <a href="#" class="main_btn2">donate here</a> -->
							</div>
						</div>
					</div>
				</div>
                @endforeach

			</div>
		</div>
	</section>
	<!--================ Ens Our Major Cause section =================-->
<script>
function myFunction() {
  event.preventDefault();
  document.getElementById("omar").style.display = "block";
  document.getElementById("omar").innerHTML = "Your blood is not compatible with This Campaign";
  setTimeout(function(){ document.getElementById("omar").style.display = "none"; }, 2000);
}
</script>  
@endsection
