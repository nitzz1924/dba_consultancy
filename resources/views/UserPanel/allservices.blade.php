@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Legal Services | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid desktop-view">
        {{-- Header bar --}}
        <div class="row mt-3">
            <div class="col-6">
                <div class="sectionHeading">
                    Legal Services
                </div>
            </div>

            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="/home">
                    <div class="btn btn-outline-dark border-0 rounded-pill">
                        <i class='bx bx-chevron-left fs-1'></i>
                    </div>
                </a>
            </div>
        </div>

        {{-- All services --}}
        <div class="row">
            <div class="col-3 p-3">
                <a href="/servicedetail" class="serviceCard">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <div class="card mb-1 rounded-4">
                            <div class="card-body p-1">
                                <img src="{{ asset('assets/images/icons/gst.jpg') }}" alt="icon" class="img-fluid">
                            </div>
                        </div>
                        <div class="mt-2 text-center service-name">GST</div>
                    </div>
                </a>
            </div>
            <div class="col-3 p-3">
                <a href="/servicedetail" class="serviceCard">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <div class="card mb-1 rounded-4">
                            <div class="card-body p-1">
                                <img src="{{ asset('assets/images/icons/registration.jpg') }}" alt="icon"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="mt-2 text-center service-name">Company Registration</div>
                    </div>
                </a>
            </div>
            <div class="col-3 p-3">
                <a href="/servicedetail" class="serviceCard">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <div class="card mb-1 rounded-4">
                            <div class="card-body p-1">
                                <img src="{{ asset('assets/images/icons/tax-return.jpg') }}" alt="icon"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="mt-2 text-center service-name">File Tax Return</div>
                    </div>
                </a>
            </div>
            <div class="col-3 p-3">
                <a href="/servicedetail" class="serviceCard">
                    <div class="d-flex flex-column justify-content-center align-items-center ">
                        <div class="card mb-1 rounded-4">
                            <div class="card-body p-1">
                                <img src="{{ asset('assets/images/icons/pcard.jpg') }}" alt="icon" class="img-fluid">
                            </div>
                        </div>
                        <div class="mt-2 text-center service-name">Business Pan Card</div>
                    </div>
                </a>
            </div>
        </div>
    </div>


    {{-- JavaScript for Image Preview --}}
    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
