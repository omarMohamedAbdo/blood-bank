@extends('layouts.donor')
@section('css')
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #999;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
	}
	.form-control {
		box-shadow: none;
		border-color: #ddd;
	}
	.form-control:focus {
		border-color: #4aba70; 
	}
	.login-form {
        width: 350px;
		margin: 0 auto;
		padding: 30px 0;
	}
    .login-form form {
        color: #434343;
		border-radius: 1px;
    	margin-bottom: 15px;
        background: #fff;
		border: 1px solid #f3f3f3;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
	}
	.login-form h4 {
		text-align: center;
		font-size: 22px;
        margin-bottom: 20px;
	}
    .login-form .avatar {
        color: #fff;
		margin: 0 auto 30px;
        text-align: center;
		width: 100px;
		height: 100px;
		border-radius: 50%;
		z-index: 9;
		background: #ea2c58;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
    .login-form .avatar i {
        font-size: 62px;
    }
    .login-form .form-group {
        margin-bottom: 20px;
    }
	.login-form .form-control, .login-form .btn {
		min-height: 40px;
		border-radius: 2px; 
        transition: all 0.5s;
	}
	.login-form .close {
        position: absolute;
		top: 15px;
		right: 15px;
	}
	.login-form .btn {
		background: #ea2c58;
		border: none;
		line-height: normal;
	}
	.login-form .btn:hover, .login-form .btn:focus {
		background: #42ae68;
	}
    .login-form .checkbox-inline {
        float: left;
    }
    .login-form input[type="checkbox"] {
        margin-top: 2px;
    }
    .login-form .forgot-link {
        float: right;
    }
    .login-form .small {
        font-size: 13px;
    }
    .login-form a {
        color: #4aba70;
    }
</style>
@endsection

@section('content')
<!--================Contact Area =================-->
<section class="contact_area p_120">

<div class="login-form">    
        @isset($url)
        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">
        @else
        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
        @endisset
        @csrf
		<div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
    	<h4 class="modal-title">Login to {{ isset($url) ? ucwords($url) : "Your"}}  Account</h4>
        <div class="form-group">
            <!-- <input type="text" class="form-control" placeholder="Username" required="required"> -->
            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
        </div>
        <div class="form-group">
            <!-- <input type="password" class="form-control" placeholder="Password" required="required"> -->
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="forgot-link">Forgot Password?</a>
        </div>  -->
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login">  
        
        @isset($url)
        
        @else
        <br>
        <!-- <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <a href="{{ url('/auth/redirect/facebook') }}" class="btn btn-primary"><i class="fa fa-facebook"></i> Facebook</a>
            </div>
        </div> -->
        <div class="form-group row">
             <div class="col-sm-6">
               <a href="{{ url('/auth/redirect/facebook') }}" style="color:white;width:100%;"  class="btn btn-primary btn-block btn-lg" ><i class="fa fa-facebook"></i> Facebook</a>
             </div>
             <div class="col-sm-6">
                <a href="{{ url('/auth/redirect/google') }}" style="color:white;width:100%;"  class="btn btn-primary btn-block btn-lg" ><i class="fa fa-google"></i> Google</a>
             </div>
        </div>
        @endisset

        

    </form>			
    <div  class="text-center small">Don't have an account? <a style="color:#ea2c58;" href="{{ isset($url) ? route('hospitalRegister') : route('register') }}">Sign up</a></div>
</div>
  
</section>
    <!--================Contact Area =================-->

@endsection
