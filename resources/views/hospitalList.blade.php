@extends('layouts.admin')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name</th>
                    <th scope="col">City</th>
                    <th scope="col">Credentials</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)
                <tr>
                    <th scope="row">{{$hospital->id}}</th>
                    <th scope="row">{{$hospital->email}}</th>
                    <th scope="row">{{$hospital->name}}</th>
                    <th scope="row">{{$hospital->city}}</th>
                    <th scope="row">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-{{$hospital->id}}">
                            View
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal-{{$hospital->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel-{{$hospital->id}}">{{$hospital->name}} Credentials</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('/images/'.$hospital->credentials)}}" alt="Hospital Credentials">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th scope="row">
                        <form style="display: inline-block;">
                            @csrf
                            <input type="hidden" name="id" value="{{$hospital->id}}">
                            <button type="submit" class="btn btn-dark">update</button>
                        </form>
                        <form action="/admin/deleteHospital" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$hospital->id}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @if($hospital->is_active == 1)
                        <form action="/admin/deActiveHospital" method="post" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$hospital->id}}">
                            <button type="submit" class="btn btn-danger">Dectivate</button>
                        </form>
                        @else
                        <form action="/admin/activeHospital" method="post" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$hospital->id}}">
                            <button type="submit" class="btn btn-success">Activate</button>
                        </form>
                        @endif

                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</section>
@endsection