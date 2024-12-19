@extends('website.layout.websitemain')
@section('title', 'Services | ' . config('app.name'))
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
                            <li>Services</li>
                        </ul>
                        <h1>Our Services</h1>
                        <p>Discover our comprehensive range of services designed to cater to all your tax and legal needs
                            with precision and reliability.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Breadcrumb Area -->

    <!-- Page Conent -->
    <main class="page-content">

        <!-- Page Service Area -->
        <section id="pg-services-area" class="cr-section pg-services-area section-padding--xlg">

            <!-- Pg Service Area Top -->
            <div class="pg-services-area__description">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 order-2 order-lg-1">
                            <div class="pg-services__details">
                                <h4>STRUGGLING WITH TAX CHALLENGES?</h4>
                                <h3>EXPERT
                                    <span class="color--theme">SOLUTIONS TAILORED FOR YOU</span>
                                </h3>
                                <p>We specialize in solving complex tax problems with efficiency and expertise. Our
                                    dedicated team ensures that every solution is tailored to your unique needs, ensuring
                                    accuracy and peace of mind.</p>
                                <p>Whether you’re dealing with filing issues, compliance challenges, or strategic tax
                                    planning, our services are designed to provide unmatched support and guidance at every
                                    step.</p>
                                <p>With years of experience and a client-focused approach, we deliver results that minimize
                                    risks and maximize benefits, helping you achieve financial clarity and security.</p>
                            </div>
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2">
                            <div class="pg-services__thumb wow fadeInRight">
                                <img src="{{ asset('assets/websiteAssets/images/services/sevices-thumb-right.jpg') }}"
                                    alt="Expert Tax Services">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--// Pg Service Area Top -->

            <!-- Services Styles Bottom -->
            <div class="pg-services-area__srevicelist servicelist--style2">
                <div class="container">
                    <div class="row">
                        @foreach ($services as $row)

                        <!-- Single Service -->
                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="service service--style2 border p-3 rounded-3">
                                <div class="service__thumb">
                                    <a href="#">
                                        <img width="75" src="{{ asset('assets/images/Services/'.$row->iconimage) }}"
                                            alt="Personal Tax Services">
                                    </a>
                                </div>
                                <div class="service__content">
                                    <h5>
                                        <a href="#">{{$row->label}}</a>
                                    </h5>
                                    <div class="fw-bold">Rs. {{$row->price}}</div>
                                    <p>{{ SUBSTR($row->details, 0, 100)}}</p>
                                </div>
                                <div class="mt-3">
                                    <a href="#" class="btn btn-primary ">
                                        Buy Now
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!--// Single Service -->
                        @endforeach

                        <!-- Single Service -->
                        {{-- <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="service service--style2">
                                <div class="service__thumb">
                                    <a href="#">
                                        <img src="{{ asset('assets/websiteAssets/images/services/service-thumb-2.jpg') }}"
                                            alt="Corporate Tax Services">
                                    </a>
                                </div>
                                <div class="service__content">
                                    <h5>
                                        <a href="#">Corporate Tax Services</a>
                                    </h5>
                                    <p>Our Corporate Tax Services help businesses optimize their tax positions, ensuring
                                        compliance while minimizing liabilities.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="service service--style2">
                                <div class="service__thumb">
                                    <a href="#">
                                        <img src="{{ asset('assets/websiteAssets/images/services/service-thumb-3.jpg') }}"
                                            alt="Property Tax Services">
                                    </a>
                                </div>
                                <div class="service__content">
                                    <h5>
                                        <a href="#">Property Tax Services</a>
                                    </h5>
                                    <p>We offer expert guidance on property tax assessment, dispute resolution, and
                                        compliance to minimize your tax burden.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="service service--style2">
                                <div class="service__thumb">
                                    <a href="#">
                                        <img src="{{ asset('assets/websiteAssets/images/services/service-thumb-4.jpg') }}"
                                            alt="Business Tax Services">
                                    </a>
                                </div>
                                <div class="service__content">
                                    <h5>
                                        <a href="#">Business Tax Services</a>
                                    </h5>
                                    <p>Our business tax services are designed to help you navigate the complexities of tax
                                        laws, ensuring your business stays compliant and profitable.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="service service--style2">
                                <div class="service__thumb">
                                    <a href="#">
                                        <img src="{{ asset('assets/websiteAssets/images/services/service-thumb-5.jpg') }}"
                                            alt="International Tax Services">
                                    </a>
                                </div>
                                <div class="service__content">
                                    <h5>
                                        <a href="#">International Tax Services</a>
                                    </h5>
                                    <p>Our international tax experts provide guidance on global tax compliance, cross-border
                                        transactions, and international tax treaties.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 wow fadeInUp">
                            <div class="service service--style2">
                                <div class="service__thumb">
                                    <a href="#">
                                        <img src="{{ asset('assets/websiteAssets/images/services/service-thumb-6.jpg') }}"
                                            alt="Finance Tax Services">
                                    </a>
                                </div>
                                <div class="service__content">
                                    <h5>
                                        <a href="#">Finance Tax Services</a>
                                    </h5>
                                    <p>Our finance tax services are tailored to help individuals and businesses optimize tax
                                        efficiency in their financial strategies.</p>
                                </div>
                            </div>
                        </div> --}}

                        <!--// Single Service -->

                    </div>
                </div>
            </div>
            <!--// Services Styles Bottom -->

        </section>
        <!--// Page Service Area -->

    </main>
    <!-- //Page Conent -->



@endsection
