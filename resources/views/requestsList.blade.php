@extends('layouts.hospital')

@section('content')

<section class="contact_area p_120">
    <div class="container">
        <div class="row">

            @foreach( $requests as $request)

            @if($private == false)
                @if($request->target_hospital_id)
                @continue
                @endif
            @endif
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <figure>
                            @if($request->blood_type == 'A')
                            <img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type A.jpg')}}" alt="Card image cap">
                            @elseif($request->blood_type == 'B')
                            <img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type B.jpg')}}" alt="Card image cap">
                            @elseif($request->blood_type == 'AB')
                            <img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type AB.jpg')}}" alt="Card image cap">
                            @else
                            <img style="height:285px;" class="card-img-top img-fluid" src="{{asset('type O.jpg')}}" alt="Card image cap">
                            @endif
                        </figure>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="76" aria-valuemin="0" aria-valuemax="100" style="width: {{ ($request->received_amount / $request->needed_amount)*100 }}%;">
                                <span>Collected {{ ($request->received_amount / $request->needed_amount)*100 }}%</span>
                            </div>
                        </div>
                        <div class="card_inner_body">
                            <div class="card-body-top">
                                <span>Raised: {{ $request->received_amount }}</span> / {{ $request->needed_amount }}
                            </div>
                            @if(isset($request->name))
                            <h4 class="card-title">{{ $request->name }}</h4>
                            @else
                            <h4 class="card-title">{{ $request->hospital->name }}</h4>
                            @endif
                            <p><strong> Hospital: </strong> {{ $request->hospital->name }}, <strong> Blood Type : </strong> {{ $request->blood_type }} </p>
                            <p class="card-text">{{ $request->details }}</p>

                            <a href="{{ route('requests.show',$request->id) }}" class="btn btn-primary">View</a>
                            @if($request->hospital_id === Auth::guard('hospital')->user()->id)
                            <form action="{{ route('requests.destroy',$request->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>



</section>
@endsection