@extends('layouts.hospital')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <div class="card mb-3">
            <img class="card-img-top" src="https://source.unsplash.com/random" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">{{$request->hospital->name}}</h5>
                <p class="card-text"> Discription : {{$request->details}}</p>
                <p class="card-text"> Blood Type : {{$request->blood_type}}</p>
                <p class="card-text"> Needed Amount : {{$request->needed_amount}}</p>
                <p class="card-text"> Received Amount : {{$request->received_amount}}</p>
                @if($request->hospital_id === Auth::guard('hospital')->user()->id)
                <form action="{{ route('requests.destroy',$request->id) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                @else
                <a href="#" class="btn btn-primary">Donate</a>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection