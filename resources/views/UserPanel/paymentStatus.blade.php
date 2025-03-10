@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Payment Status | DBA Consultancy</title>
@endpush
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center h-100">
        @if($paymentData['status'] != 'PAYMENT_ERROR')
        <div class="col-md-4">
            <div class="card border-white text-center shadow-lg bg-success">
                <div class="card-body">
                    <h3 class="text-white">Payment Success 🎉 </h3>
                    <h6 class="text-white">Thank you! Your transaction was completed successfully.</h6>
                    <h6 class="text-white"><strong>Transaction ID:</strong> {{ $paymentData['transaction_id'] }}</h6>
                    <h6 class="text-white"><strong>Merchant Order ID:</strong> {{ $paymentData['merchantOrderId'] }}</h6>
                </div>
                <div class="card-footer">
                    <a href="{{ route('home')}}">
                        <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                            <i class='bx bx-home bg-danger text-white p-2 rounded-pill me-1'></i>Go to Home
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @elseif($paymentData['status'] != 'PAYMENT_SUCCESS')
        <div class="col-md-4">
            <div class="card border-white text-center shadow-lg bg-danger">
                <div class="card-body">
                    <h3 class="text-white">Payment Failed ❌ </h3>
                    <h6 class="text-white">There was an error processing your payment. Please contact support.</h6>
                    <h6 class="text-white"><strong>Transaction ID:</strong> {{ $paymentData['transaction_id'] }}</h6>
                    <h6 class="text-white"><strong>Merchant Order ID:</strong> {{ $paymentData['merchantOrderId'] }}</h6>
                </div>
                <div class="card-footer">
                    <a href="{{ route('home')}}">
                        <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                            <i class='bx bx-home bg-danger text-white p-2 rounded-pill me-1'></i>Go to Home
                        </div>
                    </a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
