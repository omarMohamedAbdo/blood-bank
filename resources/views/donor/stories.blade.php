@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Donors Stories Who helped Us</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="#">Stories</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->

    <div class="whole-wrap">
		<div class="container">

            @foreach($stories as $story)
                <div class="section-top-border">
                    <!-- <h3 class="mb-30 title_color">{{ $story->title }}, By : </h3>
                    <h6 style="display:inline;" class="typo-list">This is header 01</h6> -->
                    <p style="display:inline;color:black;font-size:30px;">{{ $story->title }}        </p>
                    <p style="display:inline;">   ,author : <strong>{{ $story->user->name }} </strong></p>
                    <br>

                    <br>
                    
                    <div class="row">
                        <div class="col-md-3">
                            <img src="{{asset('css/img/elements/d.jpg')}}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md-9">
                        
                            <blockquote class="generic-blockquote">
                                “{{ $story->story }}
                                ”
                            </blockquote>
                        </div>
                    </div>
                </div>
            @endforeach
        
        </div>
    </div>

@endsection

@section('js')
<script>

</script>
@endsection