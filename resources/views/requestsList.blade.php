@extends('layouts.hospital')

@section('css')


@endsection

@section('content')
<section class="contact_area p_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-30 title_color">Requests</h3>
                <div class="progress-table-wrap">
                    <div class="progress-table">
                        <div class="table-head">
                            <div class="serial">hospital</div>
                            <div class="serial">type</div>
                            <div class="serial">Amount</div>
                            <div class="serial">view</div>
                        </div>
                        @foreach( $requests as $request)
                        @if($request->is_emergency)
                        <div class="table-row" style="background-color: #ff8080;">
                            <div class="serial">{{ $request->hospital->name }}</div>
                            <div class="serial">{{ $request->blood_type }}</div>
                            <div class="serial">{{ $request->needed_amount }}</div>
                            <div class="serial"><a href="{{ route('requests.show',$request->id) }}">view</a></div>
                        </div>
                        @else
                        <div class="table-row">
                            <div class="serial">{{ $request->hospital->name }}</div>
                            <div class="serial">{{ $request->blood_type }}</div>
                            <div class="serial">{{ $request->needed_amount }}</div>
                            <div class="serial"><a href="{{ route('requests.show',$request->id) }}">view</a></div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')


@endsection