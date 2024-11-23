
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
                                    <input class="form-control" placeholder="Enter Income Name" name="incomename" type="text"
                                        value="" id="example-text-input" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-text-input" class="">Criteria in (%)</label>
                                    <input class="form-control" placeholder="Enter Criteria" name="criteria" type="text"
                                        value="" id="example-text-input" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-text-input" class="">Amount</label>
                                    <input class="form-control" placeholder="Enter Amount" name="amount" type="text"
                                        value="" id="example-text-input" required>
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
                        <table id="datatable-buttons" class="table hover table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
                                    <td>{{$row->lessthangreater}}</td>
                                    <td>₹ {{$row->amount}}/-</td>
                                    <td>
                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-sm"
                                            onclick="confirmDelete('{{ $row->id }}')">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
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
                        window.location.href = "/deleteincome/" + id;
                    }
                });
        }
    </script>
</x-app-layout>
