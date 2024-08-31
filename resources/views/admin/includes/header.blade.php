<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Management | ENIGMA TAX FILING</title>

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
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>

<body class="hold-transition sidebar-mini">

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="{{ asset('images/favicon.png') }}" alt="GrandTaxFilerLogo"
                    height="60" width="60">
            </div>

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i style="color:black"
                                class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{ url('/admin/dashboard') }}" class="nav-link">Home</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" style="padding-top: 0.3rem;">
                            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                                width="30px">
                        </a>
                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                            <a href="#" class="dropdown-item">
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
                <!-- Brand Logo -->
                <a href="{{ url('/admin/dashboard') }}" class="brand-link text-center">
                    <span class="brand-text text-center font-weight-light">ENIGMA TAX FILING</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}"
                                class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                        </div>
                    </div>+

                    <!-- Sidebar Menu -->
                    <nav>
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-item">
                                <a href="{{ url('/admin/dashboard') }}"
                                    class="nav-link @if (Request::is('admin/dashboard')) active @else @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dashboard
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/TotalRegistrations') }}"
                                    class="nav-link @if (Request::is('admin/TotalRegistrations')) active @else @endif">
                                    <i class="nav-icon fas fa-registered"></i>
                                    <p>
                                        Total Registrations
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/ActiveClients') }}"
                                    class="nav-link @if (Request::is('admin/ActiveClients')) active @else @endif">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Active Clients
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/InactiveClients') }}"
                                    class="nav-link @if (Request::is('admin/InactiveClients')) active @else @endif">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Inactive Clients
                                    </p>
                                </a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/Referrals') }}"
                                    class="nav-link @if (Request::is('admin/Referrals')) active @else @endif">
                                    <i class="nav-icon fas fa-registered"></i>
                                    <p>
                                        Referrals
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/admin/messages') }}"
                                    class="nav-link @if (Request::is('admin/messages')) active @else @endif">
                                    <i class="nav-icon fas fa-comment"></i>
                                    <p>
                                        Messages
                                    </p>
                                </a>
                            </li>
                            @if (Auth::user()->role == 1)
                                <li class="nav-item">
                                    <a href="{{ url('/admin/ActivityLog') }}"
                                        class="nav-link @if (Request::is('admin/ActivityLog')) active @else @endif">
                                        <i class="nav-icon fab fa-adn"></i>
                                        <p>
                                            Activity Log
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/users') }}"
                                        class="nav-link @if (Request::is('admin/users')) active @else @endif">
                                        <i class="nav-icon fa fa-house-user"></i>
                                        <p>
                                            Users
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/admin/documents') }}"
                                        class="nav-link @if (Request::is('admin/documents')) active @else @endif">
                                        <i class="nav-icon fas fa-file"></i>
                                        <p>
                                            Documents
                                        </p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            @yield('content')
            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/admin/dashboard') }}">Enigma Tax Filing</a>.</strong>
                All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
        <!-- Ion Slider -->
        <script src="{{ asset('adminlte/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <!-- Bootstrap slider -->
        <script src="{{ asset('adminlte/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>

        <!-- Toastr -->
        <script src="{{ asset('adminlte/plugins/toastr/toastr.min.js') }}"></script>
        <!-- SweetAlert2 -->
        <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Ion Slider -->
        <script src="{{ asset('adminlte/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
        <!-- Bootstrap slider -->
        <script src="{{ asset('adminlte/plugins/bootstrap-slider/bootstrap-slider.min.js') }}"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

        <!-- (Optional) Latest compiled and minified JavaScript translation files -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>
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
