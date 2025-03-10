{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
@extends('auth.UserPanel.Layouts.main')
@push('title')
<title>Reset Passoword | DBA Consultancy</title>
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
                    <form action="{{ route('updatePassword')}}" method="POST" id="loginformid">
                        @csrf
                        <div>
                            <h2 class="text-center fw-bold" style="color: #fa7823">Reset your Passoword</h2>
                            <p class="text-muted text-center">Mail : <span class="fw-bold text-black">{{$decrypedmail}}</span></p>
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label fs-5">New Password</label>
                            <input type="password" name="password" class="form-control rounded-5 p-3" id="phn" placeholder="Enter Password" required>
                              <input type="hidden" name="email" value="{{$decrypedmail}}">
                        </div>
                        <div class="mb-3">
                            <label for="phn" class="form-label fs-5">Confirm Password</label>
                            <input type="password" name="confirmpassword" class="form-control rounded-5 p-3" id="conpass" placeholder="Confirm Password" required>
                        </div>
                        <div class="mt-4">
                            <button style="background-color: #fa7823" class="btn p-3 w-100 fs-5 rounded-5 text-white" type="submit">Update Password</button>
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
    setTimeout(function() {
        $('#successAlert').fadeOut('slow');
    }, 2000);

    setTimeout(function() {
        $('#dangerAlert').fadeOut('slow');
    }, 2000);

</script>
@endsection
