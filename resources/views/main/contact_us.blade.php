@extends('main.includes.web_page');
@section('keywords')
    <title></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="robots" content="index,follow">
    <link rel="canonical" href=" ">
@endsection
@section('content')
    <!-- inner banner -->
    <section class="inner_banner py-5">
        <div class="py-5">
            <ul class="py-md-5">
                <li>
                    <a href="index.html" class="text-decoration-none text-light">Home</a>
                </li>
                <li>Contact us</li>
            </ul>
        </div>
    </section>
    <!-- end inner banner -->
    <!-- contact -->
    <section class="contact-page-sec py-5">
        <div class="container">
            <div class="section-title mb-5">
                <h2>Get in Touch with us</h2>
                <p class="text-center">Not only does it save your money, but it also ensures that your tax return is
                    accurate and submitted on time. So, Please free to call us for any query</p>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info h-100">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-map-marked"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2 class="fw-bold text-dark">address</h2>
                                <span class="fw-bold text-secondary">1001 S Main st, Milpitas </span>
                                <span class="fw-bold text-secondary">CA ZIP 95035</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info h-100">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2 class="fw-bold text-dark">E-mail</h2>
                                <span>
                                    <a href="mailto:support@enigmataxfiling.com"
                                        class="text-secondary fw-bold">support@enigmataxfiling.com</a>
                                </span>
                                <span class="invisible">support@enigmataxfiling.com</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="contact-info h-100">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="contact-info-text">
                                <h2 class="fw-bold text-dark">Call us</h2>
                                <span>
                                    <a href="tel:+14158514219" class="text-secondary fw-bold">+1-4158514219</a>
                                </span>
                                <span class="invisible">Thu - Mon 10.00 pm - 5.00 pm</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-page-form" method="post">
                        <form action="contact-mail.php" method="post">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Your Name" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="email" placeholder="E-mail" name="email" required />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Phone Number" name="phone" />
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="single-input-field">
                                        <input type="text" placeholder="Subject" name="subject" />
                                    </div>
                                </div>
                                <div class="col-md-12 message-input">
                                    <div class="single-input-field">
                                        <textarea placeholder="Write Your Message" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="single-input-fieldsbtn">
                                    <input type="submit" value="Send Now" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-page-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12675.442512185638!2d-121.90335099999999!3d37.416769!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fc9349f007d63%3A0x1397c2ed9cac82c9!2s1001%20S%20Main%20St%2C%20Milpitas%2C%20CA%2095035%2C%20USA!5e0!3m2!1sen!2sin!4v1700296512961!5m2!1sen!2sin"
                            width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->
@endsection
