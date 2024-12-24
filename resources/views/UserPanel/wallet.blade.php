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
                    <i class='bx bx-rupee'></i>{{ $walletamount }}
                </div>
            </div>
            <form id="walletform">
                <div class="text-white z-3 position-relative">
                    <input type="text" name="walletamount" id="walletamount" class="form-control rounded-4 "
                        placeholder="Enter Amount" required>
                    <input type="hidden" name="transactiontype" value="online">
                    <input type="hidden" name="paymenttype" value="credit">
                </div>
                <div class="wallet-actions mt-3 d-flex justify-content-center">
                    <button type="submit" id="rzp-button1" class="btn btn-light rounded-pill fs-6 shadow-lg">
                        <div>
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
        @foreach ($debithistory->take(10) as $row)
            @if ($row->paymenttype == 'debit')
                <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <i class='bx bx-minus-circle text-danger fs-1'></i>
                        </div>
                        <div class="fs-5">
                            {{$row->servicename}}
                            <div class="">
                                <div class="text-muted fs-6">
                                    {{ $row->created_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="fs-3  text-danger fw-bold">
                            <i class='bx bx-rupee'></i>{{ $row->amount }}<sub class="text-danger fs-6">&nbsp;&nbsp;<span
                                    class="badge bg-danger">Debit</span></sub>
                        </div>
                    </div>
                </div>
            @else
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
                            <i class='bx bx-rupee'></i>750<sub class="text-success fs-6">&nbsp;&nbsp;<span
                                    class="badge bg-success">Credit</span></sub>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
<!-- RazorPay Checkout JS -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('submit', '#walletform', function (w) {
            w.preventDefault();
            var amount = $('#walletamount').val();
            if (!amount || isNaN(amount) || amount <= 0) {
                alert('Please enter a valid amount.');
                return;
            }
            $.ajax({
                url: "/razorpay/payment",
                type: "POST",
                data: {
                    walletamount: amount,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    console.log('Order created:', response);
                    try {
                        var options = {
                            "key": "{{ env('RAZORPAY_KEY') }}",
                            "amount": response.amount,
                            "currency": "INR",
                            "name": "DBA Consultancy",
                            "description": "Test Transaction",
                            'handler': function (response) {
                                var paymentId = response.razorpay_payment_id;
                                alert('Payment Successful: ' + paymentId);
                            },
                            "image": "{{asset('assets/images/razorpaylogo.png')}}",
                            "order_id": response.id,
                            "prefill": {
                                "name": "dummy name",
                                "email": "dummyu@example.com",
                                "contact": "9000090000"
                            },
                            "notes": {
                                "address": "Razorpay Corporate Office"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        $('#rzp-button1').on('click', function (e) {
                            rzp1.open();
                            e.preventDefault();
                        });
                    } catch (error) {
                        console.error('Error initializing Razorpay:', error);
                        alert('Failed to initialize payment gateway. Please try again later.');
                    }
                }
            });
        });
    });

</script>
@endsection