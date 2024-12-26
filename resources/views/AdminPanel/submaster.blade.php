{{-- #---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------” --}}
<x-app-layout>
    @section('title', 'Sub-Master')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">@yield('title')</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">dashboard</a></li>
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
                        <form action="{{ route('storesubmaster') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-lg-2">
                                    <label class="">Select Master Category</label>
                                    <select name="type" class="form-select" id="subcategory" required>
                                        <option value="">--select master category--</option>
                                        @foreach ($submasterdata as $row)
                                            <option value="{{ $row->label }}">{{ $row->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-search-input" class="">Label</label>
                                    <input class="form-control" placeholder="enter value" name="label" type="text"
                                        value="" id="labelval" onchange="labelValue()" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-search-input" class="">Value</label>
                                    <input class="form-control" placeholder="enter value" name="value" type="text"
                                        value="" id="valueval" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-search-input" class="">Service Icon Image</label>
                                    <input class="form-control" placeholder="enter value" name="iconimage"
                                        type="file" value="">
                                </div>
                                <div class="col-lg-2 d-flex align-items-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Type</th>
                                    <th>Label</th>
                                    <th>Value</th>
                                    <th>Icon-Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {{-- Table body appends here --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Edit details Modal --}}
    <div id="exampleModaledit" class="modal fadeInRight" tabindex="-1" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Sub-Master</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ route('updatesubmaster') }}" method="POST" enctype="multipart/form-data">
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function labelValue() {
            var label = document.getElementById('labelval').value;
            document.getElementById('valueval').value = label;
        }

        $('#subcategory').on('change', function() {
            var selectedCat = $(this).val();
            console.log(selectedCat);
            $.ajax({
                type: 'GET',
                url: '/getsubmasterajax/' + selectedCat,
                success: function(data) {
                    console.log(data);
                    $('#table-body').empty();

                    // Check if data is empty
                    if (data.length === 0) {
                        // Display 'No records found' if no data
                        $('#table-body').append(
                            '<tr><td colspan="5" class="text-center">No records found</td></tr>');
                    } else {
                        // Populate table if data is available
                        data.forEach(function(element, index) {
                            var row = '<tr>';
                            row += '<td>' + (index + 1) + '</td>';
                            row += '<td>' + element.type + '</td>';
                            row += '<td>' + element.label + '</td>';
                            row += '<td>' + element.value + '</td>';
                            row += '<td>' + (element.iconimage ?
                                '<img src="/assets/images/Services/' + element.iconimage +
                                '" alt="Icon Image" width="60">' : '') + '</td>';
                            row += '<td>' +
                                '<ul class="list-inline mb-0">' +
                                '<li class="list-inline-item">' +
                                '<a href="#" data-bs-toggle="modal" data-bs-target="#exampleModaledit" ' +
                                'data-car-list=\'' + JSON.stringify(element) + '\' ' +
                                'class="px-2 text-primary editbtnmodal"><i ' +
                                'class="ri-edit-2-fill" data-bs-toggle="tooltip" ' +
                                'data-bs-placement="top" data-bs-title="Edit"></i></a>' +
                                '</li>' +
                                '<li class="list-inline-item">' +
                                '<button type="button" class="btn btn-danger bg-white border-0 text-danger waves-effect waves-light" ' +
                                'onclick="confirmDelete(' + element.id + ')">' +
                                '<i class="ri-delete-bin-fill"></i>' +
                                '</button>' +
                                '</li>' +
                                '</ul>' +
                                '</td>';

                            row += '</tr>';
                            $('#table-body').append(row);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                }
            });
        });
    </script>
    <script>
        //Edit Functionality
        $('#table-body').on('click', '.editbtnmodal', function() {
            const carlist = $(this).data('car-list');
            console.log(carlist);
            $('#modalbodyedit').empty();
            const imageSrc = carlist.iconimage ? '{{ asset('assets/images/Services/') }}/' + carlist.iconimage : '';
            // const imageSrc = carlist.iconimage ? 'assets/images/Services/' + carlist.iconimage : '';
            console.log(imageSrc);
            const modalbody = `
                    <div class="mb-3 row">
                            <div class="col-lg-6">
                    <div class="mt-2 mb-2">
                         <label>Select Master Category</label>
                    <select name="type" class="form-select" id="subcategory" required>
                        <option value="">--select master category--</option>
                        @foreach ($submasterdata as $row)
                            <option value="{{ $row->label }}" ${carlist.type === '{{ $row->label }}' ? 'selected' : ''}>{{ $row->label }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="labelval">Label</label>
                        <input class="form-control" placeholder="enter label" name="label" type="text"
                            value="${carlist.label}" id="labelval" onchange="labelValue()" required>
                             <input type="hidden" name="submasterid" value="${carlist.id}" id="">
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="valueval">Value</label>
                        <input class="form-control" placeholder="enter value" name="value" type="text"
                            value="${carlist.value}" id="valueval" required>
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="iconimage">Icon Image</label>
                        <input class="form-control" placeholder="enter value" name="iconimage" type="file" value="">
                    </div>
                </div>
                    <div class="col-lg-6">
                            <div class="img-pre">
                                <img  src="${imageSrc}" alt="" height="300">
                            </div>
                        </div>
            </div>
        `;
            $('#modalbodyedit').append(modalbody);
        });
    </script>
</x-app-layout>
