@extends('layouts.hospital')

    @section('content')
    <section class="contact_area p_120">
        <div class="whole-wrap">
            <div class="container">
                @if (isset($status))
                    <div class="alert alert-danger" role="alert">
                        <ul>
                            @foreach ($status as $statu)
                            <li>{{ $statu }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="section-top-border">
                    <div class="row">
                        <div class="col-lg-6 col-md-8">
                            <h3 class="mb-30 title_color">Personal Info.</h3>
                            {{-- Personal Info --}}
                            <div class="input-group-icon mt-10">
                                <div class="icon">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <input type="text" name="first_name" placeholder="First Name"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required
                                    class="single-input" value = "{{ $donor->name}}" disabled>
                            </div>
                            
                            <div class="input-group-icon mt-10">
                                <div class="icon">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
                                <input type="email" name="EMAIL" placeholder="Email address"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email address'" required
                                    class="single-input" value = "{{ $donor->email}}" disabled>
                            </div>

                            <div class="input-group-icon mt-10">
                                <div class="icon">
                                    <i class="fa fa-thumb-tack" aria-hidden="true"></i>
                                </div>
                                <input type="text" name="address" placeholder="Address" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Address'" required class="single-input" value = "{{ $donor->city}}" disabled>
                            </div> 

                            <div class="input-group-icon mt-10">
                                <div class="icon">
                                    <i class="fa fa-tint" aria-hidden="true"></i>
                                </div>
                                <input type="text" name="blood" placeholder="Blood type" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Blood Type'" required class="single-input" value = "{{ $donor->blood_type}}" disabled>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-4 mt-sm-30 element-wrap">
                            <div class="single-element-widget">
                                @if (session('update'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('update') }}
                                    </div>
                                @endif
                                <h3 class="mb-30 title_color">Medical Info.</h3>
                                <form action="{{route('donors.update',$donor)}}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                    <div class="switch-wrap d-flex justify-content-between">
                                        <p>Hepatitis B virus (HBV)</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" name = "HBV" id="HBV" @if ($donor->HBV == 1) checked @endif >
                                            <label for="HBV"></label>
                                        </div>
                                    </div>

                                    <div class="switch-wrap d-flex justify-content-between">
                                        <p>Hepatitis C virus (HCV)</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" name="HCV" id="HCV" @if ($donor->HCV == 1) checked @endif >
                                            <label for="HCV"></label>
                                        </div>
                                    </div>

                                    <div class="switch-wrap d-flex justify-content-between">
                                        <p>Human Immunodeficiency virus (HIV)</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" name="HIV" id="HIV" @if ($donor->HIV == 1) checked @endif >
                                            <label for="HIV"></label>
                                        </div>
                                    </div>

                                    <div class="switch-wrap d-flex justify-content-between">
                                        <p>Human T-Lymphotropic Virus (HTLV)</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" name="HTLV" id="HTLV" @if ($donor->HTLV == 1) checked @endif >
                                            <label for="HTLV"></label>
                                        </div>
                                    </div>

                                    <div class="switch-wrap d-flex justify-content-between">
                                        <p>Treponema pallidum (syphilis)</p>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" name="syphilis" id="syphilis" @if ($donor->syphilis == 1) checked @endif >
                                            <label for="syphilis"></label>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="switch-wrap d-flex justify-content-between">
                                        <h5>Re-Test</h5>
                                        <div class="primary-checkbox">
                                            <input type="checkbox" name="test" id="test" @if ($testFlag == 0) checked @endif>
                                            <label for="test"></label>
                                        </div>
                                    </div>

                                    {!! Form::button ('<a class="genric-btn success circle">Update Medical Data</a>' ,['type' => 'submit' , 'class' => 'genric-btn ']) !!}
                                </form>
                                <hr>
                                <form action="{{route('donors.destroy',$donor)}}" method="POST" >
                                    {!! Form::button ('<a class="genric-btn danger circle">Deactivate this Donor</a>' ,['type' => 'submit' , 'class' => 'genric-btn ']) !!}
                                @csrf
                                @method('DELETE')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection