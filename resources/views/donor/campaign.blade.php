@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Campaigns</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="/campaigns">Campaigns</a>
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

                @foreach( $campaigns as $campaign)
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="https://picsum.photos/200/150" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($campaign->received_amount / $campaign->needed_amount)*100 }}%;">
									<span>Funded {{ ($campaign->received_amount / $campaign->needed_amount)*100 }}%</span>
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
                                <!-- <a class="main_btn2" href="{{ route('createDonation',$campaign->id) }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('donation-form').submit();">
                                                        {{ __('donate here') }}
                                </a> -->
                                <form id="donation-form" action="{{route('createDonation',$campaign)}}" method="GET" enctype="multipart/form-data">
                                        @csrf
                                        <button type="submit" onclick="if({{ $campaign->blood_type != Auth::user()->blood_type }})myFunction();" class="main_btn2">donate here</button>
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
