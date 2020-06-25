@extends('layouts.donor')

@section('content')

<!--================ Banner Area =================-->
<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="overlay"></div>
			<div class="container">
				<div class="banner_content text-center">
					<h2>{{ Auth::user()->name }}</h2>
					<div class="page_link">
						<a href="{{ route('home') }}">Home</a>
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
                <form class="text-center border border-light p-5" action="{{route('updateProfile')}}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-sm-4">
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
                                            <option value="Cairo" >Cairo</option>   
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
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="blood_type" class="col-sm-2 col-form-label">{{ __('Blood type') }}</label>
                        <div class="col-sm-4">
                        <div style=" margin-top: -2px;" class="input-group-icon mt-10">
                                <div class="icon">
                                    <i class="fa fa-tint" aria-hidden="true"></i>
                                </div>
                                <div class="form-select" id="default-select">
                                    <select class="@error('blood_type') is-invalid @enderror" id="blood_type" name="blood_type" required focus>
                                    <option value="" disabled selected>Please select Your blood type</option>        
                                    @if (old('blood_type') == 'A')
                                        <option value="A" selected>A</option>
                                    @elseif(Auth::user()->blood_type == 'A')
                                        <option value="A" selected>A</option>
                                    @else
                                        <option value="A">A</option>
                                    @endif 
                                    @if (old('blood_type') == 'B')
                                        <option value="B" selected>B</option>
                                    @elseif(Auth::user()->blood_type == 'B')
                                        <option value="B" selected>B</option>
                                    @else
                                        <option value="B">B</option>
                                    @endif
                                    @if (old('blood_type') == 'AB')
                                        <option value="AB" selected>AB</option>
                                    @elseif(Auth::user()->blood_type == 'AB')
                                        <option value="AB" selected>AB</option>
                                    @else
                                        <option value="AB">AB</option>
                                    @endif
                                    @if (old('blood_type') == 'O')
                                        <option value="O" selected>O</option>
                                    @elseif(Auth::user()->blood_type == 'O')
                                        <option value="O" selected>O</option>
                                    @else
                                        <option value="O">O</option>
                                    @endif
                                    @if (old('blood_type') == 'unkown')
                                        <option value="unkown" selected>unkown</option>
                                    @elseif(Auth::user()->blood_type == 'unkown')
                                        <option value="unkown" selected>unkown</option>
                                    @else
                                        <option value="unkown">unkown</option>
                                    @endif
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                        

                    <!-- Sign up button -->
                    <button class="btn btn-info my-4 btn-block" type="submit">Update Profile</button>

                    <p>By clicking
                        <!-- <em>Sign up</em>  -->
                        you agree to our
                        <a href="" target="_blank">terms of service</a>
                        
                
                    <hr>
                    <p class="h4 mb-4">Medical Info</p>
                    <hr>

                    <div class="form-group row">
                   
                        <label  class="col-sm-2 col-form-label">Hepatitis B virus (HBV)</label>
                        <div style=" margin-top: 6px;" class="icon">
                        @if(Auth::user()->HBV == 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                        </div>

                        <div class="col-sm-2">
                        </div>

                        <label  class="col-sm-2 col-form-label">Hepatitis C virus (HCV)</label>
                        <div style=" margin-top: 6px;" class="icon">
                        @if(Auth::user()->HCV == 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                        </div>

                        <div class="col-sm-2">
                        </div>

                        <label  class="col-sm-3 col-form-label">Human Immunodeficiency virus (HIV)</label>
                        <div style=" margin-top: 6px;" class="icon">
                        @if(Auth::user()->HIV == 1)
                                    <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                                    <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                        </div>

                </div>

                <div class="form-group row">

                    <div class="col-sm-2">
                    </div>
                    
                    <label  class="col-sm-3 col-form-label">Human T-Lymphotropic Virus (HTLV)</label>
                    <div style=" margin-top: 6px;" class="icon">
                    @if(Auth::user()->HTLV == 1)
                                <i class="fa fa-check" aria-hidden="true"></i>
                    @else
                                <i class="fa fa-times" aria-hidden="true"></i>
                    @endif
                    </div>
                    
                    <div class="col-sm-1">
                    </div>

                    <label  class="col-sm-2 col-form-label">Treponema pallidum (syphilis)</label>
                    <div style=" margin-top: 6px;" class="icon">
                    @if(Auth::user()->syphilis == 1)
                                <i class="fa fa-check" aria-hidden="true"></i>
                    @else
                                <i class="fa fa-times" aria-hidden="true"></i>
                    @endif
                    </div>
                </div>
               
                </form>
                <!-- Default form update -->
            </div>
        </div>
</section>

  
@endsection
