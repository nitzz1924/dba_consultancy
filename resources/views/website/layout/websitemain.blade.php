<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DBA Consultancy</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/images/dfavicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('assets/images/dfavicon.png') }}">

    <!-- Google font (font-family: 'Josefin Sans', sans-serif;) -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,600,700" rel="stylesheet">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/websiteAssets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/websiteAssets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/websiteAssets/css/style.css') }}">

    <!-- Cusom css -->
    <link rel="stylesheet" href="{{ asset('assets/websiteAssets/css/custom.css') }}">

    <!-- Modernizer js -->
    <script src="{{ asset('assets/websiteAssets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>

    <!-- Add your site or application content here -->

    <div class="fakeloader"></div>

    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Header -->
        <header id="header" class="header sticky--header">

            <!-- Header Top Area -->
            <div class="header__top bg--blue">
                <div class="container">
                    <div class="header__top__inner">
                        <ul class="header__top__info">
                            <li>
                                <a href="#">
                                    <i class="flaticon-old-typical-phone"></i> 01354 568 787</a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="flaticon-black-back-closed-envelope-shape"></i>
                                    info@dbaconsultancy.com</a>
                            </li>
                        </ul>
                        <div class="header__top__button">
                            <a class="cr-btn cr-btn--lg" href="{{ route('userloginpage') }}">
                                <span>Login</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Header Top Area -->

            <!-- Header Bottom Area -->
            <div class="header__bottom bg--black">
                <div class="container d-none d-lg-block">
                    <div class="header__bottom__inner">
                        <div class="header__logo">
                            <a href="{{ route('homepage') }}">
                                <img src="{{ asset('assets/images/dbalogo.png') }}" alt="header logo" width="150px">
                            </a>
                        </div>

                        <!-- Main Navigation -->
                        <nav id="main-navigation" class="header__menu main-navigation">
                            <ul>
                                <li>
                                    <a href="{{ route('homepage') }}">Home</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">About</a>
                                </li>
                                <li>
                                    <a href="{{ route('features') }}">Features</a>
                                </li>
                                <li>
                                    <a href="{{ route('services') }}">Services</a>
                                </li>

                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </nav>
                        <!--// Main Navigation -->

                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="container d-block d-lg-none">
                    <div class="mobile-menu clearfix d-md-block d-lg-none">
                        <a class="mobile-logo" href="index.html">
                            <img src="{{ asset('assets/images/dbalogo.png') }}" alt="logo">
                        </a>
                    </div>
                </div>
                <!-- //Mobile Menu -->

            </div>
            <!--// Header Bottom Area -->

        </header>
        <!-- //Header -->

        @yield('content')


        <!-- Footer Area -->
        <footer id="footer" class="footer-area fixed--footer">

            <!-- Footer Widgets Area -->
            <div class="footer-area__widgets section-padding--md bg--dark--light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-area__logo text-center">
                                <a href="{{ route('homepage') }}">
                                    <img src="{{ asset('assets/images/dbalogo.png') }}" alt="footer logo"
                                        width="150px">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="widget-area footer--widgets">

                        <!-- Single Widget -->
                        <section class="widget widget-about">
                            <h5 class="widget-title">ABOUT DBA Consultancy</h5>
                            <p>Perspiciatis unde omnis iste natus error sit voluptatem accusantium oloremque laudantium,
                                totam rem onsectetur sires
                                to obtain pain of itself because</p>
                            <div class="social-icons social-icons--rounded">
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
                        </section>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <section class="widget widget-quick-links">
                            <h5 class="widget-title">QUICK LINKS</h5>
                            <ul>
                                <li>
                                    <a href="services.html">Our Services</a>
                                </li>
                                <li>
                                    <a href="features.html">Features</a>
                                </li>
                                <li>
                                    <a href="about-us.html">About Us</a>
                                </li>
                                <li>
                                    <a href="#">Help Centre</a>
                                </li>
                                <li>
                                    <a href="contact.html">Contact Us</a>
                                </li>
                            </ul>
                        </section>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <section class="widget widget-twitter-feed">
                            <h5 class="widget-title">Twitter Feed</h5>
                            <ul>
                                <li>
                                    <p>
                                        <a href="#">@Alex Smith</a>, unde omnis te us error sit voluptatem
                                    </p>
                                    <span class="time">
                                        <a href="#">10 Mins ago</a>
                                    </span>
                                </li>
                                <li>
                                    <p>
                                        <a href="#">@Justin Bieber</a>, unde omnis te us error sit voluptatem
                                    </p>
                                    <span class="time">
                                        <a href="#">12 Mins ago</a>
                                    </span>
                                </li>
                            </ul>
                        </section>
                        <!--// Single Widget -->

                        <!-- Single Widget -->
                        <section class="widget widget-contact-info">
                            <h5 class="widget-title">Contact Info</h5>
                            <ul>
                                <li>
                                    <p>256 Notrh Tower, Western City Mid Town, Las Vagas, USA</p>
                                </li>
                                <li>
                                    <p>
                                        <a href="callto://+00812568987789">+008 12568 987 789</a>
                                    </p>
                                    <p>
                                        <a href="callto://+00835687567458">+008 35687 567 458</a>
                                    </p>
                                </li>
                                <li>
                                    <p>
                                        <a href="mailto://info@korde.com">info@korde.com</a>
                                    </p>
                                    <p>
                                        <a href="mailto://info@korde.com">www.korde.com</a>
                                    </p>
                                </li>
                            </ul>
                        </section>
                        <!--// Single Widget -->

                    </div>
                </div>
            </div>
            <!--// Footer Widgets Area -->

            <!-- Footer Copyright Area -->
            <div class="footer-area__copyright bg--dark">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright text-center">
                                ©COPYRIGHT, ALL RIGHTS RESERVED BY
                                <a href="#">DBA Consultancy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--// Footer Copyright Area -->

        </footer>
        <!-- //Footer Area -->

    </div>
    <!-- //Main wrapper -->

    <!-- JS Files -->
    <script src="{{ asset('assets/websiteAssets/js/vendor/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/websiteAssets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/websiteAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/websiteAssets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/websiteAssets/js/active.js') }}"></script>
    <script src="{{ asset('assets/websiteAssets/js/scripts.js') }}"></script>
</body>


</html>
