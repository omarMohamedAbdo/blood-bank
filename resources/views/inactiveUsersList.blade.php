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
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <th scope="row">{{$user->email}}</th>
                    <th scope="row">{{$user->name}}</th>
                    <th scope="row">{{$user->city}}</th>
                    <th scope="row">
                        @if($user->is_active == 1)
                            <form action="/admin/deActiveUser" method="post" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-danger">Dectivate</button>
                            </form>
                            @else
                            <form action="/admin/activeUser" method="post" style="display: inline-block;">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$user->id}}">
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