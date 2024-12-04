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
                                <a href="{{ route('homepage') }}">Home</a>
                            </li>
                            <li>Features</li>
                        </ul>
                        <h1>Features</h1>
                        <p>Explore our unique features designed to simplify tax filing and legal compliance for your
                            business success.</p>
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
                <!-- Feature: Ensure Security -->
                <div class="pg-features">
                    <div class="row align-items-end">
                        <div class="col-xl-8 col-lg-7 order-2 order-lg-1">
                            <div class="pg-features__description">
                                <span class="pg-features__icon">
                                    <i class="flaticon-shield"></i>
                                </span>
                                <div class="pg-features__content">
                                    <h3>Ensure Security</h3>
                                    <p>We prioritize the security of your financial and legal data, employing cutting-edge
                                        encryption and protocols to safeguard your sensitive information.</p>
                                    <p>Our solutions are designed to mitigate risks and ensure compliance with all
                                        applicable regulations, giving you peace of mind.</p>
                                    <p>From secure data storage to robust fraud detection, we offer a comprehensive shield
                                        for your business.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 wow fadeInRight order-1 order-lg-2">
                            <div class="pg-features__thumb">
                                <img src="{{ asset('assets/websiteAssets/images/feature/feature-thumb-1.jpg') }}"
                                    alt="Security Feature">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature: Expert Team -->
                <div class="pg-features">
                    <div class="row align-items-end">
                        <div class="col-xl-4 col-lg-5 wow fadeInLeft">
                            <div class="pg-features__thumb">
                                <img src="{{ asset('assets/websiteAssets/images/feature/feature-thumb-2.jpg') }}"
                                    alt="Expert Team">
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7">
                            <div class="pg-features__description">
                                <span class="pg-features__icon">
                                    <i class="flaticon-team"></i>
                                </span>
                                <div class="pg-features__content">
                                    <h3>Expert Team</h3>
                                    <p>Our experienced professionals bring decades of expertise in tax consultancy, legal
                                        compliance, and financial management.</p>
                                    <p>We tailor our services to meet the unique needs of your business, ensuring accuracy
                                        and efficiency at every step.</p>
                                    <p>Collaborate with our team to achieve your goals and leverage insights that drive
                                        growth and compliance success.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature: 24/7 Support -->
                <div class="pg-features">
                    <div class="row align-items-end">
                        <div class="col-xl-8 col-lg-7 order-2 order-lg-1">
                            <div class="pg-features__description">
                                <span class="pg-features__icon">
                                    <i class="flaticon-24-hours"></i>
                                </span>
                                <div class="pg-features__content">
                                    <h3>24/7 Support</h3>
                                    <p>We understand the importance of timely assistance, which is why our support team is
                                        available 24/7 to resolve your queries and concerns.</p>
                                    <p>Whether you need guidance on filing taxes or immediate help with a legal issue, we're
                                        just a call away.</p>
                                    <p>Our dedicated support ensures that you never face challenges alone and have expert
                                        assistance whenever required.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5 wow fadeInRight order-1 order-lg-2">
                            <div class="pg-features__thumb">
                                <img src="{{ asset('assets/websiteAssets/images/feature/feature-thumb-3.jpg') }}"
                                    alt="24/7 Support">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--// Features Area -->


    </main>
    <!-- //Page Conent -->

@endsection
