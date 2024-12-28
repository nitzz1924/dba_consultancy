{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
<x-app-layout>
    @section('title', 'All Orders')
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body row">
                        <div class="listjs-table col-md-7" id="customerList">
                            <form>
                                <div class="row g-4 mb-3">
                                    <div class="col-sm-auto d-flex justify-content-sm-start gap-2 align-items-end flex-wrap">
                                        <div>
                                            <label for="exampleInputdate" class="form-label">From</label>
                                            <input type="date" name="datefrom" class="form-control" id="datefrom">
                                        </div>
                                        <div>
                                            <label for="exampleInputdate" class="form-label">To</label>
                                            <input type="date" name="dateto" class="form-control" id="dateto">
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success add-btn datebtn"><i class="ri-search-eye-line align-bottom me-1"></i>Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 ">
                            <div>
                                <label for="exampleInputdate" class="form-label fs-4">Filter by Status</label>
                            </div>
                            <div class="">
                                <div class="btn-group mt-2" role="group" aria-label="Basic example">
                                    <a href="{{ route('customersallorders') }}" class="btn {{ request()->routeIs('customersallorders') ? 'btn-dark' : 'btn-light' }}">All</a>
                                    <a href="{{ route('customersorders', ['status' => 'Hold']) }}" class="btn {{ request()->route('status') == 'Hold' ? 'btn-dark' : 'btn-light' }}">On
                                        Hold</a>
                                    <a href="{{ route('customersorders', ['status' => 'Processing']) }}" class="btn {{ request()->route('status') == 'Processing' ? 'btn-dark' : 'btn-light' }}">Processing</a>
                                    <a href="{{ route('customersorders', ['status' => 'Cancel']) }}" class="btn {{ request()->route('status') == 'Cancel' ? 'btn-dark' : 'btn-light' }}">Cancelled</a>
                                    <a href="{{ route('customersorders', ['status' => 'Completed']) }}" class="btn {{ request()->route('status') == 'Completed' ? 'btn-dark' : 'btn-light' }}">Completed</a>
                                </div>
                            </div>
                        </div>
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
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Service</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($orders as $index => $data)
                                    <tr>
                                        <th>#Order {{$data->id}}</th>
                                        <td>{{ $data->created_at->format('d M Y | h:i A') }}</td>
                                        <td>{{$data->customername}}</td>
                                        <td>{{$data->servicename}}</td>
                                        <td>@php $total = $data->servicecharge - $data->discount @endphp ₹ {{$total}}/-</td>
                                        <td>
                                            @if($data->status == 'Unpaid')
                                            <span class="badge badge-label bg-primary fs-6"><i class="mdi mdi-circle-medium"></i>Unpaid</span>
                                            @elseif($data->status == 'Hold')
                                            <span class="badge badge-label bg-secondary fs-6"><i class="mdi mdi-circle-medium"></i>On Hold</span>
                                            @elseif($data->status == 'Cancel')
                                            <span class="badge badge-label bg-danger  fs-6"><i class="mdi mdi-circle-medium"></i>Cancelled</span>
                                            @elseif($data->status == 'Processing')
                                            <span class="badge badge-label bg-info  fs-6"><i class="mdi mdi-circle-medium"></i>Processing</span>
                                            @else
                                            <span class="badge badge-label bg-success fs-6"><i class="mdi mdi-circle-medium"></i>Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a href="{{ route('orderdetailsadmin', ['id' => $data->id]) }}" class="link-dark fs-5 fw-bold" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="View Details">View</a>
                                                <a href="#" onclick="confirmDelete('{{ $data->id }}')" class="link-danger  fw-bold fs-5">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @if($orders->isNotEmpty())
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="4" class="fw-bold fs-5">Total</td>
                                        <td class="fw-bold fs-5" id="total-sum"></td>
                                    </tr>
                                </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?"
                    , html: "You want to delete Order No. <strong style='color: red;'>" + id + "</strong> ?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/deleteorder/" + id;
                    }
                });
        }

        // Calculate total sum
        function calculateTotalSum() {
            let totalSum = 0;
            $('#table-body tr td:nth-child(5)').each(function() {
                const totalValue = parseFloat($(this).text().replace(/[₹/-]/g, '').trim());
                if (!isNaN(totalValue)) totalSum += totalValue;
            });
            $('#total-sum').text(`₹ ${totalSum}/-`);
        }

    </script>
    <!-- Date Filter Code -----------------------DEKHA Bhul gaya naa tu aagaya naa main kaam -- -->
    <script>
        $(document).ready(function() {
            calculateTotalSum();
            // Initialize DataTable
            var dataTableCustomer = $('#example').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    }
                }
            });

            $('.datebtn').on('click', function() {
                setTimeout(calculateTotalSum, 500); // Recalculation sum after filter
                var datefrom = $('#datefrom').val();
                var dateto = $('#dateto').val();

                console.log("Date From:", datefrom);
                console.log("Date To:", dateto);

                $.ajax({
                    url: '/admin/datefilterorders'
                    , method: 'POST'
                    , data: {
                        datefrom: datefrom
                        , dateto: dateto
                    , }
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        console.log("Filtered data:", response);
                        dataTableCustomer.clear().destroy();
                        $('#table-body').empty();
                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(row) {
                                var dateObj = new Date(row.created_at);
                                var formattedDate = dateObj.toLocaleDateString('en-GB', {
                                    day: 'numeric'
                                    , month: 'short'
                                    , year: 'numeric'
                                });
                                var formattedTime = dateObj.toLocaleTimeString('en-US', {
                                    hour: 'numeric'
                                    , minute: '2-digit'
                                    , hour12: true
                                });

                                // Calculate total
                                var total = row.servicecharge - row.discount;
                                var html = `
                                <tr>
                                    <th>#Order ${row.id}</th>
                                    <td>${formattedDate} | ${formattedTime}</td>
                                    <td>${row.customername}</td>
                                    <td>${row.servicename}</td>
                                    <td>₹ ${total}/-</td>
                                    <td>
                                        ${row.status === 'Hold'
                                        ? '<span class="badge badge-label bg-secondary fs-6"><i class="mdi mdi-circle-medium"></i> Hold</span>'
                                        : row.status === 'Processing'
                                            ? '<span class="badge badge-label bg-info fs-6"><i class="mdi mdi-circle-medium"></i> Processing</span>'
                                            : row.status === 'Cancel'
                                                ? '<span class="badge badge-label bg-danger fs-6"><i class="mdi mdi-circle-medium"></i> Cancelled</span>'
                                                : '<span class="badge badge-label bg-success fs-6"><i class="mdi mdi-circle-medium"></i> Completed</span>'
                                    }
                                    </td>
                                    <td>
                                        <div class="hstack gap-3 flex-wrap">
                                            <a href="/admin/orderdetails/${row.id}"
                                                class="link-dark fs-15">
                                                <i class="ri-eye-fill" data-bs-toggle="tooltip"
                                                    data-bs-placement="top" data-bs-title="View Details"></i>
                                            </a>
                                            <a href="#" onclick="confirmDelete('${row.id}')"
                                                class="link-danger fs-15">
                                                <i class="ri-delete-bin-line"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            `;
                                $('#table-body').append(html);
                            });

                            // Reinitialize DataTable
                            dataTableCustomer = $('#example').DataTable({
                                layout: {
                                    topStart: {
                                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                                    }
                                }
                            });
                        } else {
                            $('#table-body').html('<tr><td colspan="7">No orders found for the selected date range.</td></tr>');
                        }
                    }
                    , error: function(error) {
                        console.error("Error fetching filtered data:", error);
                    }
                });
            });
        });

    </script>

</x-app-layout>
