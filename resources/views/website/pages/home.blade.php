@extends('website.layout.websitemain')
@section('title', 'Home | ' . config('app.name'))
@section('content')



    <!-- Top Banner -->
    <div class="banner-area">
        <div class="banner banner--style2-slider-active banner--animated-content slider--pagination">

            <!-- Single Banner -->
            <div class="banner__single banner__single--style2 bg--grey" data-background-text="Korde">
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
                                <a href="{{ route('contact')}}" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Single Banner -->

            <!-- Single Banner -->
            <div class="banner__single banner__single--style2 bg--grey" data-background-text="Korde">
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
                                <a href="contact.html" class="cr-btn">
                                    <span>Contact Now</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //Single Banner -->

            <!-- Single Banner -->
            <div class="banner__single banner__single--style2 bg--grey" data-background-text="Korde">
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
                                <a href="contact.html" class="cr-btn">
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
                                <a href="features.html">ENSURE SECURITY</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Perspiciatis unde omnis ist natus error sit
                                voluptatem accusantium loremque tium totam rem aperiam eaque </p>
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
                                <a href="features.html">EXPERT TEAM</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Perspiciatis unde omnis ist natus error sit
                                voluptatem accusantium loremque tium totam rem aperiam eaque </p>
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
                                <a href="features.html">24/7 SUPPORT</a>
                            </h4>
                            <p class="wow fadeInUp" data-wow-delay="0.15s">Perspiciatis unde omnis ist natus error sit
                                voluptatem accusantium loremque tium totam rem aperiam eaque </p>
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
                    <div class="col-lg-6 order-2 order-kg-1">
                        <div class="about-area__content about-area__content--left">
                            <h4>WE ARE “
                                <span class="color--theme">Korde</span>”
                            </h4>
                            <h3 class="cd-headline cx-heading slide">PROVIDE BEST TAX SOLUTION FOR YOUR
                                <span class="color--theme cd-words-wrapper cd-words-wrapper-2">
                                    <b class="is-visible">Business</b>
                                    <b>Performance</b>
                                    <b>Success</b>
                                </span>
                                TO GROWUP
                            </h3>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium que laudantium, totam rem
                                aperiam, eaque ipsa
                                quae </p>
                            <p>Parchitecto beatae vitae dicta sunt explicabo. Nemo enim ipsam tatem quia voluptas sit
                                aspernatur aut odit aut fugit,
                                sed quia tur magni dolores eos qui ratione voluptatem sequi nesciunt</p>
                            <a href="about-us.html" class="cr-readmore">
                                <span>Read More</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-lg-right text-center">
                        <div class="about-area__image about-area__image--right">
                            <img src="{{ asset('assets/websiteAssets/images/about/about-thumbnail-2.jpg') }}"
                                alt="about area image">
                            <span class="about-area__image__marker">about korde</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- //About Area -->

        <!-- Tax Calculation Area -->
        <section id="tax-calculation" class="tax-calculation-area bg--grey--light">
            <div class="taxcalc">
                <div class="row no-gutters align-items-center">

                    <!-- Tax Calculation Area Left -->
                    <div class="col-xl-5 col-lg-12">
                        <div class="taxcalc__content" data-black-overlay="4">
                            <div class="taxcalc__content__inner">
                                <h3>TAX
                                    <span class="color--theme">CALCULATION</span>
                                </h3>
                                <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudanti,
                                    totam rem aperiam, eaque
                                    ipsa quae so some thing new for tax calculation </p>
                            </div>
                        </div>
                    </div>
                    <!--// Tax Calculation Area Left -->

                    <!-- Tax Calculation Area Right -->
                    <div class="col-xl-7 col-lg-12">
                        <div class="taxcalc__calculation">
                            <div class="taxcalc__calculation__inner">
                                <div class="row no-gutters">

                                    <div class="col-lg-6 col-md-6 wow fadeInUp">
                                        <div class="single-input">
                                            <label for="taxcalc-business-area">Choose Your Business Area*</label>
                                            <select name="taxcalc-business-area" id="taxcalc-business-area">
                                                <option value="1">Select your business</option>
                                                <option value="2">Marketing</option>
                                                <option value="3">IT Industries</option>
                                                <option value="4">Management Industries</option>
                                                <option value="5">Property Business</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="0.15">
                                        <div class="single-input">
                                            <label for="taxcalc-country-residence">Country of residence*</label>
                                            <select name="taxcalc-country-residence" id="taxcalc-country-residence">
                                                <option value="1">Australia</option>
                                                <option value="2">United States</option>
                                                <option value="3">United Kingdom</option>
                                                <option value="3">Germany</option>
                                                <option value="3">Netherland</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3">
                                        <div class="single-input">
                                            <label for="taxcalc-employee-counter">Number of Employees</label>
                                            <select name="taxcalc-employee-counter" id="taxcalc-employee-counter">
                                                <option value="1">Select Here</option>
                                                <option value="2">0 - 20</option>
                                                <option value="3">21 - 50</option>
                                                <option value="4">51 - 150</option>
                                                <option value="5">151 - 500</option>
                                                <option value="6">500+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.45">
                                        <div class="single-input">
                                            <label for="taxcalc-tax-year">Tax Year*</label>
                                            <select name="taxcalc-tax-year" id="taxcalc-tax-year">
                                                <option value="1">2000 - 2005</option>
                                                <option value="2">2006 - 2010</option>
                                                <option value="3">2011 - 2015</option>
                                                <option value="4">2016 - 2020</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 col-md-12 wow fadeInUp" data-wow-delay="0.6">
                                        <div class="single-input">
                                            <label for="taxcalc-yearly-income">Yearly Total Income</label>
                                            <select name="taxcalc-yearly-income" id="taxcalc-yearly-income">
                                                <option value="1">Select Range</option>
                                                <option value="2">0 - 1 Million</option>
                                                <option value="3">1 Million - 3 Million</option>
                                                <option value="4">3 Million - 10 Million</option>
                                                <option value="5">10 Million - 20 Million</option>
                                                <option value="6">20 Million+</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-md-8 wow fadeInUp" data-wow-delay="0.75">
                                        <div class="button-holder">
                                            <button class="cr-btn" type="submit">
                                                <span>Calculate</span>
                                            </button>
                                            <span class="equal-sign">=</span>
                                            <div class="single-input">
                                                <label for="taxcalc-total-calculation">Total Payable Tax</label>
                                                <input type="text" id="taxcalc-total-calculation"
                                                    placeholder="$000.00">
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--// Tax Calculation Area Right -->

                </div>
            </div>
        </section>
        <!--// Tax Calculation Area -->

        <!-- Service Area -->
        <section id="service-area" class="service-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-10 col-12">
                        <div class="section-title">
                            <h4>OUR SERVICES</h4>
                            <h2>PROVIDE BEST
                                <span class="color--theme">SERVICES</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="row align-items-start">
                    <div class="col-lg-8">
                        <div class="service-area__services">
                            <div class="row">

                                <!-- Single Service -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-user.png') }}"
                                                alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="single-service.html">PERSONAL TAX</a>
                                            </h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque
                                                tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>
                                <!--// Single Service -->

                                <!-- Single Service -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-bar.png') }}"
                                                alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="single-service.html">CORPORATE TAX</a>
                                            </h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque
                                                tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>
                                <!--// Single Service -->

                                <!-- Single Service -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-briefcase.png') }}"
                                                alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="single-service.html">Business TAX</a>
                                            </h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque
                                                tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>
                                <!--// Single Service -->

                                <!-- Single Service -->
                                <div class="col-lg-6 col-md-6 wow flipInX">
                                    <div class="service">
                                        <div class="service__icon">
                                            <img src="{{ asset('assets/websiteAssets/images/icons/service-icon-pie.png') }}"
                                                alt="service icon">
                                        </div>
                                        <div class="service__content">
                                            <h5>
                                                <a href="single-service.html">Finance TAX</a>
                                            </h5>
                                            <p>Perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque
                                                tium totam rem per </p>
                                        </div>
                                    </div>
                                </div>
                                <!--// Single Service -->

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="service-area__bars">
                            <div class="cr-bars cr-bars--horaizontal justify-content-end">
                                <div class="cr-bar cr-bar--horaizontal" data-bar-percent="25" data-bar-title="2013">
                                </div>
                                <div class="cr-bar cr-bar--horaizontal" data-bar-percent="45" data-bar-title="2014">
                                </div>
                                <div class="cr-bar cr-bar--horaizontal" data-bar-percent="37" data-bar-title="2015">
                                </div>
                                <div class="cr-bar cr-bar--horaizontal" data-bar-percent="69" data-bar-title="2016">
                                </div>
                                <div class="cr-bar cr-bar--horaizontal" data-bar-percent="88" data-bar-title="2017">
                                </div>
                            </div>
                            <span class="cr-bars__name">Our progress</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Service Area -->

        <!-- Funfact Area -->
        <div id="funfact-area" class="funfact-area bg--white">
            <div class="funfacts">
                <div class="row no-gutters">

                    <!--  Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">349</span>
                            </h1>
                            <h5>TRUSTED CLIENTS</h5>
                        </div>
                    </div>
                    <!--//  Single Funfact -->

                    <!--  Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">109</span>
                            </h1>
                            <h5>Awards Win</h5>
                        </div>
                    </div>
                    <!--//  Single Funfact -->

                    <!--  Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">459</span>
                            </h1>
                            <h5>Project Done</h5>
                        </div>
                    </div>
                    <!--//  Single Funfact -->

                    <!--  Single Funfact -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="funfact text-center">
                            <h1>
                                <span class="counter">19</span>
                            </h1>
                            <h5>Expert Advisor</h5>
                        </div>
                    </div>
                    <!--//  Single Funfact -->

                </div>
            </div>
        </div>
        <!--// Funfact Area -->

        <!-- Team Area -->
        <section id="team-area" class="advisor-area bg--white section-padding--xlg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                        <div class="section-title text-center">
                            <h4>OUR TEAM</h4>
                            <h2>MEET OUR
                                <span class="color--theme">TAX ADVISOR</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="row advisors advisors--style2">

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="advisor advisor--style2">
                            <div class="advisor__image">
                                <img s assetrc="{{ asset('assets/websiteAssets/images/advisors/advisor-1.jpg') }}"
                                    alt="team member">
                            </div>
                            <div class="advisor__content">
                                <h5>David miller</h5>
                                <p>Tax Advisor</p>
                            </div>
                            <div class="advisor__social-icons social-icons">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://plus.google.com/discover">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--// Single Advisor -->

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="advisor advisor--style2">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-2.jpg') }}"
                                    alt="team member">
                            </div>
                            <div class="advisor__content">
                                <h5>JULIA ANDERSON</h5>
                                <p>Tax Advisor</p>
                            </div>
                            <div class="advisor__social-icons social-icons">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://plus.google.com/discover">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--// Single Advisor -->

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="advisor advisor--style2">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-3.jpg') }}"
                                    alt="team member">
                            </div>
                            <div class="advisor__content">
                                <h5>MARTIN SMITH</h5>
                                <p>Tax Advisor</p>
                            </div>
                            <div class="advisor__social-icons social-icons">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://plus.google.com/discover">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--// Single Advisor -->

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="advisor advisor--style2">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-4.jpg') }}"
                                    alt="team member">
                            </div>
                            <div class="advisor__content">
                                <h5>SIMON COOK</h5>
                                <p>Tax Advisor</p>
                            </div>
                            <div class="advisor__social-icons social-icons">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://www.instagram.com/">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://plus.google.com/discover">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--// Single Advisor -->

                </div>
            </div>
        </section>
        <!--// Team Area -->

        <!-- Testimonial Area -->
        <div id="testimonial-area" class="testimonial-area section-padding--xlg bg--grey">
            <div class="row">
                <div class="col-12">
                    <div class="testimonial testimonial-slider-active testimonial--style2">

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>parchitecto beatae vitae dicta sunt explicabo no enim ipsam voluptatem quia voluptas sit
                                    rnatur aut odit aut fugit,
                                    sed quia consequuntur</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-3.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>SHON SMITH</h6>
                                    <span>President</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>parchitecto beatae vitae dicta sunt explicabo no enim ipsam voluptatem quia voluptas sit
                                    rnatur aut odit aut fugit,
                                    sed quia consequuntur</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-2.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>RAISA MARIYA</h6>
                                    <span>Ceo</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>parchitecto beatae vitae dicta sunt explicabo no enim ipsam voluptatem quia voluptas sit
                                    rnatur aut odit aut fugit,
                                    sed quia consequuntur</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-1.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>John Patrik</h6>
                                    <span>Executive</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>parchitecto beatae vitae dicta sunt explicabo no enim ipsam voluptatem quia voluptas sit
                                    rnatur aut odit aut fugit,
                                    sed quia consequuntur</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-3.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>SHON SMITH</h6>
                                    <span>President</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>parchitecto beatae vitae dicta sunt explicabo no enim ipsam voluptatem quia voluptas sit
                                    rnatur aut odit aut fugit,
                                    sed quia consequuntur</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-2.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>RAISA MARIYA</h6>
                                    <span>Ceo</span>
                                </div>
                            </div>
                            <!--// Single Author -->

                        </div>
                        <!--// Testimonial Single -->

                        <!-- Testimonial Single -->
                        <div class="testimonial__single">

                            <!-- Testimonial Content Single -->
                            <div class="testimonial__content__single">
                                <p>parchitecto beatae vitae dicta sunt explicabo no enim ipsam voluptatem quia voluptas sit
                                    rnatur aut odit aut fugit,
                                    sed quia consequuntur</p>
                            </div>
                            <!--// Testimonial Content Single -->

                            <!-- Single Author -->
                            <div class="testimonial__author__single">
                                <div class="testimonial__author__image">
                                    <img src="{{ asset('assets/websiteAssets/images/testimonial/testimonial-author-1.png') }}"
                                        alt="testimonial author">
                                </div>
                                <div class="testimonial__author__description">
                                    <h6>John Patrik</h6>
                                    <span>Executive</span>
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

        <!-- Blog Area -->
        <section id="blog-area" class="blog-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-12 offset-0">
                        <div class="section-title text-center">
                            <h4>OUR BLOG</h4>
                            <h2>LATEST POST
                                <span class="color--theme">FROM BLOG</span>
                            </h2>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                totam rem aperiam, eaque
                                ipsa quae</p>
                        </div>
                    </div>
                </div>
                <div class="row blog-area__blogs justify-content-center">

                    <!-- Single Blog -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <article class="blog sticky">
                            <div class="blog__thumb">
                                <a href="blog-details.html">
                                    <img src="{{ asset('assets/websiteAssets/images/blog/blog-thumbnail-1.jpg') }}"
                                        alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog__content">
                                <header class="blog__content__header">
                                    <ul class="blog__content__categories">
                                        <li>
                                            <a href="blog-right-sidebar.html">Tax</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">Personal Tax</a>
                                        </li>
                                    </ul>
                                    <h4>
                                        <a href="blog-details.html">How to calculate tax ?</a>
                                    </h4>
                                </header>
                                <footer class="blog__content__footer">
                                    <ul class="blog__content__meta">
                                        <li>October 28.</li>
                                        <li>
                                            <a href="blog-right-sidebar.html">Alex Smith.</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">4 Comments</a>
                                        </li>
                                    </ul>
                                    <p>Perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudanti,
                                        totam rem aperiam, eaque ipsa
                                        quae so some ulation </p>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <!--// Single Blog -->

                    <!-- Single Blog -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <article class="blog">
                            <div class="blog__thumb">
                                <iframe
                                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/347257536&amp;color=%23ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></iframe>
                            </div>
                            <div class="blog__content">
                                <header class="blog__content__header">
                                    <ul class="blog__content__categories">
                                        <li>
                                            <a href="blog-right-sidebar.html">Tax</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">Tax Tutorial</a>
                                        </li>
                                    </ul>
                                    <h4>
                                        <a href="blog-details.html">TAX CALCULATION TUTORIAL</a>
                                    </h4>
                                </header>
                                <footer class="blog__content__footer">
                                    <ul class="blog__content__meta">
                                        <li>October 28.</li>
                                        <li>
                                            <a href="blog-right-sidebar.html">Momen Bhuiyan.</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">6 Comments</a>
                                        </li>
                                    </ul>
                                    <p>Perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudanti,
                                        totam rem aperiam, eaque ipsa
                                        quae so some ulation </p>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <!--// Single Blog -->

                    <!-- Single Blog -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <article class="blog blog--slider-active">
                            <div class="blog__thumb">
                                <a href="blog-details.html">
                                    <img src="{{ asset('assets/websiteAssets/images/blog/blog-thumbnail-2.jpg') }}"
                                        alt="blog thumb">
                                </a>
                                <a href="blog-details.html">
                                    <img src="{{ asset('assets/websiteAssets/images/blog/blog-thumbnail-1.jpg') }}"
                                        alt="blog thumb">
                                </a>
                            </div>
                            <div class="blog__content">
                                <header class="blog__content__header">
                                    <ul class="blog__content__categories">
                                        <li>
                                            <a href="blog-right-sidebar.html">BUSINESS</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">BUSINESS DEVELOPMENT</a>
                                        </li>
                                    </ul>
                                    <h4>
                                        <a href="blog-details.html">BUSINESS DEVELOPMENT</a>
                                    </h4>
                                </header>
                                <footer class="blog__content__footer">
                                    <ul class="blog__content__meta">
                                        <li>October 28.</li>
                                        <li>
                                            <a href="blog-right-sidebar.html">Jesica Sharlin.</a>
                                        </li>
                                        <li>
                                            <a href="blog-right-sidebar.html">12 Comments</a>
                                        </li>
                                    </ul>
                                    <p>Perspiciatis unde omnis iste natus error sit tatem accusantium doloremque laudanti,
                                        totam rem aperiam, eaque ipsa
                                        quae so some ulation </p>
                                </footer>
                            </div>
                        </article>
                    </div>
                    <!--// Single Blog -->

                </div>
            </div>
        </section>
        <!--// Blog Area -->

        <!-- Call To Action Area -->
        <section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
                        <div class="calltoaction text-center">
                            <h3>NEED ANY HELP AT
                                <span class="color--theme"> YOUR TAX SOLUTION?</span>
                            </h3>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                totam rem aperiam, eaque
                                ipsa Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci
                            </p>
                            <h6>JUST DAIL
                                <a href="callto://+00812548359874">+008 12548 359 874</a> (TOLL FREE)
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
