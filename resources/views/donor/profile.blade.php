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
                <form class="text-center border border-light p-5" action="#!">
              
                <hr>
                <p class="h4 mb-4">Profile</p>
                <hr>
                <br>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Name : </label>
                    <div class="col-sm-11">
                    <input type="name" class="form-control" id="name" placeholder="name">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-11">
                    <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
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
                        </div>
                      

                        <div class="form-group row">
                            <label for="city" class="col-sm-1 col-form-label">{{ __('City') }}</label>
                            <div class="col-sm-11">
                                <select class="form-control @error('city') is-invalid @enderror" id="city" name="city" required focus>
                                    <option value="" disabled selected>Please select City</option> 
                                    @if (old('city') == 'Cairo')
                                        <option value="Cairo" selected>Cairo</option>
                                    @else
                                        <option value="Cairo">Cairo</option>
                                    @endif  
                                    @if (old('city') == 'Alexandria')
                                        <option value="Alexandria" selected>Alexandria</option>
                                    @else
                                        <option value="Alexandria">Alexandria</option>
                                    @endif 
                                    @if (old('city') == 'Suez')
                                        <option value="Suez" selected>Suez</option>
                                    @else
                                        <option value="Suez">Suez</option>
                                    @endif      
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="blood_type" class="col-sm-1 col-form-label">{{ __('Blood type') }}</label>
                            <div class="col-sm-11">
                                <select class="form-control" id="blood_type" name="blood_type" required focus>
                                    <option value="" disabled selected>Please select Your blood type</option>        
                                    @if (old('blood_type') == 'A')
                                        <option value="A" selected>A</option>
                                    @else
                                        <option value="A">A</option>
                                    @endif 
                                    @if (old('blood_type') == 'B')
                                        <option value="B" selected>B</option>
                                    @else
                                        <option value="B">B</option>
                                    @endif
                                    @if (old('blood_type') == 'AB')
                                        <option value="AB" selected>AB</option>
                                    @else
                                        <option value="AB">AB</option>
                                    @endif
                                    @if (old('blood_type') == 'O')
                                        <option value="O" selected>O</option>
                                    @else
                                        <option value="O">O</option>
                                    @endif
                                    
                                </select>
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
               
                </form>
                <!-- Default form register -->
            </div>
        </div>
</section>

  
@endsection
