@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Share your story</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="#">Share your story</a>
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
                    <h4>Share your Story </h4>
                    @if (Session::has('succes'))
                                <div class="alert alert-success">{{ Session::get('succes') }}</div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{route('savesharedStory')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="form-group form-inline">
                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __(' Name : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Blood Type : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                  <input type="text" class="form-control" id="name" value="{{ Auth::user()->blood_type }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>

                            <label for="name" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Location : ') }}</strong></label>
                            <div class="form-group col-lg-2 col-md-2 name">
                                <input type="text" class="form-control" id="name" value="{{ Auth::user()->city  }}" readonly onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            </div>
                            
                        </div>
                        <div class="form-group form-inline">
                            <label style="margin-left:-1%;" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Title : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                                 <input style="border-style: solid;border-width: thin;" type="text" required class="form-control @error('title') is-invalid @enderror" id="donations_amount" name="title" value="{{ old('title') }}" autocomplete="title" placeholder="Story title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Story title'">
                            </div>  
                        </div>
                        <div class="form-group form-inline">
                            <label style="margin-left:-1%;" class="col-md-2 col-form-label text-md-right"><strong>{{ __('Image : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                                 <input style="border-style: solid;border-width: thin;" type="file" required class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" autocomplete="image" placeholder="image" onfocus="this.placeholder = ''" onblur="this.placeholder = 'image'">
                            </div>  
                        </div>
                        <div class="form-group form-inline">
                            <label  class="col-md-2 col-form-label text-md-right"><strong>{{ __('Story : ') }}</strong></label>
                            <div class="form-group col-lg-10 col-md-10 ">
                            </div>  
                        </div>
                        <div class="form-group">
                            <textarea style="width:95%;margin-left: 5%"  class="form-control mb-8" rows="5" id="story" name="story" placeholder="Your Story" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Story'"
                                ></textarea>
                        </div>
                        
                        <button type="submit" style="margin-left: 60%" class="primary-btn submit_btn">Share</button>
                    </form>
                </div>
            <!-- </div> -->
            </div>
        </div>
    </section>

  
@endsection
