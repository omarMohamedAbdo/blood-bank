@extends('layouts.hospital')

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
                <div class="col-md-8">
                    <h3 class="mb-30 title_color">Donations</h3>
                    <div class="progress-table-wrap">
                        <div class="progress-table">
                            <div class="table-head">
                                <div class="serial">ID</div>
                                <div class="visit">Donar</div>
                                <div class="visit">blood Type</div>
                                <div class="visit">Amount</div>
                                <div class="visit">Accept</div>
                                <div class="visit">Reject</div>
                            </div>
                            @foreach( $allDonations as $donations)
                                @foreach ($donations as $donation)
                                    @if($donation->status == "pending")
                                    <div class="table-row">
                                        <div class="serial">{{ $donation->request_id }}</div>
                                        <div class="visit">
                                            @if(@isset($donation->user_id))
                                                <a href="{{ url('/hospital/donors/'.$donation->user_id) }}" >{{ $donation->user->name }}</a>
                                            @else
                                                <a>{{ $donation->donorHospital->name }}</a>
                                            @endif
                                        </div>
                                        @if(@isset($donation->user_id))
                                            <div class="visit">{{ $donation->user->blood_type}}</div>
                                        @else
                                        <div class="visit">{{ $donation->blood_type}}</div>
                                        @endif
                                        
                                        <div class="visit">{{ $donation->donations_amount}}</div>
                                        <div class="visit">
                                            @if(isset($donation->user->last_test) || isset($donation->hospital_id))
                                                <form action="{{route('donations.update',$donation)}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                    {!! Form::button ('<a class="genric-btn success circle small">Accept</a>' ,['type' => 'submit' , 'class' => 'genric-btn ']) !!}
                                                </form>
                                                
                                                @endif    
                                            </div>
                                        <div class="visit">
                                            <form action="{{route('donations.destroy',$donation)}}" method="POST" >
                                                {!! Form::button ('<a class="genric-btn danger circle small">Reject</a>' ,['type' => 'submit' , 'class' => 'genric-btn ']) !!}
                                            @csrf
                                            @method('DELETE')
                                            </form>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            @endforeach
                            
                        </div>
                    </div>
                    {{--  --}}
                </div>
            </div>
    </div>
    </section>
    @endsection