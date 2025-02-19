@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Home | DBA Consultancy</title>
@endpush
@section('content')
<div class="container-fluid p-4 desktop-view">
    {{-- Header bar --}}
    <div class="row">
        <div class="col-8">
            <div class="d-flex justify-content-start align-items-center">
                {{-- <a href="/userprofile">
                        @if (Auth::guard('customer')->user() && !is_null(Auth::guard('customer')->user()->profileimage))
                            <div class="border rounded-pill border-danger">
                                <img src="{{ asset('/assets/images/userprofile/' . Auth::guard('customer')->user()->profileimage) }}"
                class="img-fluid" alt="userprofile" width="25">
            </div>
            @else
            <div class="p-2 rounded-pill bg-danger">
                <i class='bx bx-user fs-5 text-white'></i>
            </div>
            @endif
            </a> --}}
            <div class="ms-1 fs-5">
                @if (Auth::guard('customer')->user())
                Welcome, {{ Auth::guard('customer')->user()->username }}
                @else
                Guest User
                @endif
            </div>
        </div>
    </div>
    <div class="col-4">
        <a href="#">
            <div class="d-flex justify-content-end">
                <div class="p-2">
                    {{-- <i class='bx bx-bell fs-2 text-danger'></i> --}}
                </div>
            </div>
        </a>
    </div>
</div>

{{-- Wallet box --}}
<div class="row my-3">
    <div class="wallet-box">
        <div class="balance text-white">
            Current Balance
            <div class="wallet-amount">
                <i class='bx bx-rupee'></i>{{ number_format($walletamount, 2) }}
            </div>
        </div>

        <div class="wallet-actions mt-3 d-flex justify-content-around">
            <a href="{{ route('wallet')}}">
                <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                    <i class='bx bx-plus bg-success text-white p-2 rounded-pill me-1'></i>Deposit
                </div>
            </a>
            <a href="{{ route('withdraw')}}">
                <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                    <i class='bx bx-minus bg-danger text-white p-2 rounded-pill me-1'></i>Withdraw
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
            <a href="/allservices" class="btn btn-outline-dark border-0 fs-6">See more</a>
        </div>
    </div>

    <div class="row">
        @foreach ($services->take(4) as $row)
        <div class="col-3 p-3">
            <a href="/servicedetail/{{ $row->id }}" class="serviceCard">
                <div class="d-flex flex-column justify-content-center align-items-center ">
                    <div class="card mb-1 rounded-4">
                        <div class="card-body p-1">
                            <img src="{{ asset('assets/images/Services/' . $row->iconimage) }}" alt="icon" class="img-fluid">
                        </div>
                    </div>
                    <div class="mt-2 text-center service-name">{{ $row->label }}</div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

{{-- Consulting --}}
<div class="row my-3">
    <div class="d-flex justify-content-between align-content-center">
        <div class="sectionHeading">
            Consulting
        </div>
    </div>
    @foreach ($consulting as $row)
    <div class="legal-box d-flex align-items-center justify-content-around">
        <div class="me-2">
            <img src="{{ asset('assets/images/Services/' . $row->iconimage) }}" alt="legal-icon">
        </div>
        <div class="fs-4 text-white">
            {{ $row->label }}
            <div class="legal-amount">
                <i class='bx bx-rupee'></i>{{ $row->price }}
            </div>
        </div>
        <div class="p-3">
            <a href="/consultingdetails/{{ $row->id }}" class="btn btn-outline-light border-0 fs-1 p-1">
                <i class='bx bxs-chevron-right bx-fade-right'></i>
            </a>
        </div>
    </div>
    @endforeach
</div>

{{-- Refer --}}
<div class="row my-4">
    <a href="{{ route('refer') }}" class="px-0">
        <div class="shadow-lg rounded-4 p-0 d-flex align-items-center">
            <div class="me-2 ">
                <img class="rounded-4" src="{{ asset('assets/images/refer-bg.png') }}" alt="legal-icon">
            </div>
            <div class="fs-4 fw-bold text-black">
                Refer a friend
                <div class="fs-5 fw-normal">
                    <span class="incentive">10%</span> Lifetime Commission
                </div>
            </div>
        </div>
    </a>
</div>

@endsection
