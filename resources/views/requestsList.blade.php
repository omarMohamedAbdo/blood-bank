@extends('layouts.hospital')

@section('content')
<section class="contact_area p_120">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-around;">
        @foreach( $requests as $request)
        @if($request->is_emergency)
        <div class="card bg-secondary text-white" style="width: 14rem; margin: 20px;">
            <img class="card-img-top" src="https://source.unsplash.com/random" alt="Card image cap">
            <div class="card-body">
                <h1><span class="badge badge-danger">Emergency</span></h1>
                <p class="card-text">{{ $request->hospital->name }}</p>
                <p class="card-text">Blood Type : {{ $request->blood_type }}</p>
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
        @else
        <div class="card bg-secondary text-white" style="width: 14rem; margin: 20px;">
            <img class="card-img-top" src="https://source.unsplash.com/random" alt="Card image cap">
            <div class="card-body">
                <p class="card-text">{{ $request->hospital->name }}</p>
                <p class="card-text">Blood Type : {{ $request->blood_type }}</p>
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
        @endif
        @endforeach
    </div>
</section>
@endsection