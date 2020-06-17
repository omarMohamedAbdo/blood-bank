@extends('layouts.hospital')

    @section('content')
    <section class="contact_area p_120">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3 class="mb-30 title_color">Personal Information</h3>
                <form action="#">
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
                    
                    

                </form>
            </div>
        </div>
    </div>
    </section>
    @endsection