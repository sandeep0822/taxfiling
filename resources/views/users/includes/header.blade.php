<?php $i = 0; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Management | ENIGMA TAX FILING</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('users/main.css') }}">
    <!-- Ion Slider -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/ion-rangeslider/css/ion.rangeSlider.min.css') }}">
    <!-- bootstrap slider -->
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/bootstrap-slider/css/bootstrap-slider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/toastr/toastr.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="{{ asset('adminlte/plplugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper header_part">
        <div class="row align-items-center">
            <div class="col col-3">
                <img src="{{ asset('images/logo.png') }}" height="62px">
            </div>
            <div class="col-7">
                <div>
                    Your File ( <b>GTF{{ Auth::user()->id }}</b> ) Progress is here:
                </div>
                <div>
                    @if (Auth::user()->basic_info && Auth::user()->contact_details && Auth::user()->residency_details)
                        <?php $i = 20; ?>
                    @endif
                    @if (Auth::user()->income_doc)
                        <?php $i = 40; ?>
                    @endif
                    @if (Auth::user()->bank_details)
                        <?php $i = 60; ?>
                    @endif
                    <input id="range_5" type="text" name="range_5" value="{{ $i }}">
                </div>
                <div style="display: flex; justify-content: space-between">
                    <div>Personal Info Pending</div>
                    <div>Upload Docs</div>
                    <div>Bank Details</div>
                    <div>Payment Details</div>
                    <div>Your Review</div>
                </div>
            </div>
            <div class="col col-2">
                <div class="card adviser">
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('images/icons/callcenter.jpg') }}" class="callcenter">
                        </div>
                        <div class="col">
                            <h5>Call Your Tax Adviser</h5>
                            <h3>Contact</h3>
                            <h5>+1 415-851-4219</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand  navbar-light" style="background: rgba(0, 0, 255, 0.7);">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item navbar_header">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    {{-- {{ Request::is('users_dashboard') }} --}}
                    <a href="{{ url('/users_dashboard') }}"
                        class="nav-link @if (Request::is('users_dashboard')) active @endif">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/tax_filing"
                        class="nav-link @if (Request::is('tax_filing/*')) active @elseif (Request::is('tax_filing')) active @endif">Tax
                        Filing</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/Referrals"
                        class="nav-link @if (Request::is('Referrals/*')) active @elseif (Request::is('Referrals')) active @endif">Referrals</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/Messages/compose"
                        class="nav-link @if (Request::is('Messages/*')) active @elseif (Request::is('Messages')) active @endif">Messages</a>
                </li>

            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-sm-inline-block">
                    <div style="font-size: 26px;" class="mt-2 d-flex badge badge-light">
                        <label class="refer-earn-header"> Get 100$ for 10 Refferals.</label><br>
                        <label class="refer-earn-header"> Get 50$ for 5 Refferals.</label>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" style="padding-top: 0.3rem;">
                        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            width="30px">
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <a href="{{ url('/edit_profile') }}" class="dropdown-item">
                            Edit Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ url('/logout') }}" class="dropdown-item">
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ url('/edit_profile') }}" class="nav-link  @if (Request::is('edit_profile')) active @endif">
                                <i class="fa fa-house-user nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        @if (Request::is('tax_filing/*'))
                            @include('users.includes.side_menu.taxfiling')
                        @elseif (Request::is('tax_filing'))
                            @include('users.includes.side_menu.taxfiling')
                        @endif
                        @if (Request::is('Referrals/*'))
                            @include('users.includes.side_menu.referrals')
                        @endif
                        @if (Request::is('myrefferals'))
                            @include('users.includes.side_menu.referrals')
                        @elseif (Request::is('Referrals'))
                            @include('users.includes.side_menu.referrals')
                        @endif
                        @if (Request::is('Messages/*'))
                        @include('users.includes.Messages_menu')
                        @endif
                        <li class="nav-item">
                            <a href="{{ url('/logout') }}" class="nav-link  @if (Request::is('logout')) active @endif">
                                <i class="fa fa-sign-out-alt nav-icon"></i>
                                <p>Sign Out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>


        @yield('content')

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/users_dashboard') }}">Enigma Tax Filing</a>.</strong> All rights
            reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Ion Slider -->
    <script src="{{ asset('adminlte/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Bootstrap slider -->
    <script src="{{ asset('adminlte/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
    @yield('script')
    <script>
        $(function() {
            /* BOOTSTRAP SLIDER */
            $('.slider').bootstrapSlider()
            $('#range_5').ionRangeSlider({
                min: 0,
                max: 100,
                type: 'single',
                step: 1,
                postfix: '%',
                prettify: false,
                hasGrid: true,
                to_fixed: true, //block the top
                from_fixed: true //block the from
            })
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Error',
                        body: '{{ $error }}'
                    })
                @endforeach
            @endif
            @if (session('error'))
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    body: '{{ session('error') }}'
                })
            @endif
            @if (session('success'))
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Success',
                    body: "{{ session('success') }}",
                    timer: 3000
                })
            @endif


        })
    </script>
</body>

</html>
