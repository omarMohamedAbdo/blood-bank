@extends('layouts.donor')

@section('css')

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<style>
body{ margin-top:50px;}
.nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
.tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
.tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
.tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
.tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
.tab-pane .list-group .glyphicon { margin-right:5px; }
.tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
a.list-group-item.read { color: #222;background-color: #F3F3F3; }
hr { margin-top: 5px;margin-bottom: 10px; }
.nav-pills>li>a {padding: 5px 10px;}

.ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 150%;border: 1px solid #E5E5E5; }
.ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 160%;}
.ad a.url {color: #093;text-decoration: none;}
</style>

@endsection

@section('content')
<!--================ Home Banner Area =================-->
<!--================ Banner Area =================-->
<!-- <section class="banner_area">
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
	</section> -->
    <!--================End Banner Area =================-->
	<!--================ End Home Banner Area =================-->
<section class="contact_area p_120">
<div class="container" style="width:200%;"> 
    
    <hr />
    <div class="row">
        <div class="col-sm-3 col-md-2">
            <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>
            <hr />
            <ul class="nav nav-pills nav-stacked">
                <li style="width:100%;" class="active"><a href="#"><span class="badge pull-right">42</span> Inbox </a>
                </li>
                <li style="width:100%;"><a  href="http://www.jquery2dotnet.com">Starred</a></li>
                <li style="width:100%;"><a href="http://www.jquery2dotnet.com">Important</a></li>
                <li style="width:100%;"><a href="http://www.jquery2dotnet.com">Sent Mail</a></li>
                <li style="width:100%;"><a href="http://www.jquery2dotnet.com"><span class="badge pull-right">3</span>Drafts</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                <li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-user"></span>
                    Social</a></li>
                <li><a href="#messages" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>
                    Promotions</a></li>
                <li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
                </span></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">
                        <a href="#" class="list-group-item">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox">
                                </label>
                            </div>
                            <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                            <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span></a><a href="#" class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                        </label>
                                    </div>
                                    <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                        display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                                    <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                        class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                        </span></span></a>
                    </div>
                </div>
                <div class="tab-pane fade in" id="profile">
                    <div class="list-group">
                        <div class="list-group-item">
                            <span class="text-center">This tab is empty.</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade in" id="messages">
                    ...</div>
                <div class="tab-pane fade in" id="settings">
                    This tab is empty.</div>
            </div>
            
        </div>
    </div>
</div>


</section>


@endsection

@section('js')

@endsection