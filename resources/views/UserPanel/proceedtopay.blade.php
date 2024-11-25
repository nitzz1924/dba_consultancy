@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Proceed to Pay | DBA Consultancy</title>
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
                                <img src="{{ asset('assets/images/atm-card.png') }}" alt="icon"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 px-3">
                        <div class="fs-3 text-start wallet-amount">
                            Proceed to Pay
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="rounded-4" style="background-color: #ffffff;">
            <div class="p-3">
                <div class="fs-4 fw-bold text-center">ORDER SUMMARY</div>
                @php
                    $servicesum = intval($purchasedata->servicecharge) - intval($purchasedata->discount);
                @endphp
                @if ($walletamount < $servicesum)
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                    Toastify({
                    text: "Insufficient Balance !, Please Recharge",
                    gravity: "top",
                    position: "center",
                    style: {
                    background: "#dc3545",
                    color: "#ffffff",
                    },
                    duration: 5000
                    }).showToast();
                    });
                    </script>
                    <div class="p-3">
                        <!-- Danger Alert -->
                        <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                            <div>
                                <i class="ri-error-warning-line  fs-4 me-1 fw-bold align-middle"></i>
                                <span class="fs-4 fw-bold">
                                    Insufficient balance.
                                </span>

                                <div class="text-dark">
                                    You can proceed and pay later.
                                </div>
                            </div>
                            <div class="mt-2">
                                <a href="/wallet" class="text-white fw-bold  btn btn-danger rounded-4">
                                    Recharge Now
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Wallet Balance
                            </div>
                            <div class="p-1">
                                ₹ {{ $walletamount }}/-
                            </div>
                        </div>
                        <hr>
                        <div class="fw-bold text-center">Service</div>
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                {{ $purchasedata->servicename }}
                            </div>
                            <div class="p-1">
                                ₹ {{ $purchasedata->servicecharge }}/-
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Discount
                            </div>
                            <div class="p-1">
                                - ₹ {{ $purchasedata->discount }}/-
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="pb-2">
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Grand Total
                            </div>
                            <div class="p-1">
                                <div class="fw-bold">₹ {{ $servicesum }}/-</div>
                            </div>
                        </div>
                    </div>

            </div>
            <div class="row my-3">
                <div class="">
                    <div class="wallet-actions mt-3 d-flex justify-content-around">
                        @if ($walletamount > $servicesum && $purchasedata->status=='Unpaid')
                        <form action="{{ route('paynow') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success rounded-pill fs-6 shadow-lg">
                                <div class="">
                                    <i class='bx bx-plus bg-light text-black p-2 rounded-pill me-1'></i>Pay Now
                                </div>
                            </button>
                            <input type="hidden" name="paymenttype" value="debit">
                            <input type="hidden" name="transactiontype" value="serviceorder">
                            <input type="hidden" name="amount" value="{{ $servicesum }}">
                            <input type="hidden" name="serviceid" value="{{ $purchasedata->serviceid }}">
                            <input type="hidden" name="orderid" value="{{ $purchasedata->id }}">
                        </form>
                        @elseif($purchasedata->status=='Processing')
                            <div class="d-flex flex-column justify-content-center">
                                <p class="text-success fw-bold text-center fs-5">Your Order is already Paid. Changes are Submitted.</p>
                                <a href="/orderpage" class=" text-center">
                                    <div class="btn btn-light">
                                        <i class="ri-arrow-left-fill fs-4 text-black align-middle me-1"></i>My Orders
                                    </div>
                                </a>
                            </div>
                        @else
                        <a href="/wallet">
                            <div class="btn btn-info rounded-pill fs-6 shadow-lg">
                                <i class='bx bx-plus bg-light text-black p-2 rounded-pill me-1'></i>Recharge Wallet
                            </div>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
