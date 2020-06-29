@extends('layouts.admin')

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <table class="table">
            <thead class="table-danger">
                <tr>
                    <th scope="col">ID</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Email</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Name</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">City</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Credentials</th>
                    <th style="text-align: center; vertical-align: middle;" scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$user->id}}</th>
                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$user->email}}</th>
                    <th style="text-align: center; vertical-align: middle;" scope="row">
                       <!-- <a href="{{ route('viewUser' , $user->id) }}"> {{$user->name}} </a> -->
                       {{$user->name}}
                    </th>
                    <th style="text-align: center; vertical-align: middle;" scope="row">{{$user->city}}</th>
                    <th style="text-align: center; vertical-align: middle;" scope="row">
                        @if($user->is_admin)
                        Admin
                        @else
                        User
                        @endif
                    </th>
                    <th style="text-align: center; vertical-align: middle;" scope="row">

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#myModal-{{$user->id}}">Update</button>

                        <!-- Modal -->
                        <div id="myModal-{{$user->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Update {{$user->name}}</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="modal-body">
                                        <form style="display: inline-block;" method="POST" action="/admin/updateUser">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label class="col-sm-3 col-form-label" >Name</label>
                                                <input class="col-sm-8 col-form-label" type="text" class="form-control" value="{{$user->name}}" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 col-form-label" for="exampleFormControlInput1">Email address</label>
                                                <input class="col-sm-8 col-form-label" type="email" class="form-control" id="exampleFormControlInput1" value="{{$user->email}}" name="email">
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                <div class="col-sm-3 col-form-label"><label for="exampleFormControlSelect1">City</label></div>
                                                <select class="col-sm-8 col-form-label" class="form-control" id="city" name="city">
                                                    @foreach($cities as $city)
                                                    @if($user->city == $city)
                                                    <option value="{{$city}}" selected>{{$city}}</option>
                                                    @else
                                                    <option value="{{$city}}">{{$city}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-3 col-form-label"><label  for="exampleFormControlSelect1">Blood Type</label></div>
                                                <select class="col-sm-8 col-form-label" class="form-control" id="blood_type" name="blood_type">
                                                    @foreach($bloodTypes as $bloodType)
                                                    @if($user->blood_type == $bloodType)
                                                    <option value="{{$bloodType}}" selected>{{$bloodType}}</option>
                                                    @else
                                                    <option value="{{$bloodType}}">{{$bloodType}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <input type="hidden" id="id" name="id" value="{{$user->id}}">
                                            <div style="display: block;">
                                                <button type="submit" class="btn btn-dark">update</button>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                       
                        <form action="/admin/deleteUser" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
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

                        <!-- @if($user->is_admin == 1)
                        <form action="/admin/downgradeUser" method="post" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-danger">Downgrade to User</button>
                        </form>
                        @else
                        <form action="/admin/upgradeUser" method="post" style="display: inline-block;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-success">Upgrade To Admin</button>
                        </form>
                        @endif -->

                    </th>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</section>
@endsection