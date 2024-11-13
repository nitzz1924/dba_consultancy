@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Wallet | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid  p-4 desktop-view">
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
                    Wallet
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

        {{-- History --}}
        <div class="row my-3">
            <div class="d-flex justify-content-between align-content-center">
                <div class="sectionHeading">
                    Transaction History
                </div>
                <div>
                    <a href="#" class="btn btn-outline-dark border-0 fs-6">See more</a>
                </div>
            </div>

            <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <div class="me-2">
                        <i class='bx bx-minus-circle text-danger fs-1'></i>
                    </div>
                    <div class="fs-5">
                        Legal Consulting
                        <div class="">
                            <div class="text-muted fs-6">
                                10 Oct 2024
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fs-3 text-danger fw-bold">
                        <i class='bx bx-rupee'></i>500
                    </div>
                </div>
            </div>

            <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <div class="me-2">
                        <i class='bx bx-plus-circle text-success fs-1'></i>
                    </div>
                    <div class="fs-5">
                        Referral Commission
                        <div class="">
                            <div class="text-muted fs-6">
                                10 Oct 2024
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fs-3 text-success fw-bold">
                        <i class='bx bx-rupee'></i>750
                    </div>
                </div>
            </div>

            <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <div class="me-2">
                        <i class='bx bx-minus-circle text-danger fs-1'></i>
                    </div>
                    <div class="fs-5">
                        Justice Firm
                        <div class="">
                            <div class="text-muted fs-6">
                                10 Oct 2024
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="fs-3 text-danger fw-bold">
                        <i class='bx bx-rupee'></i>450
                    </div>
                </div>
            </div>


        </div>



    </div>
@endsection
