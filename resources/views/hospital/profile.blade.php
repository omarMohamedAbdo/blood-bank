@extends('layouts.hospital')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>{{ Auth::guard('hospital')->user()->name }}</h2>
					<div class="page_link">
						<a href="{{ route('hospitalHome') }}">Home</a>
						<a href="#">Profile</a>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!--================End Banner Area =================-->
    <section class="contact_area p_120">
        <div class="container">
            <div class="section-top-border" style=" border: solid #ff8080; border-radius: 80px;padding :30px">
                                        <!-- Default form register -->
                <form class="text-center border border-light p-5" action="{{route('updateHospitalProfile')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <hr>
                <p class="h4 mb-4">Profile</p>
                <hr>
                <br>
                @if (Session::has('succes'))
                                 <div class="alert alert-success">{{ Session::get('succes') }}</div>
                @endif
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Name</label>
                    <div class="col-sm-11">
                        <input type="name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" value="{{ old('name')  ?  old('name') : Auth::user()->name }}" required autocomplete="name" >
                        @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-11">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email')  ?  old('email') : Auth::user()->email }}" placeholder="Email" required autocomplete="email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                    Must be valid unique email
                </small>
                <!-- <div class="form-group row">
                            <label for="password" class="col-sm-1 col-form-label">{{ __('Password') }}</label>

                            <div class="col-sm-11">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                               
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                    At least 8 characters and 1 digit
                                </small>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-1 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-sm-11">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->
                      

                    <div class="form-group row">
                        <label for="city" class="col-sm-1 col-form-label">{{ __('City') }}</label>
                        <div class="col-sm-11">
                            <div style=" margin-top: -2px;" class="input-group-icon mt-10">
                                <div class="icon">
                                    <i class="fa fa-plane" aria-hidden="true"></i>
                                </div>
                                <div class="form-select" id="default-select">
                                    <select class="@error('city') is-invalid @enderror" id="city" name="city" required focus>
                                        <option value="" disabled selected>Please select City</option> 
                                        @if (old('city') == 'Cairo')
                                            <option value="Cairo" selected>Cairo</option>
                                        @elseif(Auth::user()->city == 'Cairo')
                                            <option value="Cairo" selected>Cairo</option>
                                        @else 
                                            <option value="Cairo" selected>Cairo</option>   
                                        @endif  
                                        @if (old('city') == 'Alexandria')
                                            <option value="Alexandria" selected>Alexandria</option>
                                        @elseif(Auth::user()->city == 'Alexandria')
                                            <option value="Alexandria" selected>Alexandria</option>
                                        @else
                                            <option value="Alexandria">Alexandria</option>
                                        @endif 
                                        @if (old('city') == 'Suez')
                                            <option value="Suez" selected>Suez</option>
                                        @elseif(Auth::user()->city == 'Suez')
                                            <option value="Suez" selected>Suez</option>
                                        @else
                                            <option value="Suez">Suez</option>
                                        @endif 

                                        @if (old('city') == '6th of October City')
                                            <option value="6th of October City" selected>6th of October City</option>
                                        @elseif(Auth::user()->city == '6th of October City')
                                            <option value="6th of October City" selected>6th of October City</option>
                                        @else
                                            <option value="6th of October City">6th of October City</option>
                                        @endif

                                        @if (old('city') == 'Gizeh')
                                            <option value="Gizeh" selected>Gizeh</option>
                                        @elseif(Auth::user()->city == 'Gizeh')
                                            <option value="Gizeh" selected>Gizeh</option>
                                        @else
                                            <option value="Gizeh">Gizeh</option>
                                        @endif

                                        @if (old('city') == 'Port Said')
                                            <option value="Port Said" selected>Port Said</option>
                                        @elseif(Auth::user()->city == 'Port Said')
                                            <option value="Port Said" selected>Port Said</option>
                                        @else
                                            <option value="Port Said">Port Said</option>
                                        @endif

                                        @if (old('city') == 'al-Mansura')
                                            <option value="al-Mansura" selected>al-Mansura</option>
                                        @elseif(Auth::user()->city == 'al-Mansura')
                                            <option value="al-Mansura" selected>al-Mansura</option>
                                        @else
                                            <option value="al-Mansura">al-Mansura</option>
                                        @endif

                                        @if (old('city') == 'Damietta')
                                            <option value="Damietta" selected>Damietta</option>
                                        @elseif(Auth::user()->city == 'Damietta')
                                            <option value="Damietta" selected>Damietta</option>
                                        @else
                                            <option value="Damietta">Damietta</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                       
                        <!-- </div> -->
                    </div>
                        

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Update Profile</button>

                    <p>By clicking
                        <!-- <em>Sign up</em>  -->
                        you agree to our
                        <a href="" target="_blank">terms of service</a>
                        
                
                    <hr>
                    <p class="h4 mb-4">Inventory</p>
                    <hr>
                    </br>
                    <div class="form-group row">
                   
                        <label  class="col-sm-2 col-form-label">Blood A Stock :</label>
                        <div style=" margin-top: 9px;" >
                        <label  >{{ Auth::guard('hospital')->user()->type_A_inventory }}</label>
                        </div>

                        <div class="col-sm-1">
                        </div>

                        <label  class="col-sm-2 col-form-label">Blood B Stock :</label>
                        <div style=" margin-top: 9px;" >
                        <label  >{{ Auth::guard('hospital')->user()->type_B_inventory }}</label>
                        </div>

                        <div class="col-sm-1">
                        </div>

                        <label  class="col-sm-2 col-form-label">Blood AB Stock :</label>
                        <div style=" margin-top: 9px;" >
                        <label  >{{ Auth::guard('hospital')->user()->type_AB_inventory }}</label>
                        </div>

                        <div class="col-sm-1">
                        </div>

                        <label  class="col-sm-2 col-form-label">Blood O Stock :</label>
                        <div style=" margin-top: 9px;" >
                            <label   >{{ Auth::guard('hospital')->user()->type_O_inventory }}</label>
                        </div>

                </div>
               
                </form>
                <!-- Default form update -->
            </div>
        </div>
</section>

  
@endsection
