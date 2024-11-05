@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Home | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid">
        {{-- Header bar --}}
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="p-2 rounded-pill bg-danger">
                        <i class='bx bx-user fs-5 text-white'></i>
                    </div>
                    <div class="ms-1 fs-4">
                        Hello, User
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex justify-content-end">
                    <div class="p-2">
                        <i class='bx bx-bell fs-2 text-danger'></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wallet box --}}
        <div class="row my-3">
            <div class="wallet-box">
                <div class="balance text-white">
                    Balance
                    <div class="wallet-amount">
                        <i class='bx bx-rupee'></i>20,000
                    </div>
                </div>
                <div class="wallet-actions mt-3 d-flex justify-content-around">
                    <a href="#">
                        <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                            <i class='bx bx-minus bg-dark text-white p-2 rounded-pill me-1'></i>Withdraw
                        </div>
                    </a>
                    <a href="#">
                        <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                            <i class='bx bx-plus bg-dark text-white p-2 rounded-pill me-1'></i>Deposit
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Services --}}
        <div class="row my-3">
            <div class="d-flex justify-content-between align-content-center">
                <div class="sectionHeading">
                    Legal Services
                </div>
                <div>
                    <a href="#" class="btn btn-outline-dark border-0 fs-6">See more</a>
                </div>
            </div>

            <div class="col-3 p-3">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <div class="bg-dark rounded-pill py-2 px-3 ">
                        <img src="{{ asset('assets/images/GST SVG 1.png') }}" alt="icon">
                    </div>
                    <div class="mt-2 text-center">GST</div>
                </div>
            </div>
            <div class="col-3 p-3">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <div class="bg-dark rounded-pill py-2 px-3 ">
                        <img src="{{ asset('assets/images/GST SVG 1.png') }}" alt="icon">
                    </div>
                    <div class="mt-2 text-center">Company
                        Registration</div>
                </div>
            </div>
            <div class="col-3 p-3">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <div class="bg-dark rounded-pill py-2 px-3 ">
                        <img src="{{ asset('assets/images/GST SVG 1.png') }}" alt="icon">
                    </div>
                    <div class="mt-2 text-center">File
                        Tax Return</div>
                </div>
            </div>
            <div class="col-3 p-3">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <div class="bg-dark rounded-pill py-2 px-3 ">
                        <img src="{{ asset('assets/images/GST SVG 1.png') }}" alt="icon">
                    </div>
                    <div class="mt-2 text-center">Business
                        Pan Card</div>
                </div>
            </div>
        </div>

        {{-- Consulting --}}
        <div class="row my-3">
            <div class="d-flex justify-content-between align-content-center">
                <div class="sectionHeading">
                    Consulting
                </div>
            </div>

            <div class="legal-box d-flex align-items-center">
                <div class="me-2">
                    <img src="{{ asset('assets/images/Layer 1.png') }}" alt="legal-icon">
                </div>
                <div class="fs-4 text-white">
                    Legal Consulting
                    <div class="legal-amount">
                        <i class='bx bx-rupee'></i>500
                    </div>
                </div>
            </div>
        </div>

        {{-- Refer --}}
        <div class="row my-4">
            <div class="shadow-lg rounded-4 p-0 d-flex align-items-center">
                <div class="me-2 ">
                    <img class="rounded-4" src="{{ asset('assets/images/refer-bg.png') }}" alt="legal-icon">
                </div>
                <div class="fs-4">
                    Refer a friend
                    <div class="fs-5">
                        <span class="incentive">10%</span> Lifetime Commission
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
