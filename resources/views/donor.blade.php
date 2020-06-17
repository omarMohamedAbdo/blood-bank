@extends('layouts.hospital')

    @section('content')
    <section class="contact_area p_120">
        <div class="whole-wrap">
            <div class="container">
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
                                <h3 class="mb-30 title_color">Medical Info.</h3>
                                <div class="switch-wrap d-flex justify-content-between">
                                    <p>Hepatitis B virus (HBV)</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="HBV" @if ($donor->HBV == 1) checked @endif >
                                        <label for="HBV"></label>
                                    </div>
                                </div>

                                <div class="switch-wrap d-flex justify-content-between">
                                    <p>Hepatitis C virus (HCV)</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="HCV" @if ($donor->HCV == 1) checked @endif >
                                        <label for="HCV"></label>
                                    </div>
                                </div>

                                <div class="switch-wrap d-flex justify-content-between">
                                    <p>Human Immunodeficiency virus (HIV)</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="HIV" @if ($donor->HIV == 1) checked @endif >
                                        <label for="HIV"></label>
                                    </div>
                                </div>

                                <div class="switch-wrap d-flex justify-content-between">
                                    <p>Human T-Lymphotropic Virus (HTLV)</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="HTLV" @if ($donor->HTLV == 1) checked @endif >
                                        <label for="HTLV"></label>
                                    </div>
                                </div>

                                <div class="switch-wrap d-flex justify-content-between">
                                    <p>Treponema pallidum (syphilis)</p>
                                    <div class="primary-checkbox">
                                        <input type="checkbox" id="syphilis" @if ($donor->syphilis == 1) checked @endif >
                                        <label for="syphilis"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection