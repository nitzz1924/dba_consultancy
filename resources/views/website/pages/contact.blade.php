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
                            <li><a href="index.html">Home</a></li>
                            <li>Contact</li>
                        </ul>
                        <h1>Contact Us</h1>
                        <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam
                            rem </p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--// Breadcrumb Area -->

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
                                    <form id="contact-form" action="https://demo.hasthemes.com/korde/korde/mail.php"
                                        method="POST">
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

            <div class="google-map-wrapper">
                <div id="google-map" class="google-map"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9">
                            <div class="pg-contact__content">
                                <h1>say hello to us</h1>
                                <p>perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem </p>
                                <div class="pg-contact__blocks">
                                    <div class="single-block address">
                                        <h6>address</h6>
                                        <p>256 Notrh Tower, Western City Mid Town, Las Vagas, USA</p>
                                    </div>
                                    <div class="single-block phone">
                                        <h6>Phone</h6>
                                        <p><a href="#">+008 12568 987 789</a></p>
                                        <p><a href="#">+008 35687 567 458</a></p>
                                    </div>
                                    <div class="single-block web">
                                        <h6>Web</h6>
                                        <p><a href="#">info@taxco.com</a></p>
                                        <p><a href="#">www@taxco.com</a></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="pg-contact__newsletter">
                                            <h5>also subscribe our newsletter to be uptodae</h5>
                                            <form
                                                action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef"
                                                method="post" target="_blank">
                                                <input type="email" name="EMAIL" class="email" id="mce-EMAIL"
                                                    placeholder="Your Email here" required>
                                                <button type="submit"><i class="fa fa-paper-plane-o"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--// Pg Contact -->

        <!-- Call To Action Area -->
        <section id="cta-area" class="cta-area section-padding--sm bg--grey--light bg--abstruct-mask">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 col-md-12 offset-0">
                        <div class="calltoaction text-center">
                            <h3>NEED ANY HELP AT<span class="color--theme"> YOUR TAX SOLUTION?</span></h3>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                                totam rem aperiam, eaque ipsa Neque porro quisquam est, qui dolorem ipsum quia dolor sit
                                amet, consectetur, adipisci </p>
                            <h6>JUST DAIL <a href="callto://+00812548359874">+008 12548 359 874</a> (TOLL FREE)</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--// Call To Action Area -->

    </main><!-- //Page Conent -->

@endsection
