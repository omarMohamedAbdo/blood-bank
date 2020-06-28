@extends('layouts.donor')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<style>
	body {
		color: #999;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
	}
    .form-control{
		height: 40px;
		box-shadow: none;
		color: #969fa4;
        border-color: #ddd;
	}
	.form-control:focus{
		border-color: #5cb85c;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 400px;
		margin: 0 auto;
		padding: 30px 0;
	}
	.signup-form h2{
		color: #636363;
        margin: 0 0 15px;
		position: relative;
		text-align: center;
    }
	.signup-form h2:before, .signup-form h2:after{
		content: "";
		height: 2px;
		width: 30%;
		background: #d4d4d4;
		position: absolute;
		top: 50%;
		z-index: 2;
	}	
	.signup-form h2:before{
		left: 0;
	}
	.signup-form h2:after{
		right: 0;
	}
    .signup-form .hint-text{
		color: #999;
		margin-bottom: 30px;
		text-align: center;
	}
    .signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #f2f3f7;
        /* background: #fff; */
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .btn{        
        font-size: 16px;
        font-weight: bold;		
		min-width: 140px;
        border: none;
        background: #ea2c58;
        outline: none !important;
    }
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}    	
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
    .signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #5cb85c;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}  
</style>

@endsection

@section('content')
<section class="contact_area p_120">
<div class="container">

<div class="signup-form">
        <form method="POST" action="{{ route('register') }}">
        @csrf
		<h2>Register</h2>
		<p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
				<!-- <div class="col-xs-6"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div> -->
				<!-- <div class="col-xs-6"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div> -->
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" required autocomplete="name" >

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
		<div class="form-group">
            <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
		<div class="form-group">
            <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
        </div> 
        <div class="form-group">
            <select class="form-control @error('city') is-invalid @enderror" id="city" name="city" required focus>
                        <option value="" disabled selected>Please select your City</option> 
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
                        @if (old('city') == '6th of October City')
                            <option value="6th of October City" selected>6th of October City</option>
                        @else
                            <option value="6th of October City">6th of October City</option>
                        @endif 
                        @if (old('city') == 'Gizeh')
                            <option value="Gizeh" selected>Gizeh</option>
                        @else
                            <option value="Gizeh">Gizeh</option>
                        @endif 
                        @if (old('city') == 'Port Said')
                            <option value="Port Said" selected>SPort Saiduez</option>
                        @else
                            <option value="Port Said">Port Said</option>
                        @endif 

                         @if (old('city') == 'al-Mansura')
                            <option value="al-Mansura" selected>al-Mansura</option>
                        @else
                            <option value="al-Mansura">al-Mansura</option>
                        @endif 

                         @if (old('city') == 'Damietta')
                            <option value="Damietta" selected>Damietta</option>
                        @else
                            <option value="Damietta">Damietta</option>
                        @endif       
                </select>
                <br>
        </div> 
        <br>
        <div class="form-group">
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
                    @if (old('blood_type') == 'unkown')
                        <option value="unkown" selected>unkown</option>
                    @else
                        <option value="unkown">unkown</option>
                    @endif
                    
            </select>
            <br>
        </div>
        <br>        
        <div class="form-group">
			<label  class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a style="color:#ea2c58;" href="#">Terms of Use</a> &amp; <a style="color:#ea2c58;" href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button style=""  type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a style="color:#ea2c58;" href="#">Sign in</a></div>
</div>

</div>
</section>
@endsection
