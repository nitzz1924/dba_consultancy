@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Commissions | DBA Consultancy</title>
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
                                <img src="{{ asset('assets/images/Services/commission.png')}}" alt="icon"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 px-3">
                        <div class="mt-2 text-start wallet-amount">Commissions</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- History --}}
    <div class="row my-3">
        <div class="d-flex justify-content-between align-content-center">
            <div class="sectionHeading">
            Commissions List
            </div>
            {{-- <div>
                <a href="#" class="btn btn-outline-dark border-0 fs-6">See more</a>
            </div> --}}
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Commission Rate (%)</th>
                        <th>Amount</th>
                        <th>Commission Amount</th>
                        <th>Commission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>10%</td>
                        <td>₹ 1000</td>
                        <td>₹ 100</td>
                        <td>23 Nov 24</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    setTimeout(function () {
        $('#successAlert').fadeOut('slow');
    }, 2000);

    setTimeout(function () {
        $('#dangerAlert').fadeOut('slow');
    }, 2000);
</script>
@endsection