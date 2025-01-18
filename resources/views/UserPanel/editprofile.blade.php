@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Edit Profile | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid desktop-view">
        {{-- Header bar --}}
        <div class="row mt-3">
            <div class="col-6 d-flex justify-content-start align-items-center">
                <div class="sectionHeading mb-0">
                    Edit Profile
                </div>
            </div>

            <div class="col-6 d-flex justify-content-end align-items-center">
                <a href="/userprofile">
                    <div class="btn btn-outline-dark border-0 rounded-pill">
                        <i class='bx bx-chevron-left fs-1'></i>
                    </div>
                </a>
            </div>
        </div>

        {{-- Profile Details --}}
        <div class="card mt-4 rounded-4">
            <div class="card-body">
                <form method="post" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
                    @csrf
                    {{-- Image Preview --}}
                    <div class="text-center mb-3">
                        <img id="imagePreview" src="{{ asset('/assets/images/user-dummy-pic.png') }}"
                            alt="Profile Image Preview" class="border"
                            style="display: block; width: 150px; height: 150px; border-radius: 50%; object-fit: cover; margin-inline: auto;">
                    </div>
                    <div class="mb-3 text-center">
                        <label for="formFileLg" class="form-label">Select Profile Image</label>
                        <input class="form-control form-control-lg" name="profileimage" id="formFileLg" type="file"
                            accept="image/*" onchange="previewImage(event)">
                    </div>

                    <hr>
                    <div class="form-floating mb-3 ">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username">
                        <label for="username">Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="user@dbaconsultancy.in">
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="mobilenumber" name="mobilenumber"
                            placeholder="Enter Your Mobile">
                        <label for="mobilenumber">Mobile</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Enter your address" id="permaddress" name="permaddress"
                            style="height: 100px"></textarea>
                        <label for="permaddress">Permanent Address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city">
                        <label for="city">City</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="state" name="state" placeholder="Enter Your State">
                        <label for="state">State</label>
                    </div>
                    <hr>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="pancard" name="pancard"
                            placeholder="Enter Your PAN Card Number">
                        <label for="pancard">PAN Card Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="aadharcard" name="aadharcard"
                            placeholder="Aadhaar Card Number">
                        <label for="aadharcard">Aadhaar Card Number</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="gstnum" name="gstnum" placeholder="GST Number">
                        <label for="GST">GST Number</label>
                    </div>

                    <button type="submit" class="btn btn-success shadow rounded-pill w-100">Submit</button>
                </form>


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
