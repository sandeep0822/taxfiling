<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('keywords')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/mystyle.css') }}" />
</head>

<body>
    <!--  top nav -->
    <section class="top_header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-4 pt-2 py-md-2">
                    <div class="text-center contact_info">
                        <a href="mailto:hr@enigmataxfiling.com"
                            class="text-light mr-1 mr-md-2 mr-xl-3 text-decoration-none">
                            <i class="fa fa-envelope"></i> support@enigmataxfiling.com </a>
                        <span class="text-light ms-2 me-2">|</span>
                        <a href="tel:+14158514219" class="text-light  text-decoration-none">
                            <i class="fa fa-phone"></i> +1-4158514219 </a>
                    </div>
                    <!--<p class="mb-0 text-light text-center text-lg-left d-none d-md-block ">
                        <i class="fa-sharp fa-solid fa-location-dot"></i> 1001 S Main st, Milpitas CA ZIP 95035
                    </p>-->
                </div>
                <div class="col-lg-7 col-xl-5 mt-2 mt-md-0 pb-2 py-md-2">
                    <!--<div class="text-center contact_info">
                        <a href="mailto:hr@enigmataxfiling.com"
                            class="text-light mr-1 mr-md-2 mr-xl-3 text-decoration-none">
                            <i class="fa fa-envelope"></i> support@enigmataxfiling.com </a>
                        <span class="text-light ms-2 me-2">|</span>
                        <a href="tel:+14158514219" class="text-light  text-decoration-none">
                            <i class="fa fa-phone"></i> +1-4158514219 </a>
                    </div>-->
                </div>
                <div class="col-xl-3 pb-3 py-xl-3 login_sec">
                    <div>
                        <p class="mb-0 text-center text-xl-right">
                            <a href="{{ url('/login') }}" class="text-light text-decoration-none me-2">
                                <i class="fa fa-user"></i> Login </a>
                            <span class="text-light">|</span>
                            <a href="{{ url('/register') }}" class="ms-2 text-light text-decoration-none">
                                <i class="fa-solid fa-address-card"></i> Register </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end top nav -->
    <!-- main header -->
    <!-- header -->
    <nav class="navbar navbar-dark bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="images/logo.png" width="180px" alt="">
            </a>
            <button class="navbar-toggler d-xl-none" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-warning"></span>
            </button>
            <div class="d-none d-xl-block">
                <ul class="d-flex m-0 list-unstyled text-uppercase fw-bold">
                    <li>
                        <a href="{{ url('/') }}"
                            class="px-4 text-decoration-none font-weight-bold {{ Request::is('/') ? 'active' : '' }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ url('/about_us') }}"
                            class="px-4 text-decoration-none font-weight-bold {{ Request::is('about_us') ? 'active' : '' }}">About
                            us</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-4{{ Request::is('/services') ? 'active' : '' }}"
                            href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false"> Services </a>
                        <ul class="dropdown-menu dropdown-menu-info mt-3 text-capitalize"
                            aria-labelledby="navbarDarkDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="{{ url('/individualTaxes') }}">Individual Taxes</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Business Incorporation</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/businessTax')}}">Business Tax Filing</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/auditSupport') }}">Audit Support for IRS</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ url('/stateAudit')}}">State Audit</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/refundStatus') }}"
                            class="px-4  text-decoration-none font-weight-bold {{ Request::is('refundStatus') ? 'active' : '' }}">Refund
                            Status</a>
                    </li>
                    <li>
                        <a href="{{ url('/data_security') }}"
                            class="px-4  text-decoration-none font-weight-bold {{ Request::is('data_security') ? 'active' : '' }}">Data
                            Security</a>
                    </li>
                    <li>
                        <a href="{{ url('/contact_us') }}"
                            class="px-4 text-decoration-none font-weight-bold {{ Request::is('contact_us') ? 'active' : '' }}">Contact
                            us</a>
                    </li>
                </ul>
            </div>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
                aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
                        <img src="images/logo-footer.png" width="150px" alt="">
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3  text-uppercase">
                        <li class="nav-item pb-3">
                            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page"
                                href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item pb-3">
                            <a class="nav-link {{ Request::is('/about_us') ? 'active' : 'text-light' }}"
                                href="{{ url('/about_us') }}">About us</a>
                        </li>
                        <li class="nav-item dropdown pb-3">
                            <a class="nav-link dropdown-toggle {{ Request::is('/services') ? 'active' : 'text-light' }}"
                                href="#" id="navbarDarkDropdownMenuLink" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"> Services </a>
                            <ul class="dropdown-menu dropdown-menu-info mt-3 text-capitalize"
                                aria-labelledby="navbarDarkDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ url('/individualTaxes') }}">Individual Taxes</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">Business Incorporation</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/businessTax')}}">Business Tax Filing</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/auditSupport') }}">Audit Support for IRS</a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ url('/stateAudit')}}">State Audit</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item pb-3">
                            <a class="nav-link {{ Request::is('/refundStatus') ? 'active' : 'text-light' }}"
                                href="{{ url('/refundStatus') }}">Refund Status</a>
                        </li>
                        <li class="nav-item pb-3">
                            <a class="nav-link {{ Request::is('/data_security') ? 'active' : 'text-light' }}"
                                href="{{ url('/data_security') }}">Data Security</a>
                        </li>
                        <li class="nav-item pb-3">
                            <a class="nav-link {{ Request::is('/contact_us') ? 'active' : 'text-light' }}"
                                href="{{ url('/contact_us') }}">Contact us</a>
                        </li>
                    </ul>
                    <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
    <!-- end header-->
    <div class="clearfix"></div>
    <!--//header-->
    @yield('content')
    <!-- footer -->
    <section class="py-5 footer_sec">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <img src="images/logo-footer.png" width="150px" height="70px" alt="">
                    <p class="mt-3 text-justify pe-4"> When it comes to tax filing, finding a reliable and efficient
                        solution is crucial. In the United States, many individuals and businesses are seeking free tax
                        filing options that not only save them money but also ensure accuracy and convenience. </p>
                </div>
                <div class="col-md-6 col-lg-2 mt-4 mt-md-0">
                    <h4 class="fw-bold">Useful links</h4>
                    <ul class="mt-4 list-unstyled">
                        <li>
                            <a href="{{ url('/') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Home </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/about_us') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> About us </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/data_security') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Data Security </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/contact_us') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Contact us </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/terms_conditions') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Terms & Conditins </a>
                        </li>
                        <!-- <li><a href="">Home</a></li> -->
                    </ul>
                </div>
                <div class="col-md-6 col-lg-3 mt-4 mt-lg-0">
                    <h4 class="fw-bold">Services</h4>
                    <ul class="mt-4 list-unstyled">
                        <li>
                            <a href="{{ url('/individualTaxes') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Individual Taxes </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/businessTax')}}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Business Taxes </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/auditSupport') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Audit Support </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/indianTaxFiling') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Indian Tax Filing </a>
                        </li>
                        <li class="mt-3">
                            <a href="{{ url('/refundStatus') }}" class="text-light">
                                <i class="fa-solid fa-angles-right"></i> Refund Status </a>
                        </li>
                        <!-- <li><a href="">Home</a></li> -->
                </div>
                <div class="col-md-6 col-lg-3 mt-4 mt-lg-0">
                    <h4 class="fw-bold">Contact Now</h4>
                    <ul class="mt-4 list-unstyled">
                        <li>
                            <a href="" class="text-light">
                                <i class="fa-sharp fa-solid fa-location-dot"></i> 1001 S Main st, Milpitas CA ZIP 95035
                            </a>
                        </li>
                        <li class="mt-3">
                            <a href="tel:+14158514219" class="text-light">
                                <i class="fa fa-phone"></i> +1-4158514219 </a>
                        </li>
                        <li class="mt-3">
                            <a href="mailto:hr@enigmataxfiling.com " class="text-light">
                                <i class="fa fa-envelope"></i> support@enigmataxfiling.com </a>
                        </li>
                    </ul>
                    <div class="social_icons mt-4">
                        <ul class="list-unstyled d-flex">
                            <li class="me-2">
                                <a href="" class="py-2 px-3 bg-danger text-light rounded">
                                    <i class="fa-brands fa-facebook-f"></i>
                                </a>
                            </li>
                            <li class="me-2">
                                <a href="" class="py-2 px-3 bg-danger text-light rounded">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                            </li>
                            <li class="me-2">
                                <a href="" class="py-2 px-3 bg-danger text-light rounded">
                                    <i class="fa-brands fa-linkedin-in"></i>
                                </a>
                            </li>
                            <li class="me-2">
                                <a href="" class="py-2 px-3 bg-danger text-light rounded">
                                    <i class="fa-brands fa-twitter"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copy_right py-3">
        <div class="container">
            <p class="text-center m-0 text-white text-capitalize">&copy; All the copyrights reserved by enigma Tax
                Filing</p>
        </div>
    </section>
    <!-- end footer -->
    <!-- chat -->
    <div class="floating_btn">
        <a target="_blank" href="https://api.whatsapp.com/send?phone=14158514219&amp;text=Hi..."
            class="text-decoration-none">
            <div class="contact_icon">
                <i class="fab fa-whatsapp"></i>
            </div>
        </a>
    </div>
    <!-- end chat -->
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/65a674830ff6374032c0dc92/1hk93e960';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- script code -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- script code end -->
</body>

</html>
