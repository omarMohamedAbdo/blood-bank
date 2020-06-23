@extends('layouts.hospital')
@section('css')


@endsection

    @section('content')
    <section class="contact_area p_120">
    <div class="container">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-6 col-md-8">
                    <h3 class="mb-30 title_color">Type A Donations</h3>
                    <div>
                        {!! $Achart->container() !!}
                    </div>
                    <hr>
                    <h3 class="mb-30 title_color">Type AB Donations</h3>
                    <div>
                        {!! $ABchart->container() !!}
                    </div>
                </div>
                <div class="col-lg-6 col-md-4 mt-sm-30 element-wrap">
                    <div class="single-element-widget">
                        <h3 class="mb-30 title_color">Type B Donations</h3>
                        <div>
                            {!! $Bchart->container() !!}
                        </div>
                        <hr>
                        <h3 class="mb-30 title_color">Type O Donations</h3>
                        <div>
                            {!! $Ochart->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{!! $Achart->script() !!}
{!! $Bchart->script() !!}
{!! $ABchart->script() !!}
{!! $Ochart->script() !!}
@endsection