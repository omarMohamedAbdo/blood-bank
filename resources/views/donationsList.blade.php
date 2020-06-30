@extends('layouts.hospital')
@section('css')
<style>
    .genric-btn{
        padding: 0 10px;
    }
</style>

@endsection

    @section('content')
    <section class="contact_area p_120">
    <div class="container">
        <div class="row justify-content-center section-title-wrap">
            <div class="col-lg-12">
                <h1>Remember</h1>
                <p>
                    Remember to check your donor medical data before making any decision about a donation.
                </p>
            </div>
        </div>
        
        @if (session('update'))
            <div class="alert alert-success" role="alert">
                {{ session('update') }}
            </div>
        @endif
            <div class="row justify-content-center">
                <div class="col-md-9">
                    <h3 class="mb-30 title_color">Donations</h3>
                    <div class="progress-table-wrap">
                        <table class="table table-striped" style=" border: solid #ff8080;">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Donar</th>
                                    <th scope="col">Blood Type</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Accept</th>
                                    <th scope="col">Reject</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach( $allDonations as $donations)
                                    @foreach ($donations as $donation)
                                        @if($donation->status == "pending")
                                        <tr>
                                            <th scope="row">{{ $donation->request_id }}</th>
                                            <td>
                                             @if($donation->request_id)
                                             {{$donation->request->name}}
                                             @elseif($donation->target_hospital_id)
                                             {{$donation->recievingHospital->name}}
                                             @endif
                                            </td>
                                            <td>
                                                @if(@isset($donation->user_id))
                                                    <a href="{{ url('/hospital/donors/'.$donation->user_id) }}" >{{ $donation->user->name }}</a>
                                                @else
                                                    <a>{{ $donation->donorHospital->name }}</a>
                                                @endif
                                            </td>
                                            @if(@isset($donation->user_id))
                                                <td> {{ $donation->user->blood_type}} </td>
                                            @else
                                            <td> {{$donation->blood_type}} </td>
                                            @endif
                                            
                                            <td>{{ $donation->donations_amount}}</td>
                                            <td>
                                                @if(isset($donation->user->last_test) || isset($donation->hospital_id))
                                                    <form action="{{route('donations.update',$donation)}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                        {!! Form::button ('<a class="btn genric-btn success circle small">Accept</a>' ,['type' => 'submit' , 'class' => 'genric-btn ']) !!}
                                                    </form>
                                                @endif    
                                            </td>
                                            <td>
                                                <form action="{{route('donations.destroy',$donation)}}" method="POST" >
                                                    {!! Form::button ('<a class="genric-btn danger circle small">Reject</a>' ,['type' => 'submit' , 'class' => 'genric-btn ']) !!}
                                                @csrf
                                                @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                @endforeach
                            
                            </tbody>
                        </table>
                    {{--  --}}
                </div>
            </div>
    </div>
    </section>
    @endsection