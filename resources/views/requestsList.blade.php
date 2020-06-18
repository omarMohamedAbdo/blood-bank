@extends('layouts.hospital')
@section('content')
<section class="contact_area p_120">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
        @foreach( $requests as $request)
        @if($request->is_emergency)
        <div class="card bg-danger text-white" style="width: 14rem; margin: 20px;">
            <img class="card-img-top" src="https://source.unsplash.com/random" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $request->hospital->name }}</p>
                <a href="{{ route('requests.show',$request->id) }}" class="btn btn-primary">View</a>
            </div>
        </div>
        @else
        <div class="card bg-secondary text-white" style="width: 14rem; margin: 20px;">
            <img class="card-img-top" src="https://source.unsplash.com/random" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $request->hospital->name }}</p>
                <a href="{{ route('requests.show',$request->id) }}" class="btn btn-primary">View</a>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</section>
@endsection