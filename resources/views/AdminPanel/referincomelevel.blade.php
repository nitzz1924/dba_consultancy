{{-- #---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------” --}}
<x-app-layout>
    @section('title', 'Refer Income Level')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">@yield('title')</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">dashboard</a></li>&nbsp;/
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('insertincomelevel') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-lg-2">
                                    <label for="example-text-input" class="">Income Name</label>
                                    <input class="form-control" placeholder="Enter Income Name" name="incomename" type="text" value="" id="example-text-input" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-text-input" class="">Criteria in (%)</label>
                                    <input class="form-control" placeholder="Enter Criteria" name="criteria" type="text" value="" id="example-text-input" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-text-input" class="">Amount</label>
                                    <input class="form-control" placeholder="Enter Amount" name="amount" type="text" value="" id="example-text-input" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class="">Less/Greater</label>
                                    <select name="lessthangreater" class="form-select" id="" required>
                                        <option value="">--select--</option>
                                        <option value="upto">Upto</option>
                                        <option value="beyond">Beyond</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable-buttons" class="table hover table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Income Name</th>
                                    <th>Criteria in (%)</th>
                                    <th>Less/Greater</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($incomedata as $index => $row)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$row->incomename}}</td>
                                    <td>{{$row->criteria}}</td>
                                    <td>{{ ucfirst($row->lessthangreater)}}</td>
                                    <td>₹ {{$row->amount}}/-</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModaledit" data-refer-income="{{ json_encode($row) }}" class="px-2 text-primary fs-5 editbtnmodal"><i class="ri-edit-2-fill" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <button type="button" class="btn text-danger fs-5" onclick="confirmDelete('{{ $row->id }}')">
                                                    <i class="ri-delete-bin-5-fill"></i>
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
    </div>
    {{-- Edit details Modal --}}
    <div id="exampleModaledit" class="modal fadeInRight" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ route('udpatereferincome') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbodyedit">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  text-white rounded-2 waves-effect waves-light" style="background-color: #222222">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                    title: "Are you sure?"
                    , html: "You want to delete?"
                    , icon: "warning"
                    , showCancelButton: true
                    , confirmButtonColor: "#222222"
                    , cancelButtonColor: "#d33"
                    , confirmButtonText: "Yes, delete it!"
                    , cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/deleteincome/" + id;
                    }
                });
        }

    </script>
    <script>
        //Edit Functionality
        $('#table-body').on('click', '.editbtnmodal', function() {
            const referdata = $(this).data('refer-income');
            {{-- console.log(referdata); --}}
            $('#modalbodyedit').empty();
            const modalbody = `
            <div class="mb-3 row">
                    <div class="col-lg-3">
                        <label for="example-text-input" class="">Income Name</label>
                        <input class="form-control" placeholder="Enter Income Name" name="incomename" type="text" value="${referdata.incomename}" id="example-text-input" required>
                        <input type="hidden" name="referid" value="${referdata.id}" id="">
                    </div>
                    <div class="col-lg-3">
                        <label for="example-text-input" class="">Criteria in (%)</label>
                        <input class="form-control" placeholder="Enter Criteria" name="criteria" type="text" value="${referdata.criteria}" id="example-text-input" required>
                    </div>
                    <div class="col-lg-3">
                        <label for="example-text-input" class="">Amount</label>
                        <input class="form-control" placeholder="Enter Amount" name="amount" type="text" value="${referdata.amount}" id="example-text-input" required>
                    </div>
                    <div class="col-lg-3">
                        <label class="">Less/Greater</label>
                        <select name="lessthangreater" class="form-select" id="" required>
                            <option value="">--select--</option>
                            <option value="upto" ${referdata.lessthangreater === 'upto' ? 'selected' : ''}>Upto</option>
                            <option value="beyond" ${referdata.lessthangreater === 'beyond' ? 'selected' : ''}>Beyond</option>
                        </select>
                    </div>
                </div>
            `;
            $('#modalbodyedit').append(modalbody);
        });
    </script>
</x-app-layout>
