{{-- #---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------” --}}
<x-app-layout>
    @section('title', 'Master')
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
        <!-- Page Title Section -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">@yield('title')</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">dashboard</a></li>&nbsp;/
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('storemaster') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-lg-4">
                                    <label for="labelid">Label</label>
                                    <input class="form-control" placeholder="enter label" name="label" type="text"
                                        id="labelid" required>
                                </div>
                                <div class="col-lg-4">
                                    <label for="valueid">Value</label>
                                    <input class="form-control" placeholder="enter value" name="value" type="text"
                                        id="valueid" required>
                                </div>
                                <div class="col-lg-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="example" class="table table-bordered dt-responsive nowrap" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Label</th>
                                    <th>Value</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($masterdata as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row->label }}</td>
                                        <td>{{ $row->value }}</td>
                                        <td>{{ $row->type }}</td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModaledit"
                                                        data-car-list="{{ json_encode($row) }}"
                                                        class="px-2 text-primary editbtnmodal"><i class="ri-edit-2-fill"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button"
                                                        class="btn btn-danger waves-effect waves-light btn-sm"
                                                        onclick="confirmDelete('{{ $row->id }}')">
                                                        <i class="ri-delete-bin-fill"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="exampleModaledit" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body" id="modalbodyedit">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    @push('scripts')
        @if (session('success'))
            <script>
                swal("Success", "{{ session('success') }}", "success");
            </script>
        @endif
        @if (session('error'))
            <script>
                swal("Error", "{{ session('error') }}", "error");
            </script>
        @endif
    @endpush
    <script>
        function confirmDelete(id) {
            let smiley = '😊';
            swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this data!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location.href = "/deletemaster/" + id;
                    } else {
                        swal("Great Decision....!! Your data is safe! " + smiley);
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


        // Populate Edit Modal with Data
        $('#table-body').on('click', '.editbtnmodal', function() {
            const carlist = $(this).data('car-list');
            console.log(carlist);
            $('#modalbodyedit').html(`
                    <div class="mb-3 row">
                        <div class="col-lg-6">
                            <label>Label</label>
                            <input class="form-control" name="label" type="text" value="${carlist.label}" required>
                            <input type="hidden" name="masterid" value="${carlist.id}">
                        </div>
                        <div class="col-lg-6">
                            <label>Value</label>
                            <input class="form-control" name="value" type="text" value="${carlist.value}" required>
                        </div>
                    </div>
                `);
        });
    </script>
</x-app-layout>
