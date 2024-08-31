@extends('main.includes.web_page')
@section('keywords')
    <title>Forgot Password</title>
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
                    <i class="fa fa-user-edit"></i>
                </div>
                <h3 class="title">User Login</h3>
                <form action="{{ route('forget.password.post') }}" id="loginForm" method="POST" class="form-horizontal"
                    accept-charset="utf-8">
                    @csrf
                    @if (session('forget_success'))
                        <div class="alert alert-success">
                            {{ session('forget_success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input type="text" id="email_address" class="form-control" name="email" required autofocus
                            placeholder="email">
                            <br>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <button type="submit" class="btn signin">Reset Password</button>
                </form>
                <span class="user-signup">Don't Have an Account? <a href="register.php">Create Now !</a>
                </span>
            </div>
        </div>
    </section>
    <!-- end login -->
@endsection
