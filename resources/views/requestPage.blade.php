@extends('layouts.hospital')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="section-top-border" style=" border: solid #ff8080; border-radius: 80px;padding :30px">
                    <hr>
                    <p class="h3 mb-4 text-center">{{$request->hospital->name}}</p>
                    <hr>

                    <div class="form-group row">
                        <label  class="col-sm-3"><strong>Request Name</strong></label>
                        <div>
                            <label>{{$request->name}}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-3"><strong>Request Details</strong></label>
                        <div  style="margin-top: 9px;" >
                            <label>{{$request->details}}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label"><strong>Blood Type</strong></label>
                        <div style="margin-top: 9px;" >
                            <label>{{$request->blood_type}}</label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label"><strong>Needed Amount</strong></label>
                        <div style="margin-top: 9px;" >
                            <label>{{$request->needed_amount}}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label"><strong>Received Amount</strong></label>
                        <div style="margin-top: 9px;" >
                            <label>{{$request->received_amount}}</label>
                        </div>
                    </div>
                    
                    <div class="col text-center">
                        @if($request->hospital_id === Auth::guard('hospital')->user()->id)
                            <form class="text-center" action="{{ route('requests.destroy',$request->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="main_btn2">Delete</button>
                            </form>
                        @else
                            <form id="donation-form" action="{{ url('hospital/donate/'.$request->id)}}" method="GET">
                                @csrf
                                <button type="submit" class="main_btn2">donate here</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection