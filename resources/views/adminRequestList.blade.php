@extends('layouts.admin')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Details</th>
                    <th scope="col">Name</th>
                    <th scope="col">Hospital</th>
                    <th scope="col">Emergency</th>
                    <th scope="col">Blood Type</th>
                    <th scope="col">Needed Amount</th>
                    <th scope="col">Received Amount</th>
                    <th scope="col">Completed</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($requests as $request)
                <tr>
                    <th scope="row">{{$request->id}}</th>
                    <th scope="row">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#exampleModalLong-{{$request->id}}">
                            View
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong-{{$request->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">{{$request->hospital->name}} Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{$request->details}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </th>
                    <th scope="row">{{$request->name}}</th>
                    <th scope="row">{{$request->hospital->name}}</th>
                    @if($request->is_emergency == 1)
                    <th scope="row">Yes</th>
                    @else
                    <th scope="row">No</th>
                    @endif
                    <th scope="row">{{$request->blood_type}}</th>
                    <th scope="row">{{$request->needed_amount}}</th>
                    <th scope="row">{{$request->received_amount}}</th>
                    @if($request->is_completed == 1)
                    <th scope="row">Yes</th>
                    @else
                    <th scope="row">No</th>
                    @endif
                    <th scope="row">
                        <form action="/admin/deleteRequest" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$request->id}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</section>
@endsection