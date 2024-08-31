@extends('main.includes.web_page')
@section('keywords')
    <title>Login</title>
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
                @if (session('login_error'))
                    <div class="alert alert-danger">
                        {{ session('login_error') }}
                    </div>
                @endif
                @if (session('forget_password_success'))
                    <div class="alert alert-success forget_password_success">
                        {{ session('forget_password_success') }}
                    </div>
                @endif
                <form action="{{ url('/log_in') }}" id="loginForm" method="POST" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <span class="input-icon">
                            <i class="fa fa-user"></i>
                        </span>
                        <input class="form-control" type="email" placeholder="Username" name="username" required="">
                    </div>
                    <div class="form-group">
                        <span class="input-icon">
                            <i class="fa fa-lock"></i>
                        </span>
                        <input class="form-control" type="password" placeholder="Password" name="password" required="">
                    </div>
                    <span class="forgot-pass">
                        <a href="{{ url('/forget_password') }}"> Reset Password? </a>
                    </span>
                    <button type="submit" class="btn signin">Login</button>
                </form>
                <span class="user-signup">Don't Have an Account? <a href="register.php">Create Now !</a>
                </span>
            </div>
        </div>
    </section>
    <script>
        setTimeout(function() {
            $(".forget_password_success").hide()
        }, 1500);
    </script>
    <!-- end login -->
@endsection
