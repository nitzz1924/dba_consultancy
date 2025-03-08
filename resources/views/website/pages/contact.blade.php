@extends('website.layout.websitemain')
@section('title', 'Contact Us | ' . config('app.name'))
@section('content')


    <!-- Breadcrumb Area -->
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="cr-breadcrumb">
                        <ul class="cr-breadcrumb__pagination">
                            <li><a href="{{ route('homepage') }}">Home</a></li>
                            <li>Contact</li>
                        </ul>
                        <h1>Contact Us</h1>
                        <p>Reach out to us for expert tax and legal solutions. We're here to guide you every step of the
                            way.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--// Breadcrumb Area -->

    <!-- Page Conent -->
    <main class="page-content">

        <!-- Pg Contact -->
        <div class="pg-contact bg--white">

            <!-- Contact Form -->
            <div class="pg-contact-form-area bg--white section-padding--xlg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-12">
                            <div class="pg-appintment">
                                <div class="pg-appintment__title">
                                    <h2>SEND A MESSAGE</h2>
                                </div>
                                <div class="pg-appintment__box">
                                    <form id="contact-form" action="" method="POST">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="name" id="name" placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-input">
                                                    <input type="email" name="email" id="email" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="subject" id="subject"
                                                        placeholder="Subject">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="phone" id="phone" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input">
                                                    <textarea name="message" cols="30" rows="5" placeholder="Message"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="single-input button text-left">
                                                    <button type="submit" class="cr-btn"><span>Submit</span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="form-message"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-12 d-none d-lg-block">
                            <div class="pg-contact-img ml-xl-5 ml-0">
                                <img src="{{ asset('assets/websiteAssets/images/others/contact-image.jpg') }}"
                                    alt="contact image">
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--// Contact Form -->

            <div class="">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12">
                            <div class="pg-contact__content">
                                <h1>say hello to us</h1>
                                <p>We are here to address your tax and legal concerns. Feel free to reach out for any
                                    assistance or queries.</p>

                                <div class="pg-contact__blocks">
                                    <div class="single-block address">
                                        <h6>Address</h6>
                                        <p>DBA Consultancy, Near Truck Chouraha, NH 8, Bhim, Distt. Rajsamand, Rajasthan - 305921</p>
                                    </div>
                                    <div class="single-block phone">
                                        <h6>Phone</h6>
                                        <p><a href="tel:+917300300339">+91 7300300339</a></p>
                                    </div>
                                    <div class="single-block web">
                                        <h6>Mail Us At</h6>
                                        <p><a href="mailto:info@dbaconsultancy.in">info@dbaconsultancy.in</a></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--// Pg Contact -->


    </main><!-- //Page Conent -->

@endsection
