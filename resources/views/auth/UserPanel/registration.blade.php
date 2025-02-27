{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏--------------------------- --}}
@extends('auth.UserPanel.Layouts.main')
@push('title')
<title>Registration | DBA Consultancy</title>
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
                <div class="mt-4">
                    <form action="{{ route('registeruser') }}" method="POST" id="registerform">
                        @csrf
                        <div>
                            <h2 class="text-center fw-bold" style="color: #fa7823">Register here !</h2>
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
                            <p class="text-muted text-center">Fill Up Details to continue</p>
                            <div class="text-center" id="error-message" style="display: none; color: red; margin-bottom: 10px;"></div>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label fs-5">Full Name</label>
                            <input type="text" name="username" class="form-control rounded-5 p-3" id="username" placeholder="Enter Full Name" required>
                        </div>
                        <div class="mb-3">
                            <label for="emailid" class="form-label fs-5">Email</label>
                            <input type="email" name="email" class="form-control rounded-5 p-3" id="emailid" placeholder="Enter Your Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label fs-5">Phone Number</label>
                            <input type="text" name="mobilenumber" class="form-control rounded-5 p-3" id="phn" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label fs-5">Password</label>
                            <input type="password" name="password" class="form-control rounded-5 p-3" placeholder="Enter Password" required>
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label fs-5">Refer Code</label>
                            <input type="text" name="parentreferid" class="form-control rounded-5 p-3"  placeholder="Enter Refer Code">
                        </div>
                        <div class="mt-4">
                            <button style="background-color: #fa7823" class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Register</button>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="mb-0">Already have an account ?
                                <a href="{{ route('userloginpage')}}" class="fw-semibold text-decoration-underline" style="color: #fa7823">Sign
                                    In</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="p-2 mt-4">
                    <form autocomplete="off" action="{{ route('verifyotp') }}" id="loginformotp" method="POST" style="display: none;">
                        @csrf
                        <div id="otp" class="text-black fw-bold"></div>
                        <div class="text-muted text-center mb-4 mx-lg-3">
                            <h2 class="text-center fw-bold" style="color: #fa7823">Verify Yourself</h2>
                            <p>Please enter the 6 digit code sent to <span class="fw-semibold" id="dynamicnumber"></span></p>
                        </div>
                        <div class="row">
                            @for ($i = 1; $i <= 6; $i++) <div class="col-2">
                                <input type="number" class="form-control py-2 px-0 form-control-lg bg-light border-light text-center otp-input" maxlength="1" pattern="[0-9]" name="otptest{{ $i }}" title="Please enter a number." required>
                        </div>
                        @endfor
                        </div>
                        <input type="hidden" name="registerid" value="" id="registerid">
                        <div class="mt-3">
                            <button style="background-color: #fa7823" class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Confirm</button>
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
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // OTP Form Functionality
    jQuery('#registerform').submit(function (e) {
        e.preventDefault();
        
        var phoneNumber = $('#phn').val();
        var phonePattern = /^[0-9]{10}$/;

        if (!phonePattern.test(phoneNumber)) {
            Toastify({
                text: "Please enter a valid 10-digit phone number.",
                gravity: "top",
                position: "center",
                style: {
                    background: "#fa7823",
                    color: "#ffffff",
                    whiteSpace: "nowrap",
                    borderRadius: "10px",
                    textAlign: "center"
                },
                duration: 3000
            }).showToast();
            return false;
        }

        var data = jQuery('#registerform').serialize();
        
        jQuery.ajax({
            url: "{{ url('proceedtootp') }}",
            type: 'POST',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log(response);
                if (response.msg === "success") {
                    jQuery('#registerform').hide();
                    jQuery('#loginformotp').show();
                    jQuery('#registerid').val(response.data.id);
                    $('#dynamicnumber').html("+91-" + response.data.mobilenumber);
                    $('#otp').html(response.data.otp);
                } else if (response.status === "error") {
                    Toastify({
                        text: response.message,
                        gravity: "top",
                        position: "center",
                        style: {
                            background: "red",
                            color: "#ffffff",
                            whiteSpace: "nowrap",
                            borderRadius: "10px",
                            textAlign: "center"
                        },
                        duration: 3000
                    }).showToast();
                }
            },
            error: function () {
                Toastify({
                    text: "Something went wrong. Please try again.",
                    gravity: "top",
                    position: "center",
                    style: {
                        background: "#fa7823",
                        color: "#ffffff",
                        whiteSpace: "nowrap",
                        borderRadius: "10px",
                        textAlign: "center"
                    },
                    duration: 3000
                }).showToast();
            }
        });
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
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('.otp-input');

        inputs.forEach((input, index) => {
            input.addEventListener('input', function() {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus(); // Move to the next input
                }
            });

            input.addEventListener('keydown', function(e) {
                if (e.key === 'Backspace' && input.value.length === 0 && index > 0) {
                    inputs[index - 1].focus(); // Move to the previous input on backspace
                }
            });
        });
    });

</script>
@endsection
