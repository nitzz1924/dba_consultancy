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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered  hover dt-responsive nowrap"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer Name</th>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($orders as $index => $data)
                                    <tr>
                                        <th>{{$data->id}}</th>
                                        <td>{{$data->customername}}</td>
                                        <td>{{$data->servicename}}</td>
                                        <td>{{$data->created_at->format('d M Y')}}</td>
                                        <td>@php $total = $data->servicecharge- $data->discount @endphp ₹ {{$total}}/-
                                        </td>
                                        <td>
                                            @if($data->status == 'Unpaid')
                                            <span class="badge badge-label bg-danger fs-6"><i
                                                    class="mdi mdi-circle-medium"></i> Unpaid</span>
                                            @elseif($data->status == 'Processing')
                                            <span class="badge badge-label bg-info  fs-6"><i
                                                    class="mdi mdi-circle-medium"></i>Processing</span>
                                            @else
                                                <span class="badge badge-label bg-success fs-6"><i
                                                    class="mdi mdi-circle-medium"></i>Completed</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a href="{{ route('orderdetailsadmin',['id' => $data->id]) }}"
                                                    class="link-dark fs-15"><i class=" ri-eye-fill"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="View Details"></i></a>
                                                <a href="#" onclick="confirmDelete('{{ $data->id }}')"
                                                    class="link-danger fs-15"><i class="ri-delete-bin-line"></i></a>
                                            </div>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?",
                    html: "You want to delete Order No. <strong style='color: red;'>" + id + "</strong> ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#222222",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/deleteorder/" + id;
                    }
                });
        }
    </script>
    <script>
        // DataTable Initialization
        $(document).ready(function() {
            $('#example').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    }
                },

            });
        });
    </script>
</x-app-layout>
