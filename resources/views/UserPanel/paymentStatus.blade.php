@extends('layouts.UserPanelLayouts.usermain')

@push('title')
<title>Payment Status | DBA Consultancy</title>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center h-100">
        @if(isset($paymentData))
            <div>
                <h3>Payment Status: {{ $paymentData['status'] }}</h3>
                <p><strong>Transaction ID:</strong> {{ $paymentData['transaction_id'] }}</p>
                <p><strong>Merchant Order ID:</strong> {{ $paymentData['merchantOrderId'] }}</p>
            </div>
        @else
            <p>No payment status data available.</p>
        @endif
    </div>
</div>
@endsection
