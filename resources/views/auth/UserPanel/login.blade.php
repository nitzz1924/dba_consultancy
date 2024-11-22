{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
@extends('auth.UserPanel.Layouts.main')
@push('title')
    <title>Login | DBA Consultancy</title>
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
                                    <form action="#" method="POST" id="loginformid">
                                        <div>
                                            <h2 class="text-center fw-bold" style="color: #fa7823">Welcome Back !</h2>
                                            <p class="text-muted text-center">Sign in to continue</p>
                                        </div>
                                        @csrf
                                        <p id="demomobile" class="text-center fs-4">Demo Mobile No. : <strong>1234567890</strong></p>
                                        <div class="mb-3">
                                            <label for="username" class="form-label fs-5">Phone Number</label>
                                            <input type="text" name="mobilenumber" class="form-control rounded-5 p-3"
                                                id="username" placeholder="Enter Phone Number" required>
                                        </div>
                                        <div class="mt-4">
                                            <button style="background-color: #fa7823"
                                                class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Sign
                                                In</button>
                                        </div>
                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Don't have an account ?
                                                <a href={{ route('registration') }}
                                                    class="fw-semibold text-decoration-underline"
                                                    style="color: #fa7823">Signup</a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                                <form autocomplete="off" action="{{ route('LoginOtpVerify') }}" id="signinotp"
                                    method="POST" style="display: none;">
                                    @csrf
                                    <div class="text-muted text-center mb-4 mx-lg-3">
                                        <h2 class="text-center fw-bold" style="color: #fa7823">Verify Yourself</h2>
                                        <p>Please enter the 6 digit code sent to <span
                                                class="fw-semibold">example@abc.com</span></p>
                                    </div>
                                    <div class="row">
                                        @for ($i = 1; $i <= 6; $i++) <div class="col-2">
                                            <input type="text"
                                                class="form-control form-control-lg bg-light border-light text-center  otp-input"
                                                maxlength="1" pattern="[0-9]" name="otptest{{ $i }}"
                                                title="Please enter a number." required>
                                    </div>
                                    @endfor
                                    <div class="text-center fs-3 text-bold mt-3" id="otpinput"></div>
                                    <input type="hidden" name="registerid" value="" id="registerid">
                            </div>
                            <div class="mt-3">
                                <button style="background-color: #fa7823"
                                    class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Confirm</button>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    //OTP Form Functionality
        jQuery('#loginformid').submit(function(e) {
            e.preventDefault();
            var data = jQuery('#loginformid').serialize();
            jQuery.ajax({
                url: "{{ url('signup_user_otp') }}",
                data: data,
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    if (data.msg == 'success') {
                        jQuery('#loginformid').hide();
                        jQuery('#signinotp').show();
                        jQuery('#registerid').val(data.data.id);
                        $('#otpinput').text("OTP is : " + data.data.otp);
                    }
                }
            })
        });
</script>
<script>
    setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 2000);

        setTimeout(function() {
            $('#dangerAlert').fadeOut('slow');
        }, 2000);
</script>
<script>
    //Move to Next Input Functionality
    document.addEventListener('DOMContentLoaded', function () {
        const inputs = document.querySelectorAll('.otp-input');

        inputs.forEach((input, index) => {
            input.addEventListener('input', function () {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus(); // Move to the next input
                }
            });

            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    inputs[index - 1].focus(); // Move to the previous input on backspace
                }
            });
        });
    });
</script>
@endsection
