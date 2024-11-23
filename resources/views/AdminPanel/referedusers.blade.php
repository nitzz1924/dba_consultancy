{{-- ---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏--------------------------- --}}
<x-app-layout>
    @section('title', 'Refered Users')
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    @foreach ($list as $index => $data)
                                    <tr>
                                        <th>{{ $index + 1 }}</th>
                                        <td>{{ $data->username }}</td>
                                        <td>{{ $data->mobilenumber }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>
                                            <div class="hstack gap-3 flex-wrap">
                                                <a href="#"
                                                    onclick="getChilds('{{ $data->refercode }}','{{ $data->parentreferid }}')"
                                                    class="editbtnmodal btn btn-dark btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#myModal"><i
                                                        class="ri-group-fill align-middle me-1"></i>View Refered
                                                    Users</a>
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
    <div id="myModal" class="modal fadeInRight" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Refered Users List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <ul class="list-group" id="userlistul">
                        @foreach ($list as $row)
                        <li class="list-group-item">{{ $row->username }}</li>
                        @endforeach
                    </ul>
                </div>
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

    <!--Getting Children-->
    <script>
        function getChilds(refercode, parentreferid) {
            $.ajax({
                url: "/admin/getchildren/" + refercode,
                type: "GET",
                success: function(children) {
                    console.log(children);
                    $('#userlistul').empty();
                    if (children.length > 0) {
                        children.forEach((item) => {
                            var li = `
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        ${item.username}
                                    </div>
                                    <div>
                                        <a href="#" onclick="getChilds('${parentreferid}')">
                                           <i class="border border-2  ri-arrow-left-fill fs-4 text-black align-middle me-1"></i>
                                        </a>

                                        <a  href="#" onclick="getChilds('${item.refercode}','${item.parentreferid}')">
                                              <i class="border border-2  ri-arrow-right-fill fs-4 text-black align-middle me-1"></i>
                                        </a>
                                    </div>
                                 </li>
                            `;
                            $('#userlistul').append(li);
                        });
                    } else {
                        var error = `
                        <li class="list-group-item d-flex justify-content-between">No Items found<span class="text-end"> <a href="#" onclick="getChilds('${parentreferid}')">
                             <i class="border border-2  ri-arrow-left-fill fs-4 text-black align-middle me-1"></i>
                        </li>`;
                        $('#userlistul').append(error);
                    }
                }
            });

        }
    </script>
</x-app-layout>
