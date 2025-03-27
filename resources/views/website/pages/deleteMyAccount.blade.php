@extends('website.layout.websitemain')
@section('title', 'Delete My Account | ' . config('app.name'))
@section('content')
<!-- Breadcrumb Area -->
<div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="cr-breadcrumb">
                    <ul class="cr-breadcrumb__pagination">
                        <li><a href="{{ route('homepage') }}">Home</a></li>
                        <li>Delete My Account</li>
                    </ul>
                    <h1>Delete My Account</h1>
                    <p>Fill the Details Below to delete your account</p>
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
                    <div class="col-lg-12 col-12">
                        <div class="pg-appintment">
                            <div class="pg-appintment__title">
                                <h2>Delete Your Account</h2>
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
                                                <input type="text" name="subject" id="subject" placeholder="Subject">
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
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
