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
                                    <img src="{{ asset('assets/images/Services/commission.png') }}" alt="icon"
                                        class="img-fluid" width="75">
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
                    Commission generated
                </div>
                {{-- <div>
                <a href="#" class="btn btn-outline-dark border-0 fs-6">See more</a>
            </div> --}}
            </div>
            <div class="table-responsive card p-3 rounded-3">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-nowrap">
                            <th>Sr. No.</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Service (amount)</th>
                            <th>Rate (%)</th>
                            <th>Commission</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commissions as $index => $data)
                            <tr class="fs-6">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->created_at->format('d/m/Y') }}</td>
                                <td>{{ $data->customername }}</td>
                                <td>
                                    <div class="text-nowrap">
                                        {{ $data->servicename }}
                                    </div>
                                    <div class="text-muted">
                                        (₹ {{ number_format($data->amount, 2) }})
                                    </div>
                                </td>
                                <td>{{ $data->commissionpercent }}%</td>
                                <td>₹ {{ number_format($data->commissionamt, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    
@endsection
