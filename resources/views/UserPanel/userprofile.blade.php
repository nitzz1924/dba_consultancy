@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>User Profile | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid desktop-view">
        {{-- Header bar --}}
        <div class="row">
            <div class="profile-header">
                <div class="border border-2 border-white rounded-pill">
                    <img src="/assets/images/users/user-dummy-img.jpg" alt="Profile" width="150"
                        class="img-fluid rounded-pill m-1">
                </div>
                <div class="sectionHeading text-white mt-2">
                    User Name
                </div>
                <div class="text-white">
                    Designation
                </div>
            </div>
        </div>

        {{-- Profile Details --}}
        <div class="card mt-4 rounded-4">
            <div class="card-body">
                <ul class="list-group list-group-flush ">
                    <li class="list-group-item">
                        <div class="fw-bold text-danger">Name:</div>
                        <span class="ms-2">
                            User Name
                        </span>
                    </li>
                    <li class="list-group-item">
                        <div class="fw-bold text-danger">Email:</div>
                        <span class="ms-2">
                            user@dbaconsultancy.in
                        </span>
                    </li>
                    <li class="list-group-item">
                        <div class="fw-bold text-danger">Mobile:</div>
                        <span class="ms-2">
                            +91-XXXX-XXX-XXX
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <div class="fw-bold text-danger">Permanent Address:</div>
                        <span class="ms-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga nemo ducimus dolor est incidunt consequatur eligendi optio doloribus non vel.
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <div class="fw-bold text-danger">City:</div>
                        <span class="ms-2">
                            Ajmer
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <div class="fw-bold text-danger">State:</div>
                        <span class="ms-2">
                            Rajasthan
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <div class="fw-bold text-danger">PAN Card:</div>
                        <span class="ms-2">
                            PAN Card Number
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <div class="fw-bold text-danger">Aadhaar Card:</div>
                        <span class="ms-2">
                            Aadhaar Card Number
                        </span>
                    </li>
                    <li class="list-group-item ">
                        <div class="fw-bold text-danger">GST Number:</div>
                        <span class="ms-2">
                            GST Number
                        </span>
                    </li>
                    
                </ul>
                
                <div class="card-footer">
                    <a href="/editprofile" >
                        <button class="btn btn-outline-danger shadow rounded-pill w-100"  type="button">
                            Edit Profile
                        </button>
                    </a>
                </div>
            </div>
        </div>

    </div>
@endsection
