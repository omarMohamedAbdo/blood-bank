@extends('layouts.hospital')
@section('css')


@endsection

    @section('content')
    <section class="contact_area p_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        sh8al
                        Hi {{ Auth::guard('hospital')->user()->name }} !
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    @endsection