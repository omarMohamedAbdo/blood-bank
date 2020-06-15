@extends('layouts.hospital')

    @section('content')
    <section class="contact_area p_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-30 title_color">Donations</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">#</div>
                            <div class="visit">Request ID</div>
                            <div class="visit">Donar Name</div>
                            <div class="visit">blood Type</div>
                            <div class="percentage">Amount</div>
                        </div>

                        @foreach( $allDonations as $donation)
                            <div class="table-row">
                                <div class="serial">01</div>
                                <div class="visit">{{ $donation->request_id }}</div>
                                <div class="visit">{{ $donation->user->name }}</div>
                                <div class="visit">{{ $donation->blood_type}}</div>
                                <div class="visit">{{ $donation->donations_amount}}</div>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                {{--  --}}
            </div>
        </div>
    </div>
    </section>
    @endsection