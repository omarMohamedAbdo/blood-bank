@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>My Donations</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="#">My Donations</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
<section class="contact_area p_120">
        <div class="container">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Campaign</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Hospital</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Donations Amount</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donations as $donation)
                <tr>
                    <th scope="row">{{$donation->id}}</th>
                    @if($donation->request_id)
                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$donation->request->name}}</th>
                    @elseif($donation->target_hospital_id)
                    <th style="text-align: center; vertical-align: middle;" scope="row"></th>
                    @else
                    <th style="text-align: center; vertical-align: middle;" scope="row">No Name</th>
                    @endif

                    @if($donation->request_id)
                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$donation->request->hospital->name}}</th>
                    @else
                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$donation->recievingHospital->name}}</th>
                    @endif

                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$donation->donations_amount}}</th>
                    <th style="text-align: center; vertical-align: middle;" scope="row">
                    {{$donation->status}}
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>


        
        </div>
</section>

  
@endsection
