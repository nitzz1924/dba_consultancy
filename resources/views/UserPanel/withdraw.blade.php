@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Withdraw | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid  p-4 desktop-view">
        {{-- Header bar --}}
        <div class="row">
            <div class="col-10">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="p-2 rounded-pill bg-danger">
                        <i class='bx bx-wallet text-white fs-3' ></i>
                    </div>
                    <div class="ms-1 fs-5">
                        Widthdraw Money
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
                        <i class='bx bx-rupee'></i>{{ number_format($walletamount, 2) }}
                    </div>
                </div>
                <form method="post" action="{{ route('withdrawrequest') }}" enctype="multipart/form-data" onsubmit="return validateAmount()">
                    @csrf

                    <div class="text-white z-3 position-relative">
                        <input type="text" name="walletamount" id="walletamount" class="form-control rounded-4 "
                            placeholder="Enter Amount" required>
                        <input type="hidden" name="transactiontype" id="transactiontype" value="withdraw">
                        <input type="hidden" name="paymenttype" id="paymenttype" value="debit">
                    </div>
                    <div class="wallet-actions mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-light rounded-pill fs-6 shadow-lg">
                            <div>
                                <i class='bx bx-minus bg-danger text-white p-2 rounded-pill me-1'></i>Send request
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
                    <button class="nav-link active text-danger fw-bold fs-5" id="home-tab" data-bs-toggle="tab"
                        data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                        aria-selected="true">Requested</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link text-success fw-bold fs-5" id="profile-tab" data-bs-toggle="tab"
                        data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane"
                        aria-selected="false">Withdrawn</button>
                </li>
            </ul>
            <div class="tab-content mt-3" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                    tabindex="0">
                    @foreach ($widthrawhistory as $row)
                        @if ($row->status == 'requested')
                            <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <i class=" ri-arrow-down-circle-fill  text-danger fs-1"></i>
                                    </div>
                                    <div class="fs-5">
                                        Withdrawl Requested
                                        <div class="">
                                            <div class="text-muted fs-6">
                                                {{ $row->created_date }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-3  text-danger fw-bold">
                                        <i class='bx bx-rupee'></i>{{ $row->amount }}<sub
                                            class="text-danger fs-6">&nbsp;&nbsp;<span
                                                class="badge {{ $row->status != 'Requested' ? 'bg-danger' : 'bg-secondary' }}">{{ $row->status != 'Requested' ? 'Debit' : 'Debit Hold' }}</span></sub>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    @foreach ($widthrawhistory as $row)
                        @if ($row->status == 'withdrawn')
                            <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="me-2">
                                        <i class=" ri-arrow-up-circle-fill  text-success fs-1"></i>
                                    </div>
                                    <div class="fs-5">
                                        Request Completed
                                        <div class="">
                                            <div class="text-muted fs-6">
                                                Transaction No: {{ $row->transactionid }}
                                            </div>
                                            <div class="text-muted fs-6">
                                                {{ $row->created_date }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="fs-3 text-success fw-bold">
                                        <i class='bx bx-rupee'></i>{{ $row->amount }}<sub
                                            class="text-success fs-6">&nbsp;&nbsp;<span
                                                class="badge bg-success">Debited</span></sub>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <script>
        function validateAmount() {
            var walletAmount = parseFloat(document.getElementById('walletamount').value);
            var currentBalance = parseFloat({{ $walletamount }});
            if (walletAmount > currentBalance) {
            showToast('Entered amount exceeds current balance.');
            return false;
            }
            return true;
        }

        function showToast(message) {
            Toastify({
            text: message,
            gravity: "top",
            position: "center",
            style: {
                background: "red",
                color: "#ffffff",
                whiteSpace: "nowrap",
                borderRadius: "10px",
                textAlign: "center"
            },
            duration: 5000
            }).showToast();
        }
    </script>
@endsection
