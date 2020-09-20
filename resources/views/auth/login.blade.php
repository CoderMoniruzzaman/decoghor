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
                        <form method="POST" action="{{ route('login') }}" class="forms">
                            @csrf
                            <div class="form-text">
                                <div class="logo">
                                    <img src="{{asset('images/logo/logo.png')}}" alt="public/images/logo/logo.png"><span>DecoGhor</span>
                                </div>
                                <h4>Login</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Enter Your Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 flex check-box">
                                    <div class="flex items-center mr-auto">
                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="cursor-pointer select-none" for="remember"> {{ __('Remember Me') }}</label>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot Password?</a>
                                    @endif
                                </div>
                            </div> 


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <button type="submit" class="form-btn mr-2">
                                        {{ __('Login') }}
                                    </button>

                                    <a href="{{ route('register') }}" class="form-btn-two">
                                        {{ __('SignUp') }}
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
