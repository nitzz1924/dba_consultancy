{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
@extends('auth.UserPanel.Layouts.main')
@push('title')
<title>Login with Password | DBA Consultancy</title>
@endpush
@section('main-section')
<div class="auth-page-content overflow-hidden pt-lg-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card overflow-hidden rounded-5">
                    <div class="row g-0">
                        {{-- <div class="col-lg-6">
                            <div class="p-4  h-100">
                                <div class="p-3 rounded-5 m-3 border-0 card auth-one-bg">
                                    <div class="p-3 mt-3">
                                        <h1 class="text-white fs-1">Simplify eFiling With DBA Consultancy</h1>
                                        <p class="text-white">Complete your paperwork instantly and effectively with
                                            ease of online portal by DBA Consultancy.</p>
                                    </div>
                                    <hr class="text-white">
                                    <div class="p-3 m-3">
                                        <img class="img-fluid"
                                            src="{{ asset('assets/images/user-illustarator-1.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- end col -->

        <div class="col-lg-12 align-content-center">
            <div class="p-lg-5 p-4">
                 @if ($mymess = Session::get('success'))
                    <div class="alert border-0 alert-success text-center" role="alert" id="successAlert">
                        <strong>{{ $mymess }}</strong>
                    </div>
                @endif
                @if ($mymess = Session::get('error'))
                    <div class="alert border-0 alert-danger text-center" role="alert" id="dangerAlert">
                        <strong>{{ $mymess }}</strong>
                    </div>
                @endif
                <div class="mt-4">
                    <form action="{{ route('loginwithpassword') }}" method="POST" id="loginformid">
                        <div>
                            <h2 class="text-center fw-bold" style="color: #fa7823">Welcome Back !</h2>
                            <p class="text-muted text-center">Sign in with Password</p>
                        </div>
                        @csrf
                        <div class="mb-3">
                            <label for="emailid" class="form-label fs-5">Email</label>
                            <input type="email" name="email" class="form-control rounded-5 p-3" id="emailid" placeholder="Enter Your Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label fs-5">Password</label>
                            <input type="password" name="password" class="form-control rounded-5 p-3" id="phn" placeholder="Enter Password" required>
                        </div>
                         <div class="mt-4">
                            <button style="background-color: #fa7823" class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Sign
                                In</button>
                        </div>
                        <div class="text-center mt-3">
                            <p class="mb-0">Forgot your password?
                                <a href="" data-bs-toggle="modal" data-bs-target="#myModal" class="fw-semibold text-decoration-underline" style="color: #fa7823">Reset Password</a>
                            </p>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="mb-0">Don't have an account ?
                                <a href={{ route('registration') }} class="fw-semibold text-decoration-underline" style="color: #fa7823">Signup</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body rounded-5">
                <p class="text-center text-dark fs-5" id="mailmessage"></p>
                <form action="#" method="POST" id="emailform">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Enter Your Registered Email Address</label>
                        <input type="email" class="form-control rounded-5 p-3" id="emailfield" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mt-3">
                        <button style="background-color: #fa7823" class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Send Verification Mail</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 2000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 2000);

</script>
<script>
    jQuery('#emailform').submit(function(b) {
        b.preventDefault();
        const email = $('#emailfield').val();

        $.ajax({
            url: "{{ route('email.sendMail') }}"
            , method: 'POST'
            , data: {
                _token: $('meta[name="csrf-token"]').attr('content')
                , email: email
            }
            , success: function(response) {
                console.log(response);
                if (response.success == true) {
                    $('#mailmessage').text(response.message + " " + response.toEmail);
                } else {
                    $('#mailmessage').html(`<p class="text-center text-danger fs-5" id="mailmessage">` + response.message + `</p>`);
                    setTimeout(function() {
                        $('#mailmessage').fadeOut('slow');
                    }, 3000);
                }
            }
        });
    });

</script>
@endsection
