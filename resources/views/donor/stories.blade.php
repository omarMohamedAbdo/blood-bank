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

        <div class="section-top-border">
				<h3 class="mb-30 title_color">Block Quotes</h3>
				<div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('css/img/elements/d.jpg')}}" alt="" class="img-fluid">
                    </div>
					<div class="col-md-9">
                    
						<blockquote class="generic-blockquote">
							“Recently, the US Federal government banned online casinos from operating in America by
							making it illegal to transfer money
							to them through any US bank or payment system. As a result of this law, most of the popular
							online casino networks
							such as Party Gaming and PlayTech left the United States. Overnight, online casino players
							found themselves being
							chased by the Federal government. But, after a fortnight, the online casino industry came up
							with a solution and new
							”
						</blockquote>
					</div>
				</div>
			</div>
			<div class="section-top-border text-right">
				<h3 class="mb-30 title_color">Right Aligned</h3>
				<div class="row">
					<div class="col-md-9">
						<p class="text-right">Over time, even the most sophisticated, memory packed computer can begin
							to run slow if we don’t do something to prevent
							it. The reason why has less to do with how computers are made and how they age and more to
							do with the way we use
							them. You see, all of the daily tasks that we do on our PC from running programs to
							downloading and deleting software
							can make our computer sluggish. To keep this from happening, you need to understand the
							reasons why your PC is getting
							slower and do something to keep your PC running at its best. You can do this through regular
							maintenance and PC performance
							optimization programs</p>
						<p class="text-right">Before we discuss all of the things that could be affecting your PC’s
							performance, let’s talk a little about what symptoms</p>
					</div>
					<div class="col-md-3">
						<img src="{{asset('css/img/elements/d.jpg')}}" alt="" class="img-fluid">
					</div>
				</div>
            </div>
            
        
        </div>
    </div>

@endsection

@section('js')
<script>

</script>
@endsection