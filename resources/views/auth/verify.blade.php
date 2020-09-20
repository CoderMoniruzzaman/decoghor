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
                        <div class="card">
                            <div class="card-header">
                                <div class="form-text">
                                    <div class="logo">
                                        <img src="{{asset('images/logo/logo.png')}}" alt="public/images/logo/logo.png"><span>DecoGhor</span>
                                    </div>
                                    <h4> {{ __('Verify Your Email Address') }}</h4>
                                </div>
                               
                            
                            </div>

                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        {{ __('A fresh verification link has been sent to your email address.') }}
                                    </div>
                                @endif

                                {{ __('Before proceeding, please check your email for a verification link.') }}
                                {{ __('If you did not receive the email') }},
                                <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                                </form>
                            </div>
            
                        </div>
                        
                    </div>
                </div>
                <!-- Right content  end-->
            </div>
        </div>
    </div>
</div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
