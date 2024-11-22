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
                <div class="ms-1 fs-5">
                    @if (Auth::guard('customer')->user())
                    Hello, {{ Auth::guard('customer')->user()->username }}
                    @else
                    Guest User
                    @endif
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
                Current Balance
                <div class="wallet-amount">
                    <i class='bx bx-rupee'></i>{{$walletamount}}
                </div>
            </div>
            <form action="{{ route('insertwallet') }}" method="post">
                @csrf
                <div class="text-white z-3 position-relative">
                    <input type="text" name="walletamount" id="walletamount" class="form-control rounded-4 "
                        placeholder="Enter Amount" required>
                    <input type="hidden" name="transactiontype" value="online">
                    <input type="hidden" name="paymenttype" value="credit">
                </div>
                <div class="wallet-actions mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-light rounded-pill fs-6 shadow-lg">
                            <div >
                                <i class='bx bx-plus bg-dark text-white p-2 rounded-pill me-1'></i>Deposit
                            </div>
                        </button>
                </div>
            </form>
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
