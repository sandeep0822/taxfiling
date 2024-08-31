@extends('main.includes.web_page')
@section('keywords')
    <title>Register</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href="">
@endsection
@section('content')
    <!-- register -->
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
                <h3 class="title">User Register</h3>
                <form method="POST" action="{{ url('/create_register') }}" class="form-horizontal">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('register_success'))
                        <div class="alert alert-success">
                            {{ session('register_success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-user"></i></span>
                        <input name="username" class="form-control" type="text" placeholder="Username" required>
                        <span id="username_error"></span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-envelope"></i></span>
                        <input name="email" class="form-control" type="email" placeholder="Email" required>
                        <span id="email_error"></span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-lock"></i></span>
                        <input name="password" class="form-control" type="password" placeholder="Password" required>
                        <span id="password_error"></span>
                    </div>
                    <div class="form-group">
                        <span class="input-icon"><i class="fa fa-phone"></i></span>
                        <input name="phone" class="form-control" type="number" placeholder="Phone Number" required>
                        <span id="phone_error"></span>
                    </div>
                    <span class="forgot-pass"><a href="#">Forgot Password ?</a></span>
                    <button type="submit" class="btn signin">Register</button>
                </form>
                <span class="user-signup">Already Registerd? <a href="login.html">Login</a>
                </span>
            </div>
        </div>
    </section>
    <!-- end register -->
@endsection
