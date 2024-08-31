@extends('main.includes.web_page')
@section('keywords')
    <title>Home</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href=" ">
@endsection
@section('content')
    <!-- banner -->
    <section class="banner py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h2 class="fw-bold px-lg-5 mb-3">Maximize Your Tax Refunds with Enigma Tax Filing</h2>
                    <h5 class="px-lg-5 mb-3 fw-bold">Authorized By IRS E-PIN Provider</h5>
                    <p class="fw-bold px-lg-5">
                        <i class="fa-regular fa-square-check"></i> Which is free of cost, with no obligation to file with us
                    </p>
                    <p class="fw-bold px-lg-5">
                        <i class="fa-regular fa-square-check"></i> Comprehensive Tax Planning for Present and Future
                    </p>
                    <p class="fw-bold px-lg-5">
                        <i class="fa-regular fa-square-check"></i> Customer care and dedicated audit support 24/7
                    </p>
                    <p class="fw-bold px-lg-5">
                        <i class="fa-regular fa-square-check"></i> Year-Round Consultations by Experienced Tax Consultants
                    </p>
                    <p class="fw-bold px-lg-5">
                        <i class="fa-regular fa-square-check"></i> Guaranteed Accurate Tax Returns, Every Time
                    </p>
                    <p class="fw-bold px-lg-5">
                        <a href="tel:+14158514219" class="py-3 px-4 rounded d-inline-block">
                            <i class="fa-solid fa-phone-volume"></i> Speak to Experts </a>
                    </p>
                </div>
                <div class="col-md-5 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <div class="form-bg d-none d-md-block">
                        <div class="form-container">
                            <!-- <div class="form-icon"><i class="fa fa-user-edit"></i></div> -->
                            <!-- <h3 class="title">User Login</h3> -->
                            @if (session('login_error'))
                                <div class="alert alert-danger">
                                    {{ session('login_error') }}
                                </div>
                            @endif
                            <form action="{{ url('/log_in') }}" id="loginForm" method="POST" class="form-horizontal">
                                @csrf
                                <div class="form-group">
                                    <span class="input-icon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input class="form-control" type="email" placeholder="Username" name="username"
                                        required="">
                                </div>
                                <div class="form-group">
                                    <span class="input-icon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    <input class="form-control" type="password" placeholder="Password" name="password"
                                        required="">
                                </div>
                                <span class="forgot-pass">
                                    <a href="{{ url('/forget_password') }}">Forgot Password?</a>
                                </span>
                                <button type="submit" class="btn signin">Login</button>
                            </form>
                            <span class="user-signup">Don't Have an Account? <a href="{{ url('/register') }}">Create
                                    Now!</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services py-5">
        <div class="container">
            <div class="section-title mb-5">
                <h2 data-aos="zoom-in">Features which we Provide</h2>
                <p class="text-center" data-aos="fade-up">Free tax filing services have become increasingly popular as they
                    offer a cost-effective solution for individuals who want to file their taxes without incurring any fees.
                </p>
            </div>
            <div class="row gy-5">
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item">
                        <div class="img">
                            <img src="images/services/Tax-Planning-for-current-year-next-year.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-activity"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Tax Planning for current year and next year</h6>
                            </a>
                            <!-- <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Numorous tax cosultations any time  in the year.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-broadcast"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Numerous tax cosultations any time in the year</h6>
                            </a>
                            <!-- <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut nesciunt dolorem.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Evaluation-of previous-year-tax.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-easel"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Evaluation of previous year’ s tax returns</h6>
                            </a>
                            <!-- <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Guarantee-Genuine-High-Tax-Refund.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-bounding-box-circles"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Guaranteed genuine high tax refunds</h6>
                            </a>
                            <!-- <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Genuine High Refunds Tax Estimate on a Tax Return.jpg"
                                class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Genuine high refunds tax estimate on a tax return</h6>
                            </a>
                            <!-- <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Audit-support-for-New.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-chat-square-text"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Audit support for new clients on previously filed tax returns
                                </h6>
                            </a>
                            <!-- <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Confidentiality-&-Data-Security.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Confidentiality and data security</h6>
                            </a>
                            <!-- <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/ITIN  Application Guidance and Assistance.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">ITIN application guidance and assistance</h6>
                            </a>
                            <!-- <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
                <div class="col-xl-4 col-md-6" data-aos="fade-up">
                    <div class="service-item h-100">
                        <div class="img">
                            <img src="images/services/Full  support for Audits,Notices,Enquiries.jpg" class="img-fluid"
                                alt="">
                        </div>
                        <div class="details position-relative">
                            <div class="icon">
                                <i class="bi bi-calendar4-week"></i>
                            </div>
                            <a href="#" class="stretched-link">
                                <h6 class="text-dark fw-bold">Full support for audits,notices and enquiries</h6>
                            </a>
                            <!-- <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p> -->
                            <a href="#" class="stretched-link">Read More <i class="fa-solid fa-right-long"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Service Item -->
            </div>
        </div>
    </section>
    <!-- End Services Section -->
    <!-- ======= On Focus Section ======= -->
    <section id="onfocus" class="onfocus py-5" data-aos="fade-up">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-6 video-play position-relative">
                    <a href="" class="glightbox play-btn"></a>
                </div>
                <div class="col-lg-6">
                    <div class="content d-flex flex-column justify-content-center h-100">
                        <h2 class="fw-bold text-light">Your trusted partner for individual and business taxes, with IRS
                            authorization and expert audit support</h2>
                        <p class="fst-italic text-justify"> Our dedicated team of experienced tax consultants is available
                            anytime throughout the year to answer your questions and provide expert guidance. Whether you
                            need advice on deductions, credits, or any other tax-related matter, we are here to help you
                            make informed decisions that benefit your financial well-being </p>
                        <ul>
                            <li>
                                <i class="fa-sharp fa-solid fa-circle-right"></i> Accurate Tax Estimates for High Refunds
                            </li>
                            <li>
                                <i class="fa-sharp fa-solid fa-circle-right"></i> Tax planning for the present and future
                            </li>
                            <li>
                                <i class="fa-sharp fa-solid fa-circle-right"></i> Stringent Data Protection and Security
                                Measures
                            </li>
                        </ul>
                        <!-- <a href="#" class="read-more align-self-start"><span>Read More</span><i class="bi bi-arrow-right"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End On Focus Section -->
    <!-- ======= Call To Action Section ======= -->
    <section id="cta" class="cta" data-aos="fade-up">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                    <h2 class="fw-bold">Put Your Tax Worries to Rest Trust Enigma Tax Filing</h2>
                    <p class="text-justify"> With Enigma Tax Filing, you can have peace of mind knowing that you are in
                        capable hands. Our commitment to excellence, personalized service, and dedication to maximizing your
                        tax refunds set us apart. Experience the Enigma difference today!</p>
                    <p class="text-justify"> We don't just focus on the current year's taxes; we help you plan ahead for
                        future success. Our expert team will evaluate your previous year's tax returns to identify missed
                        opportunities and implement strategies that optimize your financial situation both now and in the
                        future.</p>
                    <a class="cta-btn align-self-start" href="register.php">File Tax Now</a>
                </div>
                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                    <div class="img">
                        <img src="images/cta.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call To Action Section -->
    <!-- testimonial -->
    <section class="py-5 testimonial_sec bg-light">
        <div class="container">
            <div class="section-title mb-5">
                <h2 data-aos="zoom-in">Feedback from our custormers</h2>
                <p class="text-center" data-aos="fade-up">At Enigma Tax Filing, we specialize in crafting perfect tax
                    planning strategies that ensure you receive the maximum refund possible. See the following feedback of
                    our customers</p>
            </div>
            <div class="testimonial-wrapper">
                <!--  single testimonial  -->
                <div class="testimonial">
                    <div class="testimonial-bubble">
                        <div class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <div class="testimonial-text">
                            <p>"Enigma Tax Filing is an absolute game-changer! I've been a loyal user for years, and their
                                intuitive software has made tax season a breeze. I can't imagine filing with anyone else."
                            </p>
                        </div>
                        <h3>John Doe</h3>
                        <p>CEO, ABC Inc.</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/gents.jpg" alt="John Doe">
                    </div>
                </div>
                <!--  single testimonial end  -->
                <!--  single testimonial  -->
                <div class="testimonial">
                    <div class="testimonial-bubble">
                        <div class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <div class="testimonial-text">
                            <p>"I never knew tax filing could be this pleasant until I started using Enigma Tax Filing.
                                Their impeccable customer service and attention to detail have set a new standard for me.
                                Highly recommended!"</p>
                        </div>
                        <h3>Kalyan Varma</h3>
                        <p>Software Engineer</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/gents.jpg" alt="John Doe">
                    </div>
                </div>
                <!--  single testimonial end  -->
                <!--  single testimonial  -->
                <div class="testimonial">
                    <div class="testimonial-bubble">
                        <div class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <div class="testimonial-text">
                            <p>"Enigma Tax Filing relieved all my tax-related stress this year. Their user-friendly platform
                                and personalized support truly made the process hassle-free. I even got unexpected
                                deductions – thank you, Enigma!"</p>
                        </div>
                        <h3>Thomas Mathew</h3>
                        <p>HR Manager</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/lady.jpg" alt="John Doe">
                    </div>
                </div>
                <!--  single testimonial end  -->
                <!--  single testimonial  -->
                <div class="testimonial">
                    <div class="testimonial-bubble">
                        <div class="testimonial-rating">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                        </div>
                        <div class="testimonial-text">
                            <p>"Enigma Tax Filing has truly simplified the tax filing experience for me. Their attention to
                                detail and dedication to accuracy have earned my trust. I couldn't be happier with their
                                service."</p>
                        </div>
                        <h3>Harish Reddy</h3>
                        <p>Web Developer</p>
                    </div>
                    <div class="testimonial-author">
                        <img src="images/gents.jpg" alt="John Doe">
                    </div>
                </div>
                <!--  single testimonial end  -->
            </div>
        </div>
    </section>
    <!-- end testimonail -->
@endsection
