@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Wallet | DBA Consultancy</title>
@endpush
@section('content')
<div class="container-fluid  p-4 desktop-view">
    {{-- Header bar --}}
    <div class="row">
        <div class="col-10">
            <div class="d-flex justify-content-start align-items-center">
                <div class="p-2 rounded-pill bg-danger">
                    <i class='bx bx-money text-white'></i>
                </div>
                <div class="ms-1 fs-5">
                    Add Money to Wallet
                </div>
            </div>
        </div>
        <div class="col-2 ">
            <a href="/home">
                <div class="btn btn-outline-dark border-0 rounded-pill">
                    <i class='bx bx-chevron-left fs-1'></i>
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
                    <i class='bx bx-rupee'></i>{{ $walletamount }}
                </div>
            </div>
            <form id="walletform" action="{{ route('phonepe.payment')}}" method="GET">
                @csrf
                <div class="text-white z-3 position-relative">
                    <input type="text" name="walletamount" id="walletamount" class="form-control rounded-4 " placeholder="Enter Amount" required>
                    <input type="hidden" name="transactiontype" id="transactiontype" value="online">
                    <input type="hidden" name="paymenttype" id="paymenttype" value="credit">
                </div>
                <div class="wallet-actions mt-3 d-flex justify-content-center">
                    <button type="submit" id="rzp-button1" class="btn btn-light rounded-pill fs-6 shadow-lg">
                        <div>
                            <i class='bx bx-plus bg-success text-white p-2 rounded-pill me-1'></i>Deposit Amount
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
        </div>
        <ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-danger fw-bold fs-5" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Debits</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-success fw-bold fs-5" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Credits</button>
            </li>
        </ul>
        <div class="tab-content mt-3" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                @foreach ($debithistory as $row)
                @if($row->paymenttype == 'debit')
                <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <i class=" ri-arrow-down-circle-fill  text-danger fs-1"></i>
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
                            <i class='bx bx-rupee'></i>{{ $row->amount }}<sub class="text-danger fs-6">&nbsp;&nbsp;<span class="badge {{$row->status != 'Hold'? 'bg-danger' : 'bg-secondary'}}">{{$row->status != 'Hold'? 'Debit' : 'Debit Hold'}}</span></sub>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                @foreach ($credithistory as $row)
                @if($row->paymenttype == 'credit')
                <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex align-items-center">
                        <div class="me-2">
                            <i class=" ri-arrow-up-circle-fill  text-success fs-1"></i>
                        </div>
                        <div class="fs-5">
                            @if($row->transactiontype == 'Wallet Recharged')
                            Wallet Recharged
                            @elseif($row->transactiontype == 'serviceorder')
                            {{$row->servicename}}
                            @elseif($row->transactiontype == 'commission')
                            Commission Received
                            @endif
                            <div class="">
                                <div class="text-muted fs-6">
                                    {{ $row->created_at->format('d/M/y') }}
                                </div>
                            </div>
                            <a href="#" data-bs-toggle="modal" data-transaction="{{json_encode($row)}}" data-bs-target="#myModal" accesskey="" class="text-muted fs-6 text-decoration-underline editbtnmodal">See Transaction details</a>
                        </div>
                    </div>
                    @php
                    $trasacdata = !empty($row->transactiondata) ? json_decode($row->transactiondata, true) : null;
                    @endphp
                    <div>
                        <div class="fs-3 text-success fw-bold">
                            <i class='bx bx-rupee'></i>
                            <span class="fs-5"> {{ $row->amount ?? 'N/A' }}</span>
                            <sub class="text-success fs-6">
                                &nbsp;&nbsp;
                                @if($row->transactiontype == 'Wallet Recharged')
                                <span class="badge {{ ($trasacdata['status'] ?? '') == 'PAYMENT_ERROR' ? 'bg-danger' : 'bg-success' }}">
                                    @if(($trasacdata['status'] ?? '') == 'PAYMENT_ERROR')
                                    Failed
                                    @else
                                    {{ ($trasacdata['status'] ?? '') != 'PAYMENT_SUCCESS' ? 'Processing' : 'Credit' }}
                                    @endif
                                </span>
                                @elseif($row->transactiontype == 'commission')
                                <span class="badge bg-success">
                                    Credit
                                </span>
                                @endif
                            </sub>
                        </div>
                    </div>

                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal zoomIn " tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-sm rounded-5">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Transaction Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body" id="modalbodyedit">

            </div>
        </div>
    </div>
</div>
<!-- RazorPay Checkout JS -->
{{-- <script src="https://checkout.razorpay.com/v1/checkout.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $('.editbtnmodal').on('click', function() {
        const trasacdata = $(this).data('transaction');
        console.log(JSON.parse(trasacdata.transactiondata));
        const details = JSON.parse(trasacdata.transactiondata);
        const amount = details.amount.toString().slice(0, -2);
        $('#modalbodyedit').html(`
                    <div class="table-responsive">
                        <table class="table border-0 border-light">
                            <tbody>
                                <tr>
                                    <td class="fs-6">Amount Paid</td>
                                    <td class="text-end">
                                        <strong>Rs.<span id="amount-paid">${amount}</span></strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Transaction Id</td>
                                    <td class="text-end">
                                        <strong id="transaction-id">${details.transaction_id}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-6">Reference Id</td>
                                    <td class="text-end">
                                        <strong id="reference-id">${details.providerReferenceId}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                `);
    });

</script>
{{-- <script>
    $(document).ready(function() {
        $(document).on('submit', '#walletform', function(w) {
            w.preventDefault();
            var amount = $('#walletamount').val();
            var transactiontype = $('#transactiontype').val();
            var paymenttype = $('#paymenttype').val();

            if (!amount || isNaN(amount) || amount <= 0) {
                alert('Please enter a valid amount.');
                return;
            }
            $.ajax({
                url: "/razorpay/payment"
                , type: "POST"
                , data: {
                    walletamount: amount
                    , _token: "{{ csrf_token() }}"
}
, success: function(response) {
console.log('Order created:', response);
try {
var options = {
"key": "{{ env('RAZORPAY_KEY') }}"
, "amount": response.amount
, "currency": "INR"
, "name": "DBA Consultancy"
, "description": "Test Transaction"
, 'handler': function(response) {

// Inserting Transaction data into wallet table
var data = JSON.stringify(response);
$.ajax({
url: "/insertwallet"
, type: "POST"
, data: {
transactiondata: data
, amount: amount
, transactiontype: transactiontype
, paymenttype: paymenttype
, _token: "{{ csrf_token() }}"
}
, success: function(response) {
if (response.msg == 'success') {
Swal.fire("Success", "Wallet Recharged successfully!", "success");
} else {
Swal.fire("Error", "Transaction Data Insertion failed", "error");
}
}
, });
}
, "image": "{{asset('assets/images/razorpaylogo.png')}}"
, "order_id": response.id
, "prefill": {
"name": "dummy name"
, "email": "dummyu@example.com"
, "contact": "9000090000"
}
, "notes": {
"address": "Razorpay Corporate Office"
}
, "theme": {
"color": "#3399cc"
}
};
var rzp1 = new Razorpay(options);
$('#rzp-button1').on('click', function(e) {
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

</script> --}}
@endsection
