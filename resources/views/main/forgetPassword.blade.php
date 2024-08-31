@extends('main.includes.web_page')
@section('keywords')
    <title>Forget Password</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="">
@endsection
@section('content')
    <!-- login -->
    <style>
        body {
            overflow-x: hidden;
        }

        .form-bg {
            max-width: 450px;
        }
    </style>
    <section class="py-5 login_bg">
        <div class="form-bg mx-auto">
            <div class="form-container">
                <div class="form-icon">
                    <i class="fa fa-key"></i>
                </div>
                <h3 class="title">Forget Password</h3>
                @if (session('forget_password_error'))
                    <div class="alert alert-danger">
                        {{ session('forget_password_error') }}
                    </div>
                @endif

                <form action="{{ url('/update_password') }}" id="loginForm" method="POST" class="form-horizontal">
                    @csrf
                    @method('put')
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group row" style=" margin-bottom: 0px !important;">
                        <div class="col-md-12">
                            <span class="input-icon"><i class="fa fa-envelope"></i></span>
                            <input type="text" id="email_address" class="form-control" name="email" required=""
                                readonly="" value="{{ $email }}" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row" style=" margin-bottom: 0px !important;">
                        <div class="col-md-12">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password" class="form-control" name="password" required autofocus
                                placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row" style=" margin-bottom: 15px !important;">
                        <div class="col-md-12">
                            <span class="input-icon"><i class="fa fa-lock"></i></span>
                            <input type="password" id="password-confirm" class="form-control" name="password_confirmation"
                                required autofocus placeholder="Confirm password">
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12 offset-md-12">
                        <button type="submit" class="btn signin">
                            Reset Password
                        </button>
                    </div>
                </form>
                <span class="user-signup">Don't Have an Account? <a href="{{ url('/register') }}">Create Now!</a>
                </span>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
