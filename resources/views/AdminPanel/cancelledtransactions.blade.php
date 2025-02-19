
{{-- ---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏--------------------------- --}}
<x-app-layout>
    @section('title', 'Cancelled Transactions')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
    <style>
        table.dataTable th.dt-type-numeric,
        table.dataTable th.dt-type-date,
        table.dataTable td.dt-type-numeric,
        table.dataTable td.dt-type-date {
            text-align: left !important;
        }

    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">@yield('title')</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">dashboard</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered  hover dt-responsive nowrap" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SNo.</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Amount</th>
                                        <th>Payment Type</th>
                                        <th>Transaction Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($cancelledorders as $index => $data)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $data->created_at->format('d M Y | h:i A') }}</td>
                                        <td>{{ $data->customername }}</td>
                                        <td>₹ {{ $data->amount }}/-</td>
                                        <td>
                                            @if ($data->paymenttype == 'debit')
                                            <span class="badge bg-danger fs-6">{{ ucfirst($data->paymenttype) }}</span>
                                            @else
                                            <span class="badge bg-success fs-6">{{ ucfirst($data->paymenttype) }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->transactiontype == 'online')
                                            Wallet Recharged
                                            @else
                                            {{ ucfirst($data->transactiontype) }}
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-danger fs-6">{{ ucfirst($data->status) }}</span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
