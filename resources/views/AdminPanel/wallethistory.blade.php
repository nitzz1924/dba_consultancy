
{{-- ---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏--------------------------- --}}
<x-app-layout>
    @section('title', 'Wallet History')
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
                        <div class="listjs-table col-md-12" id="customerList">
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($credithistory as $index => $data)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $data->created_at->format('d M Y | h:i A') }}</td>
                                        <td>{{ $data->customername }}</td>
                                        <td>₹ {{ $data->amount }}/-</td>
                                        <td>
                                            @if ($data->paymenttype == 'debit')
                                            <span class="badge bg-danger">{{ ucfirst($data->paymenttype) }}</span>
                                            @else
                                            <span class="badge bg-success">{{ ucfirst($data->paymenttype) }}</span>
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
                                            @if ($data->status != '0')
                                            {{ ucfirst($data->status) }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($data->status == 'requested')
                                            <button class="btn btn-danger fw-bold btn-sm rounded-pill " onclick="approvedwithdraw('{{ $data->id }}')">
                                                Complete request
                                            </button>
                                            @elseif ($data->status == 'withdrawn')
                                            <div class="  fs-6">
                                                Transaction No: {{ $data->transactionid }}
                                            </div>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @if ($credithistory->isNotEmpty())
                                <tfoot class="table-light">
                                    <tr>
                                        <td colspan="3" class="fw-bold fs-5">Total</td>
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

            // Handle date filter button click
            $('.datebtn').on('click', function() {
                // Get date filter values
                const datefrom = $('#datefrom').val();
                const dateto = $('#dateto').val();

                console.log("Date From:", datefrom);
                console.log("Date To:", dateto);

                // AJAX request for date filtering
                $.ajax({
                    url: '/admin/datefilterwallethistory'
                    , method: 'POST'
                    , data: {
                        datefrom: datefrom
                        , dateto: dateto
                    }
                    , headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    , success: function(response) {
                        console.log("Filtered data:", response);

                        // Clear existing DataTable and rows
                        if ($.fn.DataTable.isDataTable('#example')) {
                            dataTableCustomer.destroy();
                        }
                        $('#table-body').empty();

                        // Populate table with filtered data
                        if (Array.isArray(response) && response.length > 0) {
                            response.forEach(function(row, index) {
                                const dateObj = new Date(row.created_at);
                                const formattedDate = dateObj.toLocaleDateString(
                                    'en-GB', {
                                        day: 'numeric'
                                        , month: 'short'
                                        , year: 'numeric'
                                    });
                                const formattedTime = dateObj.toLocaleTimeString(
                                    'en-US', {
                                        hour: 'numeric'
                                        , minute: '2-digit'
                                        , hour12: true
                                    });

                                const html = `
                                <tr>
                                    <th>${index + 1}</th>
                                    <td>${formattedDate} | ${formattedTime}</td>
                                    <td>${row.customername}</td>
                                    <td>₹ ${row.amount}/-</td>
                                    <td>
                                        ${row.transactiontype === 'online' 
                                            ? 'Wallet Recharged' 
                                            : row.transactiontype.charAt(0).toUpperCase() + row.transactiontype.slice(1)}
                                    </td>
                                </tr>
                            `;

                                $('#table-body').append(html);
                            });

                            // Recalculate the total sum
                            calculateTotalSum();

                            // Reinitialize DataTable
                            dataTableCustomer = $('#example').DataTable({
                                layout: {
                                    topStart: {
                                        buttons: ['copy', 'csv', 'excel', 'pdf'
                                            , 'print'
                                        ]
                                    }
                                }
                            });
                        } else {
                            // No data found for the selected date range
                            $('#table-body').html(`
                            <tr>
                                <td colspan="5" class="text-center">No orders found for the selected date range.</td>
                            </tr>
                        `);
                            calculateTotalSum();
                        }
                    }
                });
            });
        });

        // Function to calculate total sum of the "Amount" column
        function calculateTotalSum() {
            let totalSum = 0;
            $('#table-body tr td:nth-child(4)').each(function() {
                const value = parseFloat($(this).text().replace(/[₹/-]/g, '').trim());
                if (!isNaN(value)) totalSum += value;
            });
            $('#total-sum').text(`₹ ${totalSum}/-`);
        }

    </script>

    <script>
        function approvedwithdraw(id) {
            Swal.fire({
                title: "Are you sure?"
                , html: `
            <p>You want to complete the withdrawal request?</p>
            <input type="text" id="transactionNumber" class="swal2-input mx-auto" placeholder="Enter Transaction Number">
        `
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#4caf50"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, complete it!"
                , cancelButtonText: "Cancel"
                , preConfirm: () => {
                    const transactionNumber = Swal.getPopup().querySelector('#transactionNumber').value;
                    if (!transactionNumber) {
                        Swal.showValidationMessage(`Please enter a transaction number`);
                    }
                    return {
                        transactionNumber: transactionNumber
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const transactionNumber = result.value.transactionNumber;

                    // Send the POST request using fetch
                    fetch(`/approvedwithdraw/${id}`, {
                            method: "POST"
                            , headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                                , "Content-Type": "application/json"
                            }
                            , body: JSON.stringify({
                                transactionNumber: transactionNumber
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire("Success!", data.message, "success").then(() => {
                                    location.reload(); // Reload the page or redirect if needed
                                });
                            } else {
                                Swal.fire("Error!", data.error || "Something went wrong.", "error");
                            }
                        })
                        .catch(error => {
                            Swal.fire("Error!", "Unable to process your request.", "error");
                        });
                }
            });
        }

    </script>

</x-app-layout>
