@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>My Orders | DBA Consultancy</title>
@endpush
@section('content')
<div class="container-fluid  p-4 desktop-view">
    <div class="row my-3">
        <div class="wallet-box">
            <div class="balance text-white text-center">
                <div class="d-flex flex-row justify-content-center align-items-center ">
                    <div class="col-md-3">
                        <div class="card mb-1 rounded-4">
                            <div class="card-body p-1">
                                <img src="{{ asset('assets/images/Services/clipboard.png')}}" alt="icon"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 px-3">
                        <div class="mt-2 text-start wallet-amount">My Orders</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- History --}}
    <div class="row my-3">
        <div class="d-flex justify-content-between align-content-center">
            <div class="sectionHeading">
                Orders List
            </div>
            {{-- <div>
                <a href="#" class="btn btn-outline-dark border-0 fs-6">See more</a>
            </div> --}}
        </div>
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Unpaid</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">In Process</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Completed</button>
            </li>
        </ul>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    setTimeout(function () {
        $('#successAlert').fadeOut('slow');
    }, 2000);

    setTimeout(function () {
        $('#dangerAlert').fadeOut('slow');
    }, 2000);
</script>
@endsection