@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>All Refers | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid  p-4 desktop-view">
        {{-- Header bar --}}
        <div class="row">
            <div class="col-6">
                <div class="d-flex justify-content-start align-items-center">
                    {{-- <div class="p-2 rounded-pill bg-danger">
                    <i class='bx bx-user fs-5 text-white'></i>
                </div> --}}
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
                        {{-- <i class='bx bx-bell fs-2 text-danger'></i> --}}
                    </div>
                </div>
            </div>
        </div>

        {{-- Wallet box --}}
        <div class="row my-3">
            <div class="wallet-box">
                <div class="balance text-white text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center ">
                        <div class="col-md-3">
                            <div class="card mb-1 rounded-4">
                                <div class="card-body p-1">
                                    <img src="{{ asset('assets/images/exchanging.png') }}" alt="icon" class="img-fluid"
                                        width="75">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 px-3">
                            <div class="mt-2 text-start wallet-amount">All Refers</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- History --}}
        <div class="row my-3">
            <div class="d-flex justify-content-between align-content-center">
                <div class="sectionHeading">
                    Refered Users
                </div>
            </div>

            @foreach ($list as $key => $value)
                <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <i class='bx bx-reply text-danger fs-1'></i>
                        </div>
                        <div class="fs-5">
                            {{ $value->username }}
                            <div class="">
                                <div class="text-muted fs-6">
                                    {{ $value->created_at->format('d/m/y') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="fs-3 text-danger fw-bold">
                            ({{ $value->referral_count }})
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
