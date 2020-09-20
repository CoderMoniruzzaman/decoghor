@extends('layouts/masterone')

@section('content')

<div class="main_container" id="bg-color">
    <div class="container">
        <div class="row justify-content-center vh-100">
            <!-- Left content  start-->
            <div class="col-lg-6 col-md-4 display-md">
                <div class="left-content">
                    <!-- Logo -->
                    <div class="logo">
                        <img src="{{asset('images/logo/logo.png')}}" alt="public/images/logo/logo.png"><span>DecoGhor</span>
                    </div>
                    <div class="text display-mdt">
                        <h3>A few more clicks to
                            sign in to your account.
                        </h3>

                        <p>
                            Manage all your e-commerce accounts in one place
                        </p>
                    </div>
                    <!-- svg image  -->
                    <div class="image">
                        <img src="{{asset('images/svg/log.svg')}}" alt="">
                    </div>
                </div>
            </div>
            <!-- Left content  end-->

            <!-- Right content  start-->
            <div class="col-lg-6 col-md-8">
                <div class="right-content">
                    <div class="form-content">
                        
                        <!-- form  start-->
                        <form method="POST" action="{{ route('register') }}" class="forms">
                            @csrf
                            <div class="form-text">
                                <div class="logo">
                                    <img src="{{asset('images/logo/logo.png')}}" alt="public/images/logo/logo.png"><span>DecoGhor</span>
                                </div>
                                <h4>{{ __('Register') }}</h4>
                            </div>

                            <div class="form-group row">
                               
                                <div class="col-md-12">
                                    <input id="name" type="text" placeholder="Type Your Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" placeholder="Type E-Mail Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password"  placeholder="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password-confirm" placeholder="confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-md-12 check-box">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <a class="term" href="#">Terms and Conditions</a> & <a class="term" href="#">Privacy Policy</a> <br>
                                    By sign up, you agree to our
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="form-btn mr-2">
                                        {{ __('Register') }}
                                    </button>

                                    <a href="{{ route('login') }}" class="form-btn-two">
                                        {{ __('Login') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                        <!-- form  end-->
                    </div>
                </div>
                <!-- Right content  end-->
            </div>
        </div>
    </div>
</div>


@endsection
