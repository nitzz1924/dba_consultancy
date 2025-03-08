@extends('website.layout.websitemain')
@section('title', 'About Us | ' . config('app.name'))
@section('content')

    <!-- Breadcrumb Area -->
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="cr-breadcrumb">
                        <ul class="cr-breadcrumb__pagination">
                            <li>
                                <a href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li>About</li>
                        </ul>
                        <h1>About Us</h1>
                        <p>Welcome to DBA Consultancy, where expertise meets dedication. Discover how we simplify tax and
                            legal solutions to empower your journey to compliance and success.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Breadcrumb Area -->

    <!-- Page Conent -->
    <main class="page-content">

        <!-- About Area -->
        <section id="about-area" class="cr-section about-area bg--white">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="about-area__content2 text-center">
                            <h4>WE ARE “
                                <span class="color--theme">DBA</span>” CONSULTANCY
                            </h4>
                            <h3 class="cd-headline cx-heading slide">PROVIDING THE BEST TAX SOLUTIONS FOR YOUR
                                <span class="color--theme cd-words-wrapper cd-words-wrapper-2">
                                    <b class="is-visible">Business</b>
                                    <b>Growth</b>
                                    <b>Success</b>
                                </span>
                                TO THRIVE
                            </h3>
                            <p>At DBA Consultancy, we specialize in simplifying tax and legal complexities, enabling
                                businesses to focus on growth and efficiency. With our expert solutions, we aim to make
                                compliance hassle-free and seamless.</p>
                            <p>Our dedicated team ensures every service is tailored to meet your unique requirements. From
                                addressing tax challenges to providing robust legal guidance, we help you navigate through
                                challenges with confidence and ease.</p>

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="about-area__image2">
                            <img src="{{ asset('assets/websiteAssets/images/about/about-thumbnail-3.png') }}"
                                alt="about area image">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- //About Area -->

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


        <!-- Team Area -->
        {{-- <section id="team-area" class="advisor-area bg--white section-padding--xlg">
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
                <div class="row advisors">

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <figure class="advisor">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-1.jpg') }}"
                                    alt="team member">
                            </div>
                            <figcaption class="advisor__content">
                                <h6>
                                    <a href="#">SIMON DE ANDERSON</a>
                                </h6>
                                <p>Senior Advisor</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--// Single Advisor -->

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <figure class="advisor">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-2.jpg') }}"
                                    alt="team member">
                            </div>
                            <figcaption class="advisor__content">
                                <h6>
                                    <a href="#">JUlia ANDERSON</a>
                                </h6>
                                <p>Senior Advisor</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--// Single Advisor -->

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <figure class="advisor">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-3.jpg') }}"
                                    alt="team member">
                            </div>
                            <figcaption class="advisor__content">
                                <h6>
                                    <a href="#">David Miller</a>
                                </h6>
                                <p>Tax Advisor</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--// Single Advisor -->

                    <!-- Single Advisor -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <figure class="advisor">
                            <div class="advisor__image">
                                <img src="{{ asset('assets/websiteAssets/images/advisors/advisor-4.jpg') }}"
                                    alt="team member">
                            </div>
                            <figcaption class="advisor__content">
                                <h6>
                                    <a href="#">Martin Smith</a>
                                </h6>
                                <p>Tax Advisor</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--// Single Advisor -->

                </div>
            </div>
        </section> --}}
        <!--// Team Area -->

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
                                <a href="tel:+917300300339">+91 7300300339</a>
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
