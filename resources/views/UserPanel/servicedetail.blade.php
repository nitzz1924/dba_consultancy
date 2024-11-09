@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Service Detail | DBA Consultancy</title>
@endpush
@section('content')
<div class="container-fluid desktop-view">
    {{-- Header bar --}}
    <div class="row" style="
                background-image: url('{{asset('assets/images/Services/'.$data->coverimage)}}');
                background-size: cover;
                background-position: bottom;
                height: 250px;
                padding: 15px;
                display: flex;
                /* align-items: center; */
            ">
        <div class="col-8">
            <div class="d-flex justify-content-start align-items-center">
                <div class="ms-1 fs-4 text-white">
                    Services View Section
                </div>
            </div>
        </div>
        <div class="col-4">
            <a href="/home">
                <div class="d-flex justify-content-end">
                    <div class="p-2">
                        <i class='bx bx-arrow-back fs-3 text-white'></i>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <div class="row mt-n5 ">
        <div class="serviceHeading mb-3">
            {{$data->servicename}}
        </div>
        <div class="col-6 text-start align-items-center">
            <div class="fs-3 fw-bold">
                ₹ {{$data->price}}/-
            </div>
        </div>
        <div class="col-6 text-center">
            <a href="#">
                <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                    <i class='bx bx-plus icon-bg text-white p-2 rounded-pill me-1'></i>Buy Now
                </div>
            </a>
        </div>
    </div>

    {{-- content --}}
    <div class="row">
        <div class="sectionHeading">
            About service
        </div>
        <p>
            {{$data->details}}
        </p>
    </div>
</div>
@endsection
