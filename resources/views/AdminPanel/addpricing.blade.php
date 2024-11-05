{{-- #---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------” --}}
<x-app-layout>
    @section('title', 'Add Pricing Details')
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
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-lg-2">
                                    <label for="labelid">Title</label>
                                    <input class="form-control" placeholder="Enter Title" name="title" type="text"
                                        id="labelid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="labelid">Price</label>
                                    <input class="form-control" placeholder="Enter Price" name="price" type="text"
                                        id="labelid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="disprice">Discount Price</label>
                                    <input class="form-control" placeholder="Enter Discount Price" name="disprice" type="text"
                                        id="labelid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="duration">Duration</label>
                                    <input class="form-control" placeholder="Enter Duration" name="duration" type="text"
                                        id="valueid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-email-input" class="form-label">Upload Cover Image</label>
                                    <input class="form-control" placeholder="postal code" name="coverimage" type="file"
                                    value="" id="example-email-input">
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-email-input" class="form-label">Select Documents to Upload</label>
                                    <input class="form-control" placeholder="postal code" name="documents" type="file"
                                    value="" id="example-email-input" multiple>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="example-email-input" class="form-label">Details</label>
                                        <textarea rows="4" name="details" class="form-control resize-none"
                                            placeholder="Your Details..."></textarea>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label for="example-email-input" class="form-label">Note & Requirement</label>
                                        <textarea rows="4" name="notereq" class="form-control resize-none"
                                            placeholder="Your Notes..."></textarea>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mt-3">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
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
                                {{-- @foreach ($masterdata as $index => $row)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $row->label }}</td>
                                    <td>{{ $row->value }}</td>
                                    <td>{{ $row->type }}</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"
                                                    data-car-list="{{ json_encode($row) }}"
                                                    class="px-2 text-primary fs-5 editbtnmodal"><i
                                                        class="ri-edit-2-fill" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" data-bs-title="Edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn text-danger fs-5"
                                                    onclick="confirmDelete('{{ $row->id }}')">
                                                    <i class="ri-delete-bin-5-fill"></i>
                                                </button>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="myModal" class="modal fadeInRight" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content rounded-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Master</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="#" method="POST">
                        @csrf
                        <div class="modal-body" id="modalbodyedit">

                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn  text-white rounded-2 waves-effect waves-light"
                                style="background-color: #222222">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?",
                    html: "You want to delete?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#222222",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/deletemaster/" + id;
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
