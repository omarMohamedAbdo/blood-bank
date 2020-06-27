@extends('layouts.donor')

@section('css')

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


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

.modal-header-info {
    color:#fff;
    padding:9px 15px;
    border-bottom:1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
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
<section class="contact_area p_120">
<div class="container" > 
    <hr />
    <div class="row">
          <div class="col-sm-3 col-md-2">
            <!-- <a href="#" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a> -->
            <!-- <button onclick="myFunction()" type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                        COMPOSE 
            </button> -->
            <button  type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#modalCompose" data-whatever="@mdo">
                                        COMPOSE 
            </button>
            <hr />
            <ul class="nav nav-pills nav-stacked">
                <li style="width:100%;" class="active"><a href="#"><span class="badge pull-right">{{ $receivedMessages->count() }}</span> Inbox </a>
                </li>
                <li style="width:100%;"><a href=""><span class="badge pull-right">{{ $sentMessages->count() }}</span>Sent</a></li>
            </ul>
        </div>
        <div class="col-sm-9 col-md-10">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                <li><a href="#profile" data-toggle="tab"><span class="glyphicon glyphicon-send"></span>
                    Sent Messages</a></li>
                <!-- <li><a href="#messages" data-toggle="tab"><span class="glyphicon glyphicon-tags"></span>
                    Promotions</a></li>
                <li><a href="#settings" data-toggle="tab"><span class="glyphicon glyphicon-plus no-margin">
                </span></a></li> -->
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade in active" id="home">
                    <div class="list-group">

                        @foreach( $receivedMessages as $receivedMessage )

                        <a href="#" data-toggle="modal" data-target="#modalShow" onclick="myFunction('{{ $receivedMessage->subject }}','{{ $receivedMessage->message }}','{{ $receivedMessage->senderHospital->name }}');" class="list-group-item">
                           
                           <span class="glyphicon glyphicon-envelope"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">  {{ $receivedMessage->senderHospital->name }}</span> <span class="">{{ $receivedMessage->subject }}</span>
                            <span class="text-muted" style="font-size: 11px;">- {{ $receivedMessage->message }}</span> <span
                                class="badge">{{ $receivedMessage->created_at }}</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span>
                        </a>

                        @endforeach
                   
                    </div>
                </div>
                <div class="tab-pane fade in" id="profile">
                    <div class="list-group">
                        <div class="list-group-item">
                    
                        @foreach( $sentMessages as $sentMessage )

                        <a href="#" data-toggle="modal" data-target="#modalShow" onclick="myFunction('{{ $sentMessage->subject }}','{{ $sentMessage->message }}','{{ Auth::user()->name }}');" class="list-group-item">
                        
                        <span class="glyphicon glyphicon-envelope"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">  {{ $sentMessage->receiverHospital->name }}</span> <span class="">{{ $sentMessage->subject }}</span>
                            <span class="text-muted" style="font-size: 11px;">- {{ $sentMessage->message }}</span> <span
                                class="badge">{{ $sentMessage->created_at }}</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span>
                        </a>

                        @endforeach
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!-- /.modal compose message -->
<div class="modal fade" id="modalCompose">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-header-info">
            <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span> Compose Message</h4>
            <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3" for="inputTo"><span class="glyphicon glyphicon-user"></span> To</label>
                  <div class="col-sm-9"><input type="email" class="form-control" id="inputTo" placeholder="comma separated list of recipients"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3" for="inputSubject"><span class="glyphicon glyphicon-list-alt"></span> Subject</label>
                  <div class="col-sm-9"><input type="text" class="form-control" id="inputSubject" placeholder="subject"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12" for="inputBody"><span class="glyphicon glyphicon-list"></span> Message</label>
                  <div class="col-sm-12"><textarea class="form-control" id="inputBody" rows="8"></textarea></div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <!-- <button type="button" style="margin-right:40%;" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>  -->
            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Discard</button>
            <button type="button" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button>
            
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal compose message -->


    <!-- /.modal show message -->
<div class="modal fade" id="modalShow">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header modal-header-info">
            <h4 class="modal-title"><span class="glyphicon glyphicon-envelope"></span>  Message</h4>
            <button  type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body">
            <form role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-3" for="inputTo"><span class="glyphicon glyphicon-user"></span> From</label>
                  <div class="col-sm-9"><input type="email" class="form-control" id="inputFromShow" disabled value="{{ Auth::user()->name }}" placeholder="comma separated list of recipients"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3" for="inputSubject"><span class="glyphicon glyphicon-list-alt"></span> Subject</label>
                  <div class="col-sm-9"><input type="text" class="form-control" disabled id="inputSubjectShow" placeholder="subject"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-12" for="inputBody"><span class="glyphicon glyphicon-list"></span> Message</label>
                  <div class="col-sm-12"><textarea class="form-control" disabled id="inputBodyShow" rows="8"></textarea></div>
                </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Exit</button>
            <!-- <button type="button" class="btn btn-primary ">Send <i class="fa fa-arrow-circle-right fa-lg"></i></button> -->
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal show message -->


</section>


@endsection

@section('js')

<script>

function myFunction(subject,message,sender) {
  event.preventDefault();
  $('#inputFromShow').val(sender);
  $('#inputSubjectShow').val(subject);
  $('#inputBodyShow').val(message);
}
</script>

@endsection