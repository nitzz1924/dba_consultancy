{{-----------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏-----------------------------}}
<x-app-layout>
    @section('title', 'All Customers')
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
                            <table id="example" class="table table-bordered border-light hover dt-responsive nowrap"
                                style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Customer Name</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Verification Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($customers as $index => $data)
                                    <tr>
                                        <th>{{$index + 1}}</th>
                                        <td>{{$data->username}}</td>
                                        <td>{{$data->mobilenumber}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>
                                            @if($data->verifystatus == 0)
                                            <span
                                                class="badge rounded-pill bg-warning-subtle text-warning">Pending</span>
                                            @elseif($data->verifystatus == 1)
                                            <span
                                                class="badge rounded-pill bg-success-subtle text-success">Verified</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                {{-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-record="{{ json_encode($data) }}"
                                                    class="link-success editbtnmodal fs-15"><i class="ri-edit-2-line"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Edit"></i></a> --}}
                                                <a href="#"
                                                    onclick="confirmDelete('{{ $data->id }}','{{ addslashes($data->username) }}')"
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
    <div class="modal flip" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Customer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbody">
                        {{-- Modal Body Appends here --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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
    <script>
        function confirmDelete(id, title) {
            Swal.fire({
                    title: "Are you sure?",
                    html: "You want to delete User <strong style='color: red;'>" + title + "</strong> ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#222222",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/deleteuser/" + id;
                    }
                });
        }
    </script>

    <!--Edit Functionality-->
    <script>
        $('#table-body').on('click', '.editbtnmodal', function() {
            var userdata = $(this).data('record');
            console.log(userdata);
            $('#modalbody').empty();

            var modalbody = `
                <div class="card-body">
                    <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label class="form-label">User ID</label>
                                        <input type="number" name="userid" class="form-control"
                                            placeholder="Enter User ID" disabled value="${userdata.userid}">
                                            <input type="hidden" name="userid" value="${userdata.id}" id="">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label class="form-label">Password</label>
                                        <input type="text" name="password" class="form-control"
                                            placeholder="Enter New Password" autocomplete="off" value="${userdata.password}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label class="form-label">Mobile Number</label>
                                        <input type="text" name="mobilenumber" class="form-control"
                                            placeholder="Enter Mobile Number"  value="${userdata.mobilenumber}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Enter Email" value="${userdata.email}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label class="form-label">Expire Date</label>
                                        <input type="date" name="expiredate" class="form-control"
                                            placeholder="Enter User ID" value="${userdata.expiredate}">
                                    </div>
                                </div>
                                <div class="col-xxl-4 col-md-6">
                                    <div>
                                        <label class="form-label">Created Date</label>
                                        <input type="date" name="createddate" class="form-control"
                                            placeholder="Enter User ID" value="${userdata.createddate}">
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            `;
            $('#modalbody').append(modalbody);
        });
    </script>
</x-app-layout>
