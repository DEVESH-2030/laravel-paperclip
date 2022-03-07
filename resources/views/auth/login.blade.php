@extends('main_layouts.app')

@section('content')
    <div class="container">
        <div id="card-layout"  class="row">
            <!-- image section -->
            <div class="col" style="background-color: #065fe6">
                <div id="image-section"> 
                    <img class="login_image" src="{{ asset('html-css/images/login_2/login_2.jpg') }}" alt="login image">
                </div>
            </div>

            <!-- login form section -->
            <div class="col body-area">
                @include('main_layouts.animation')
                <div class="login-section">
                    <div id="card-header" class="card-header">{{ __('Sign In') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="email" class=" col-form-label text-md-left">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter email address" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="password" class=" col-form-label text-md-left">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="current-password" data-toggle="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-0">
                                    <button type="submit" class="btn btn-primary"> {{ __('Login') }} </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" id="forgot" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="">
                                <p class="small mt-2 pt-1 mb-0"><b>Don't have an account? </b><a href="{{ route('register') }}" class="link-danger" id="register">Sign Up</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>



        
        {{-- <div id="card-layout" class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img class="login_image" src="{{ asset('html-css/images/login_3/login_1.jpg') }}" alt="login image">
            </div>
            <div class=" col-xl-6 offset-xl-0">
                <div class="card" style="border-color:rgb(173, 164, 164)">
                    <div id="card-header" class="card-header">{{ __('Sign In') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="email" class=" col-form-label text-md-left">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  placeholder="Enter email address" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-10">
                                    <label for="password" class=" col-form-label text-md-left">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password" required autocomplete="current-password" data-toggle="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-0">
                                    <button type="submit" class="btn btn-primary"> {{ __('Login') }} </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" id="forgot" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="">
                                <p class="small mt-2 pt-1 mb-0"><b>Don't have an account? </b><a href="{{ route('register') }}" class="link-danger" id="register">Sign Up</a> </p>
                            </div>
                        </form>
                    </div>
                </div>
                    <p align="center"> OR </p>
                    <p> Sign in with: </p>
                    <i class="fa-brands fa-facebook"></i>
                    <i class="fa-brands fa-google"></i>
                    <i class="fa-brands fa-linkedin"></i>
            </div>
        </div> --}}
    </div>
@endsection

@section('after-js')
    <script type="text/javascript">
        $("#password").password('toggle');
    </script>
@endsection
