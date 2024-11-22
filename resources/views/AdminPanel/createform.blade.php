{{-- #---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------” --}}
<x-app-layout>
    @section('title', 'Create Form')
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
                        <form action="{{ route('insertform') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-lg-2">
                                    <label class="">Select Type</label>
                                    <select name="servicetype" class="form-select" id="servicetypeid" required>
                                        <option value="">--select type--</option>
                                        @foreach ($masterdata as $data)
                                            <option value="{{ $data->value }}">{{ $data->value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="masterserviceid" id="selectedServiceId">
                                <div class="col-lg-3">
                                    <label class="">Select Service</label>
                                    <select name="servicename" class="form-select" id="serviceid" required>
                                        <option value="">--select service--</option>
                                    </select>

                                </div>
                                <div class="col-lg-2">
                                    <label for="example-text-input" class="">Value</label>
                                    <input class="form-control" placeholder="enter Value" name="value" type="text"
                                        value="" id="example-text-input" required>
                                </div>
                                <div class="col-lg-2">
                                    <label class="">Select Input Type</label>
                                    <select name="inputtype" class="form-select" id="" required>
                                        <option value="">--select input type--</option>
                                        <option value="text">Text</option>
                                        <option value="email">Email</option>
                                        <option value="checkbox">Checkbox</option>
                                        <option value="file">File</option>
                                        <option value="textarea">Textarea</option>
                                        <option value="number">Number</option>
                                        <option value="url">URL</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 d-flex align-items-end">
                                    <button type="submit"
                                        class="btn btn-success waves-effect waves-light">Submit</button>
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
                        <table id="datatable-buttons" class="table  table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Type</th>
                                    <th>Form Labels</th>
                                    <th>Value</th>
                                    <th>Input Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                {{-- @foreach ($attributesdata as $index => $row)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$row->cartype}}</td>
                                    <td>{{$row->formlabels}}</td>
                                    <td>{{$row->value}}</td>
                                    <td>{{$row->inputtype}}</td>
                                    <td>
                                        <button type="button" class="btn btn-danger waves-effect waves-light btn-sm"
                                            onclick="confirmDelete('{{ $row->id }}')">
                                            <i class="uil-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="exampleModal" class="modal fadeInRight" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-2">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Sub-Master</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ route('updateattributes') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body" id="modalbody">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  text-white rounded-2 waves-effect waves-light"
                            style="background-color: #222222">Update</button>
                    </div>
                </form>
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
                        window.location.href = "/deleteattribute/" + id;
                    }
                });
        }
    </script>
    <script>
        //Dynamic Services Names are coming..........
        $('#servicetypeid').on('change', function() {
            var selectedtype = $(this).val();
            console.log(selectedtype);
            $.ajax({
                url: '/filterservice/' + selectedtype,
                type: 'GET',
                success: function(response) {
                    console.log("this working", response);
                    var dropdown1 = $('#serviceid');
                    dropdown1.empty();
                    dropdown1.append($('<option selected>Choose...</option>'));
                    response.master.forEach(function(item) {
                        dropdown1.append($('<option value="' + item.label + '" data-id="' + item
                            .id + '">' + item.label + '</option>'));
                    });
                }
            });
        });

        //Getting Master ID of Selected Option
        $('#serviceid').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var selectedServiceId = selectedOption.attr('data-id');
            $('#selectedServiceId').val(selectedServiceId);
        });






        //Table Appending dynamically
        $('#servicetypeid, #serviceid').on('change', function() {
            var servicetype = $('#servicetypeid').val();
            var servicename = $('#serviceid').val();
            console.log(servicetype, servicename);
            $.ajax({
                type: 'GET',
                url: '/getattributes/' + servicetype + '/' + servicename,
                success: function(data) {
                    console.log(data);
                    $('#table-body').empty();
                    data.data.forEach(function(element, index) {
                        var row = '<tr>';
                        row += '<td>' + (index + 1) + '</td>';
                        row += '<td>' + element.type + '</td>';
                        row += '<td>' + element.servicename + '</td>';
                        row += '<td>' + element.value + '</td>';
                        row += '<td>' + element.inputtype + '</td>';
                        row += '<td>';
                        row += '<ul class="list-inline mb-0">';
                        row += '<li class="list-inline-item">';
                        row += '<a href="/editattributes/' + element.id +
                            '" class="px-2 text-primary openModalBtn" data-value=\'' + JSON
                            .stringify(element) +
                            '\' data-bs-toggle="modal" data-bs-target="#exampleModal">';
                        row += '<i class="ri-edit-2-fill"></i>';
                        row += '</a>';
                        row += '</li>';
                        row += '<li class="list-inline-item">';
                        row += '<a href="#" onclick="confirmDelete(' + element.id +
                            ')" class="px-2 text-danger">';
                        row += '<i class="ri-delete-bin-fill"></i>';
                        row += '</a>';
                        row += '</li>';
                        row += '</ul>';
                        row += '</td>';
                        row += '</tr>';
                        $('#table-body').append(row);
                    });
                }
            });
        });

        //Edit Functionality
        var data = @json($attributesdata);
        $('#table-body').on('click', '.openModalBtn', function() {
            var recordId = $(this).data('value');
            console.log(recordId);
            $('#modalbody').empty();

            //Getting Service Names from master
            var options = `<option value="">--select service name--</option>`;
            data.forEach(function(row) {
                console.log(row.label);
                options +=
                    `<option value="${row.label}" ${recordId.servicename === row.label ? 'selected' : ''}>${row.label}</option>`;
            });

            var modalbody = `
                       <div class="">
                        <div class="card-body">
                                <div class="mb-3 row">
                                    <div class="col-lg-6">
                                        <label class="">Select Type</label>
                                        <input class="form-control mb-3" placeholder="enter label" name="value" type="text"
                                            value="${recordId.type}" id="example-text-input" required disabled>
                                        <input type="hidden" name="attributeid" value="${recordId.id}"
                                                    id="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="">Select Service Name</label>
                                        <select name="servicename" class="form-select" required>
                                            ${options}
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="example-text-input" class="">Value</label>
                                        <input class="form-control mb-3" placeholder="enter label" name="value" type="text"
                                            value="${recordId.value}" id="example-text-input" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="">Select Input Type</label>
                                        <select name="inputtype" class="form-select" id="inputtypeid" required>
                                            <option value="" ${recordId.inputtype == '' ? 'selected' : ''}>--select input type--</option>
                                            <option value="text" ${recordId.inputtype == 'text' ? 'selected' : ''}>Text</option>
                                            <option value="email" ${recordId.inputtype == 'email' ? 'selected' : ''}>Email</option>
                                            <option value="checkbox" ${recordId.inputtype == 'checkbox' ? 'selected' : ''}>Checkbox</option>
                                            <option value="file" ${recordId.inputtype == 'file' ? 'selected' : ''}>File</option>
                                            <option value="textarea" ${recordId.inputtype == 'textarea' ? 'selected' : ''}>Textarea</option>
                                            <option value="number" ${recordId.inputtype == 'number' ? 'selected' : ''}>Number</option>
                                            <option value="url" ${recordId.inputtype == 'url' ? 'selected' : ''}>URL</option>
                                        </select>
                        </div>
                            </div>
                        </div>
                </div>
            `;
            $('#modalbody').append(modalbody);
        });
    </script>
    <script>
        function labelValue() {
            var label = document.getElementById('labelval').value;
            document.getElementById('valueval').value = label;
        }
    </script>
</x-app-layout>
