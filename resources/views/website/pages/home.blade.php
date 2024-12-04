@extends('website.layout.websitemain')
@section('title', 'Home | ' . config('app.name'))
@section('content')



    <!-- Top Banner -->
    <div class="banner-area">
        <div class="banner banner--style2-slider-active banner--animated-content slider--pagination">

            <!-- Single Banner -->
            <div class="banner__single banner__single--style2 bg--grey" data-background-text="DBA">
                <div class="banner__single__thumb">
                    <img class="banner__single__sadthumb" src="{{ asset('assets/websiteAssets/images/banner/sad-man.png') }}"
                        alt="sad man">
                    <div class="banner__single__special-text">
                        <img src="{{ asset('assets/websiteAssets/images/banner/banner-special.png') }}" alt="special text">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="banner__single__content color--black">
                                <h1 class="color--theme">DON’T WORRY</h1>
                                <h1>
                                    <strong>OUR EXPERT ADVISORS ALWAYS
                                        <span class="color--theme">WITH YOU</span>
                                    </strong>
                                </h1>
                                <a href="{{ route('contact') }}" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Single Banner -->

            <!-- Single Banner -->
            <div class="banner__single banner__single--style2 bg--grey" data-background-text="DBA">
                <div class="banner__single__thumb">
                    <img class="banner__single__sadthumb"
                        src="{{ asset('assets/websiteAssets/images/banner/sad-man-2.png') }}" alt="sad man">
                    <div class="banner__single__special-text">
                        <img src="{{ asset('assets/websiteAssets/images/banner/banner-special.png') }}" alt="special text">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="banner__single__content color--black">
                                <h1 class="color--theme">DON’T WORRY</h1>
                                <h1>
                                    <strong>Connect with our expert
                                        <span class="color--theme">Advisors</span>
                                    </strong>
                                </h1>
                                <a href="{{ route('contact') }}" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Single Banner -->

            <!-- Single Banner -->
            <div class="banner__single banner__single--style2 bg--grey" data-background-text="DBA">
                <div class="banner__single__thumb">
                    <img class="banner__single__sadthumb"
                        src="{{ asset('assets/websiteAssets/images/banner/sad-man-3.png') }}" alt="sad man">
                    <div class="banner__single__special-text">
                        <img src="{{ asset('assets/websiteAssets/images/banner/banner-special.png') }}" alt="special text">
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 offset-lg-5">
                            <div class="banner__single__content color--black">
                                <h1 class="color--theme">DON’T WORRY</h1>
                                <h1>
                                    <strong>Connect with our expert
                                        <span class="color--theme">Advisors</span>
                                    </strong>
                                </h1>
                                <a href="{{ route('contact') }}" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Single Banner -->

        </div>
    </div>
    <!-- //Top Banner -->

    <!-- Page Conent -->
    <main class="page-content">

        <!-- Features Area -->
        <section id="features-area" class="cr-section features-area">
            <div class="row no-gutters">

                <!-- Single Feature -->
                <div class="col-lg-4">
                    <div class="feature">
                        <div class="feature__icon">
                            <span>
                                <i class="flaticon-shield"></i>
                            </span>
                            <span>
                                <i class="flaticon-shield"></i>
                            </span>
                        </div>
                        <div class="feature__content">
                            <h4 class="wow fadeInUp">
                                <a href="{{ route('features') }}">ENSURE SECURITY</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Your data is protected with advanced encryption
                                and
                                secure systems to ensure confidentiality and peace of mind.</p>
                        </div>
                    </div>
                </div>
                <!--// Single Feature -->

                <!-- Single Feature -->
                <div class="col-lg-4">
                    <div class="feature active">
                        <div class="feature__icon">
                            <span>
                                <i class="flaticon-team"></i>
                            </span>
                            <span>
                                <i class="flaticon-team"></i>
                            </span>
                        </div>
                        <div class="feature__content">
                            <h4 class="wow fadeInUp">
                                <a href="{{ route('features') }}">EXPERT TEAM</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Work with our experienced professionals
                                specializing
                                in legal and tax filing services to guide you every step of the way.</p>
                        </div>
                    </div>
                </div>
                <!--// Single Feature -->

                <!-- Single Feature -->
                <div class="col-lg-4">
                    <div class="feature">
                        <div class="feature__icon">
                            <span>
                                <i class="flaticon-24-hours"></i>
                            </span>
                            <span>
                                <i class="flaticon-24-hours"></i>
                            </span>
                        </div>
                        <div class="feature__content">
                            <h4 class="wow fadeInUp">
                                <a href="{{ route('contact') }}">24/7 SUPPORT</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Get round-the-clock support for all your queries
                                and concerns. Our team is here to assist you anytime, anywhere.</p>
                        </div>
                    </div>
                </div>
                <!--// Single Feature -->

            </div>
        </section>
        <!--// Features Area -->


        <!-- About Area -->
        <section id="about-area" class="cr-section about-area bg--white section-padding--xlg">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Content Section -->
                    <div class="col-lg-6 order-2 order-lg-1">
                        <div class="about-area__content about-area__content--left">
                            <h4>WE ARE <span class="color--theme">“DBA”</span></h4>
                            <h3 class="cd-headline cx-heading slide">
                                PROVIDING THE BEST TAX AND LEGAL SOLUTIONS FOR YOUR
                                <span class="color--theme cd-words-wrapper cd-words-wrapper-2">
                                    <b class="is-visible">Business</b>
                                    <b>Growth</b>
                                    <b>Success</b>
                                </span>
                            </h3>
                            <p><strong>DBA Consultancy</strong> is dedicated to offering comprehensive and efficient
                                solutions for tax filing, legal compliance, and advisory services. We empower businesses and
                                individuals by simplifying complex processes, ensuring accuracy, and meeting deadlines
                                effectively.</p>
                            <p>With a team of experienced professionals, we take care of your legal and financial needs,
                                allowing you to focus on what matters most—growing your business and achieving success.</p>
                            <a href="{{ route('about') }}" class="cr-readmore">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                    <!--// Content Section -->

                    <!-- Image Section -->
                    <div class="col-lg-6 order-1 order-lg-2 text-lg-right text-center">
                        <div class="about-area__image about-area__image--right">
                            <img src="{{ asset('assets/websiteAssets/images/about/about-thumbnail-2.jpg') }}"
                                alt="About DBA Consultancy">
                            <span class="about-area__image__marker">About DBA</span>
                        </div>
                    </div>
                    <!--// Image Section -->
                </div>
            </div>
        </section>

        <!-- //About Area -->

        <section id="service-area" class="service-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12">
                        <div class="section-title">
                            <h4>OUR SERVICES</h4>
                            <h2>PROVIDING THE BEST <span class="color--theme">SERVICES</span></h2>
                            <p>We offer tailored tax and financial services to help individuals and businesses navigate the
                                complexities of taxation with ease and confidence.</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start">
                    <!-- Services Section -->
                    <div class="col-lg-8">
                        <div class="service-area__services">
                            <div class="row">

                                <!-- Personal Tax -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-user.png') }}"
                                                alt="Personal Tax Icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="#">PERSONAL TAX</a>
                                            </h5>
                                            <p>Expert solutions to manage personal tax filings, ensuring compliance and
                                                optimizing your returns.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Corporate Tax -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-bar.png') }}"
                                                alt="Corporate Tax Icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="#">CORPORATE TAX</a>
                                            </h5>
                                            <p>Comprehensive corporate tax services to help your business stay compliant
                                                while minimizing tax liabilities.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Business Tax -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-briefcase.png') }}"
                                                alt="Business Tax Icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="#">BUSINESS TAX</a>
                                            </h5>
                                            <p>Custom solutions for small and medium-sized businesses to streamline tax
                                                processes and maximize savings.</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Finance Tax -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-pie.png') }}"
                                                alt="Finance Tax Icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="#">FINANCIAL TAX</a>
                                            </h5>
                                            <p>Specialized financial tax advisory to ensure your investments and finances
                                                remain compliant and profitable.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Progress Section -->
                    <div class="col-lg-4">
                        <div class="service-area__bars">
                            <div class="cr-bars cr-bars--horizontal justify-content-end">
                                <div class="cr-bar cr-bar--horizontal" data-bar-percent="25" data-bar-title="2013"></div>
                                <div class="cr-bar cr-bar--horizontal" data-bar-percent="45" data-bar-title="2014"></div>
                                <div class="cr-bar cr-bar--horizontal" data-bar-percent="37" data-bar-title="2015"></div>
                                <div class="cr-bar cr-bar--horizontal" data-bar-percent="69" data-bar-title="2016"></div>
                                <div class="cr-bar cr-bar--horizontal" data-bar-percent="88" data-bar-title="2017"></div>
                            </div>
                            <span class="cr-bars__name">Our Progress</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Funfact Area -->
        <div id="funfact-area" class="funfact-area bg--white">
            <div class="funfacts">
                <div class="row no-gutters">

                    <!-- Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">349</span>
                            </h1>
                            <h5>Trusted Clients</h5>
                            <p>We have earned the trust of over 349 clients worldwide through our reliable services.</p>
                        </div>
                    </div>
                    <!--// Single Funfact -->

                    <!-- Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">109</span>
                            </h1>
                            <h5>Awards Won</h5>
                            <p>Recognition for excellence with 109 industry awards and counting.</p>
                        </div>
                    </div>
                    <!--// Single Funfact -->

                    <!-- Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">459</span>
                            </h1>
                            <h5>Projects Completed</h5>
                            <p>Successfully delivered 459 projects, ensuring client satisfaction every time.</p>
                        </div>
                    </div>
                    <!--// Single Funfact -->

                    <!-- Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">19</span>
                            </h1>
                            <h5>Expert Advisors</h5>
                            <p>Our team of 19 dedicated experts ensures your success is their priority.</p>
                        </div>
                    </div>
                    <!--// Single Funfact -->

                </div>
            </div>
        </div>

        <!--// Funfact Area -->

        <!-- Testimonial Area -->
        <div id="testimonial-area" class="testimonial-area section-padding--xlg bg--grey">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial testimonial-slider-active testimonial--style2">

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>"DBA Consultancy transformed our business operations. Their seamless services made
                                    managing logistics effortless and efficient!"</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-1.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>Rajesh Sharma</h6>
                                    <span>Managing Director</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>"Highly professional and reliable services. Their expertise in handling corporate
                                    logistics is unmatched!"</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-2.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>Anjali Mehta</h6>
                                    <span>CEO</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>"Their customer-centric approach and quick resolution make them our go-to partner for
                                    logistics solutions."</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-3.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>Vikram Iyer</h6>
                                    <span>Operations Manager</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>"DBA Consultancy has been instrumental in scaling our e-commerce business. Highly
                                    recommended for startups."</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-2.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>Priya Desai</h6>
                                    <span>Entrepreneur</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                    </div>
                </div>
            </div>
        </div>
        <!--// Testimonial Area -->



        <!-- Call To Action Area -->
        <section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
                        <div class="calltoaction text-center">
                            <h3>NEED HELP WITH YOUR
                                <span class="color--theme">TAX & LEGAL SOLUTIONS?</span>
                            </h3>
                            <p>Our expert team is here to assist you with filing taxes, resolving compliance issues, and
                                providing reliable legal advice.
                                Get peace of mind with our hassle-free services tailored to your needs.</p>
                            <h6>CALL US NOW
                                <a href="tel:+918123456789">+91 81234 56789</a> (TOLL-FREE)
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Call To Action Area -->

    </main>
    <!-- //Page Conent -->


@endsection
