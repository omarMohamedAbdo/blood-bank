@extends('layouts.donor')

@section('css')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">

<style>
body{
    margin-top:20px;
    background-color:#e9ebee;
}

.be-comment-block {
    margin-bottom: 50px !important;
    border: 1px solid #edeff2;
    border-radius: 2px;
    padding: 50px 70px;
    border:1px solid #ffffff;
}

.comments-title {
    font-size: 16px;
    color: #262626;
    margin-bottom: 15px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-img-comment {
    width: 60px;
    height: 60px;
    float: left;
    margin-bottom: 15px;
}

.be-ava-comment {
    width: 60px;
    height: 60px;
    border-radius: 50%;
}

.be-comment-content {
    margin-left: 80px;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-name {
    font-size: 13px;
    font-family: 'Conv_helveticaneuecyr-bold';
}

.be-comment-content a {
    color: #383b43;
}

.be-comment-content span {
    display: inline-block;
    width: 49%;
    margin-bottom: 15px;
}

.be-comment-time {
    text-align: right;
}

.be-comment-time {
    font-size: 11px;
    color: #b4b7c1;
}

.be-comment-text {
    font-size: 13px;
    line-height: 18px;
    color: #7a8192;
    display: block;
    background: #f6f6f7;
    border: 1px solid #edeff2;
    padding: 15px 20px 20px 20px;
}

.form-group.fl_icon .icon {
    position: absolute;
    top: 1px;
    left: 16px;
    width: 48px;
    height: 48px;
    background: #f6f6f7;
    color: #b5b8c2;
    text-align: center;
    line-height: 50px;
    -webkit-border-top-left-radius: 2px;
    -webkit-border-bottom-left-radius: 2px;
    -moz-border-radius-topleft: 2px;
    -moz-border-radius-bottomleft: 2px;
    border-top-left-radius: 2px;
    border-bottom-left-radius: 2px;
}

.form-group .form-input {
    font-size: 13px;
    line-height: 50px;
    font-weight: 400;
    color: #b4b7c1;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #edeff2;
    border-radius: 3px;
}

.form-group .form-input:disabled {
    font-size: 13px;
    line-height: 50px;
    font-weight: 400;
    color: #b4b7c1;
    width: 100%;
    height: 50px;
    padding-left: 20px;
    padding-right: 20px;
    border: 1px solid #edeff2;
    border-radius: 3px;
}

    /* input[type="text"]:disabled {
        font-size: 13px;
        line-height: 50px;
        font-weight: 400;
        color: #b4b7c1;
        width: 100%;
        height: 50px;
        padding-left: 20px;
        padding-right: 20px;
        border: 1px solid #edeff2;
        border-radius: 3px;
    } */

.form-group.fl_icon .form-input {
    padding-left: 70px;
}

.form-group textarea.form-input {
    height: 150px;
}


</style>

@endsection

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>Feedbacks</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
						<a href="#">{{ $hospital->name }} Feedbacks</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
    <section class="contact_area p_120">
        <div class="container">
       
                <div class="be-comment-block">
               <hr>
                <h1 style="text-align: center;" > {{ $hospital->name }}</h1>
                <hr>
                <h4 style="text-align: center; color:grey;" > {{ $hospital->city }}</h4>

              
                <div class="row">
                    <!-- <div class="col-xs-12 col-sm-1 ">
                    </div>

                    <div class="col-xs-12 col-sm-5 ">
                     <h3>Hospital : <small>{{ $hospital->name }}</small></h3>
                    </div>
                    <div class="col-xs-12 col-sm-5 ">
                     <h3>City : <small>{{ $hospital->name }}</small></h3>
                    </div> -->
                    <!-- <label class="col-xs-12 col-sm-4 ">
                        
                    </label> -->
                </div>
                <br>
                @if (Session::has('succes'))
                                 <div class="alert alert-success">{{ Session::get('succes') }}</div>
                @endif
                <h1 class="comments-title">Feedbacks ({{ $hospital->feedbacks->count() }})</h1>
                @foreach($hospital->feedbacks as $feedback)
                <div class="be-comment">
                    <div class="be-img-comment">	
                        <a href="blog-detail-2.html">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="be-ava-comment">
                        </a>
                    </div>
                    <div class="be-comment-content">
                        
                            <span class="be-comment-name">
                                <a href="blog-detail-2.html">{{$feedback->user->name}}</a>
                                </span>
                            <span class="be-comment-time">
                                <i class="fa fa-clock-o"></i>
                                {{$feedback->created_at}}
                            </span>

                        <p class="be-comment-text">
                            {{$feedback->comment}} 
                        </p>
                    </div>
                </div>
                @endforeach
                
                
                <form class="form-block" action="{{route('saveUserFeedback',$hospital->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-user"></i></div>
                                <input  class="form-input" type="text" placeholder="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 fl_icon">
                            <div class="form-group fl_icon">
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <input class="form-input" type="text" placeholder="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12">									
                        <div class="form-group">
                            <textarea style="font-size:16px;" class="form-input" style="size:90px;" name="comment" id="comment" required="" placeholder="Your Comment"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-9 col-sm-9">
                        </div>	
                        <button type="submit" class="genric-btn info-border circle">Comment</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>

  
@endsection
