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
                <div class="row">

                @foreach( $hospitals as $hospital)
				<div class="col-lg-4">
					<div class="card">
						<div class="card-body">
							<div class="card_inner_body">
								<div class="card-body-top">
                                </div>
                                <h4 class="card-title">{{ $hospital->name }}</h4>
                                <p><strong> Location: </strong> {{$hospital->city }}, <strong> Blood Shortage : </strong> 
                                
                                @if( ( $hospital->type_A_needed + $hospital->type_B_needed + $hospital->type_AB_needed + $hospital->type_O_needed ) -( $hospital->type_A_inventory + $hospital->type_B_inventory + $hospital->type_AB_inventory + $hospital->type_O_inventory ) >= 0 )
                                {{
                                   ( $hospital->type_A_needed + $hospital->type_B_needed + $hospital->type_AB_needed + $hospital->type_O_needed ) -( $hospital->type_A_inventory + $hospital->type_B_inventory + $hospital->type_AB_inventory + $hospital->type_O_inventory )
                                }}
                                @else
                                0
                                @endif

                                bags
                                </p>
                                <!-- <p class="card-text">{{ $hospital->city }}</p> -->
                                <div class="form-group row">
                                  
                                    <div class="col-sm-7">  
                                        <button onclick="myFunction('{{ $hospital->name }}','{{ $hospital->id }}');" type="button" class="main_btn2" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                                        Donate 
                                        </button>
                                    </div>

                                    <div style="margin-top: 35px;" class="col-sm-3"> 
                                        <form id="donation-form" action="{{route('createDonation',$hospital)}}" method="GET" enctype="multipart/form-data">
                                                @csrf
                                                <button type="submit" style="min-width: 100px;" class="genric-btn primary-border radius">Report</button>
                                        </form>
                                    </div>
                                 </div>
							</div>
						</div>
					</div>
				</div>
                @endforeach

			</div>
		</div>
	</section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{route('saveGeneralDonation')}}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="donations_amount" class="col-form-label">Donation Amount:</label>
            <input type="number" class="form-control" name="donations_amount" id="donations_amount">
            <input type="text" class="form-control" style="display:none;"  name="hospital_id" id="hospital_id">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Donate</button>
      </div>
      </form>
    </div>
  </div>
</div>




	<!--================ Ens Our Major Cause section =================-->
@endsection

@section('js')
<script>
// $('#exampleModal').on('show.bs.modal', function (event) {
//   var button = $(event.relatedTarget) // Button that triggered the modal
//   var recipient = button.data('whatever') // Extract info from data-* attributes
//   // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
//   // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
//   var modal = $(this)
//   modal.find('.modal-title').text('New message to ' + recipient)
//   modal.find('.modal-body input').val(recipient)
//   alert("I want this to appear after the modal has opened!");
// })

function myFunction(name,id) {
  event.preventDefault();
//   document.getElementById("hospital_id").value = id;
//   $('#hospital_id').text("Donate To " + name);
  $('#hospital_id').val(id);
  $('#exampleModalLabel').text("Donate To " + name);
//   document.getElementById("omar").innerHTML = "Your blood is not compatible with This Campaign";
//   setTimeout(function(){ document.getElementById("omar").style.display = "none"; }, 2000);
}
</script>
@endsection