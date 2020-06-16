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
						<a href="#">Donate to {{ $campaign->name }} Campaign</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
    <section class="contact_area p_120">
        <div class="container">
            <div class="section-top-border" style=" border: solid #ff8080; border-radius: 80px;padding :30px">
            <!-- <div class="row"> -->
                <div class="comment-form">
                    <h4>Donate Now </h4>
                    <form action="{{route('saveDonation',$campaign)}}" method="POST" enctype="multipart/form-data">
                        <div class="form-group form-inline">
                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Donor Name : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Blood Type : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->blood_type }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Hospital : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ $campaign->hospital->name }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            
                        </div>
                        <div class="form-group form-inline">
                            <label style="margin-left:-1%;" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Amount : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                                 <input  type="number" required class="form-control" id="donations_amount" name="donations_amount" placeholder="Donation Amount" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Donation Amount'">
                            </div>  
                        </div>
                        <div class="form-group form-inline">
                            <label  class="col-md-2 col-form-label text-md-right"><strong>{{ __('Comments : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                            </div>  
                        </div>
                        <div class="form-group">
                            <textarea style="width:95%;margin-left: 5%"  class="form-control mb-8" rows="5" id="comments" name="comments" placeholder="Comments" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                ></textarea>
                        </div>
                        <a href="#" style="margin-left: 60%" class="primary-btn submit_btn">Donate</a>
                    </form>
                </div>
            <!-- </div> -->
            </div>
        </div>
    </section>

  
@endsection
