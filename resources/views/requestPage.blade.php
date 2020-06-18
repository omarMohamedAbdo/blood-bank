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
                <a href="#" class="btn btn-primary">Donate</a>
            </div>
        </div>
    </div>
</section>
@endsection