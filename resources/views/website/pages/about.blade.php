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
                                <a href="index.html">Home</a>
                            </li>
                            <li>About</li>
                        </ul>
                        <h1>About Us</h1>
                        <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                            rem </p>
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
                            <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium que laudantium, totam rem
                                aperiam, eaque ipsa
                                quae pursue pleasure rationally encounter consequences pursue pleasure rationally encounter
                                consequencesp</p>
                            <p>parchitecto beatae vitae dicta sunt explicabo. Nemo enim ipsam tatem quia voluptas sit
                                aspernatur aut odit aut fugit,
                                sed quia tur magni dolores eos qui ratione voluptatem sequi nesciunt pursue pleasure
                                rationally encounter consequences
                                that are extremely painful pursue pleasure rationally encounter consequences that are
                                extremely painful</p>
                            <a href="#" class="cr-readmore">
                                <span>Read More</span>
                            </a>
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

        <!-- Service Area -->
        <section id="service-area" class="service-area section-padding-top--xlg bg--white">
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
                <div class="row align-items-center">
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
                        <div class="service-area__bars text-center">
                            <div class="cr-bars justify-content-lg-end justify-content-center">
                                <div class="cr-bar" data-bar-percent="25" data-bar-title="2013"></div>
                                <div class="cr-bar" data-bar-percent="45" data-bar-title="2014"></div>
                                <div class="cr-bar" data-bar-percent="37" data-bar-title="2015"></div>
                                <div class="cr-bar" data-bar-percent="69" data-bar-title="2016"></div>
                                <div class="cr-bar" data-bar-percent="88" data-bar-title="2017"></div>
                            </div>
                            <span class="cr-bars__name">Our progress</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Service Area -->

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
                                    <a href="advisor-details.html">SIMON DE ANDERSON</a>
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
                                    <a href="advisor-details.html">JUlia ANDERSON</a>
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
                                    <a href="advisor-details.html">David Miller</a>
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
                                    <a href="advisor-details.html">Martin Smith</a>
                                </h6>
                                <p>Tax Advisor</p>
                            </figcaption>
                        </figure>
                    </div>
                    <!--// Single Advisor -->

                </div>
            </div>
        </section>
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

        <!-- Testimonial Area -->
        <div id="testimonial-area" class="testimonial-area section-padding--xlg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="section-title no-padding">
                            <h2>WHAT
                                <span class="color--theme">CLIENTS SAY</span>
                            </h2>
                            <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudanti,
                                totam rem aperiam, eaque
                                ipsa quae so something new for tax calculation </p>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="testimonial testimonial-slider-style3-active testimonial--style3">

                            <!-- Testimonial Single -->
                            <div class="testimonial__single">

                                <!-- Testimonial Content Single -->
                                <div class="testimonial__content__single">
                                    <p>parchitecto beatae vitae dicta sunt abo no enim ipsam voluptatem quia voluptas sit
                                        rnatur aut odit aut fugit, sed
                                        quia</p>
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
                                    <p>parchitecto beatae vitae dicta sunt abo no enim ipsam voluptatem quia voluptas sit
                                        rnatur aut odit aut fugit, sed
                                        quia</p>
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
                                    <p>parchitecto beatae vitae dicta sunt abo no enim ipsam voluptatem quia voluptas sit
                                        rnatur aut odit aut fugit, sed
                                        quia</p>
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
                                    <p>parchitecto beatae vitae dicta sunt abo no enim ipsam voluptatem quia voluptas sit
                                        rnatur aut odit aut fugit, sed
                                        quia</p>
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
                                    <p>parchitecto beatae vitae dicta sunt abo no enim ipsam voluptatem quia voluptas sit
                                        rnatur aut odit aut fugit, sed
                                        quia</p>
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
                                    <p>parchitecto beatae vitae dicta sunt abo no enim ipsam voluptatem quia voluptas sit
                                        rnatur aut odit aut fugit, sed
                                        quia</p>
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
        </div>
        <!--// Testimonial Area -->

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
