@extends('layouts.donor')

@section('content')
<section class="contact_area p_120">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control " name="city"  required  autofocus>
                            </div>
                        </div> -->

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>
                            <div class="col-md-6">
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
                        
                        <!-- <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Blood type') }}</label>

                            <div class="col-md-6">
                                <input id="blood_type" type="text" class="form-control " name="blood_type"  required autofocus>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="blood_type" class="col-md-4 col-form-label text-md-right">{{ __('Blood type') }}</label>
                            <div class="col-md-6">
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
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
@endsection
