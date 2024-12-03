@extends('website.layout.websitemain')
@section('title', 'Features | ' . config('app.name'))
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
                            <li>Features</li>
                        </ul>
                        <h1>Features</h1>
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

        <!-- Features Area -->
        <section id="pg-features-area" class="cr-section pg-features-area section-padding--xlg">
            <div class="container">
                <div class="pg-features">
                    <div class="row align-items-end">
                        <div class="col-xl-8 col-lg-7 order-2 order-lg-1">
                            <div class="pg-features__description">
                                <span class="pg-features__icon">
                                    <i class="flaticon-shield"></i>
                                </span>
                                <div class="pg-features__content">
                                    <h3>ENSURE SECURITY</h3>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim ad minima veniam, quis
                                        nostrum exercitationem ullam corporis</p>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore</p>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim ad minima </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 wow fadeInRight order-1 order-lg-2">
                            <div class="pg-features__thumb">
                                <img src="{{ asset('assets/websiteAssets/images/feature/feature-thumb-1.jpg') }}"
                                    alt="feature thumb 1">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pg-features">
                    <div class="row align-items-end">
                        <div class="col-xl-4 col-lg-5 wow fadeInLeft">
                            <div class="pg-features__thumb">
                                <img src="{{ asset('assets/websiteAssets/images/feature/feature-thumb-2.jpg') }}"
                                    alt="feature thumb 1">
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">
                            <div class="pg-features__description">
                                <span class="pg-features__icon">
                                    <i class="flaticon-team"></i>
                                </span>
                                <div class="pg-features__content">
                                    <h3>Expert Team</h3>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim ad minima veniam, quis
                                        nostrum exercitationem ullam corporis</p>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore</p>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim ad minima </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pg-features">
                    <div class="row align-items-end">
                        <div class="col-xl-8 col-lg-7 order-2 order-lg-1">
                            <div class="pg-features__description">
                                <span class="pg-features__icon">
                                    <i class="flaticon-24-hours"></i>
                                </span>
                                <div class="pg-features__content">
                                    <h3>24/7 Support</h3>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim ad minima veniam, quis
                                        nostrum exercitationem ullam corporis</p>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore</p>
                                    <p>perspiciatis unde omnis ist natus error sit voluptatem accusantium loremque tium
                                        totam rem aperiam eaque numquam
                                        eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut
                                        enim ad minima </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 wow fadeInRight order-1 order-lg-2">
                            <div class="pg-features__thumb">
                                <img src="{{ asset('assets/websiteAssets/images/feature/feature-thumb-3.jpg') }}"
                                    alt="feature thumb 1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--// Features Area -->

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
