
{{-- #---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏---------------------------” --}}
<x-app-layout>
    @section('title', 'Add Pricing Details')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.dataTables.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />



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
                        <form action="{{ route('insertpricingform') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 row">
                                <div class="col-lg-2">
                                    <label for="labelid">Select Service Type</label>
                                    <select name="servicetype" class="form-select" id="servicetypeid" required>
                                        <option value="" selected>--select--</option>
                                        <option value="Services">Services</option>
                                        <option value="Consulting">Consulting</option>
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="labelid">Select Service</label>
                                    <select name="serviceid" class="form-select" id="servicemainid" required>
                                        <option value="">--select service--</option>
                                        {{-- Appends Here --}}
                                    </select>
                                </div>
                                <div class="col-lg-2">
                                    <label for="labelid">Price</label>
                                    <input class="form-control" placeholder="Enter Price" name="price" type="text"
                                        id="labelid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="disprice">Discount Price</label>
                                    <input class="form-control" placeholder="Enter Discount Price" name="disprice"
                                        type="text" id="labelid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="duration">Duration</label>
                                    <input class="form-control" placeholder="Enter Duration" name="duration"
                                        type="text" id="valueid" required>
                                </div>
                                <div class="col-lg-2">
                                    <label for="example-email-input" class="form-label">Upload Cover Image</label>
                                    <input class="form-control" placeholder="postal code" name="coverimage"
                                        type="file" value="" id="example-email-input">
                                </div>
                                <div class="col-lg-6  mt-3">
                                    <label class="form-label">Documets to be Uploaded</label>
                                    <select name="documents[]" class="select2 form-control select2-multiple mb-3"
                                        multiple="multiple" data-placeholder="Choose Documents.......">
                                        @foreach ($masterdata as $value)
                                            <option value="{{ $value->label }}">{{ $value->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <label for="example-email-input" class="form-label">Details</label>
                                    <textarea rows="4" name="details" class="form-control resize-none" placeholder="Your Details..."></textarea>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label for="example-email-input" class="form-label">Note & Requirement</label>
                                    <textarea rows="4" name="notereq" class="form-control resize-none" placeholder="Your Notes..."></textarea>
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
                        <table id="example" class="table table-bordered border-light hover dt-responsive nowrap"
                            style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Service Type</th>
                                    <th>Service Name</th>
                                    <th>Cover Image</th>
                                    <th>Price</th>
                                    <th>Discount Price</th>
                                    <th>Duration</th>
                                    <th>Documents</th>
                                    <th>Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="table-body">
                                @foreach ($pricingdata as $index => $row)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $row->servicetype }}</td>
                                        <td>{{ $row->servicename }}</td>
                                        <td><img src="{{ asset('assets/images/Services/' . $row->coverimage) }}"
                                                alt="Icon Image" width="60"></td>
                                        <td>{{ $row->price }}</td>
                                        <td>{{ $row->disprice }}</td>
                                        <td>{{ $row->duration }}</td>
                                        <td>{{ implode(', ', json_decode($row->documents)) }}</td>
                                        <td><button class="bg-transparent border-0" role="button"
                                                data-bs-toggle="popover" data-bs-trigger="focus" title=""
                                                data-bs-content="{{ trim($row->details) }}">{{ Str::limit(trim($row->details), 10, '...') }}</button>
                                        </td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="#" data-bs-toggle="modal"
                                                        data-bs-target="#myModal"
                                                        data-pricing="{{ json_encode($row) }}"
                                                        class="px-2 text-primary fs-5 editbtnmodal"><i
                                                            class="ri-edit-2-fill" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Edit"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <button type="button" class="btn text-danger fs-5"
                                                        onclick="confirmDelete('{{ $row->id }}','{{ $row->servicename }}')">
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
        <div id="myModal" class="modal fadeInRight" tabindex="-1" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content rounded-2">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel fs-5 fw-bold text-black">Edit Pricing Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <form action="{{ route('updatepricingdetails') }}" method="POST" enctype="multipart/form-data">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        function confirmDelete(id, title) {
            Swal.fire({
                    title: "Are you sure?",
                    html: "You want to delete <strong style='color: red;'>" + title + "'s Pricing</strong>?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#222222",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "/deletepricing/" + id;
                    }
                });
        }
    </script>
    <script>
        //This function is for blade file
        $(document).on('change', '#servicetypeid', function() {
            var selectedtype = $(this).val();
            console.log(selectedtype);
            $.ajax({
                url: "/filtertype/" + selectedtype,
                type: "GET",
                success: function(data) {
                    console.log(data);
                    var dropdown1 = $('#servicemainid');
                    dropdown1.empty();
                    dropdown1.append($('<option selected>Choose...</option>'));
                    data.forEach(function(item) {
                        dropdown1.append($('<option value="' + item.id + '">' + item.label +
                            '</option>'));
                    });
                }
            });
        });

        


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

        //Showing Image Preview after selecting....
        function readURL(input) {
            console.log(input);
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagemain').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>  

    <script>
    $(document).ready(function() {
            // Function for Modal Service Type Change
            $(document).on('change', '#servicetypeidnew', function() {
                var selectedtype = $(this).val();
                console.log("Selected Type: ", selectedtype);

                $.ajax({
                    url: "/filtertype/" + selectedtype,
                    type: "GET",
                    success: function(data) {
                        console.log("Service Data: ", data);

                        var dropdown1 = $('#servicemainidnew');
                        dropdown1.empty();
                        dropdown1.append('<option selected>Choose...</option>');

                        data.forEach(function(item) {
                            dropdown1.append(`<option value="${item.id}">${item.label}</option>`);
                        });
                    }
                });
            });

            // Initialize Select2 inside modal properly
            $('#myModal').on('shown.bs.modal', function () {
                $('#documentselect').select2({
                    placeholder: "Select fruits...",
                    allowClear: true,
                    dropdownParent: $('#myModal')
                });
            });

    var masterdata = @json($masterdata);
    var services = @json($services);

    $('#table-body').on('click', '.editbtnmodal', function() {
        const pricingdata = $(this).data('pricing');
        console.log("Pricing Data: ", pricingdata);

        const imageSrc = pricingdata.coverimage ? '{{ asset('assets/images/Services/') }}/' + pricingdata.coverimage : '';
        const selectedDocuments = Array.isArray(pricingdata.documents) 
            ? pricingdata.documents 
            : JSON.parse(pricingdata.documents || "[]");

        console.log("Selected Documents: ", selectedDocuments);
        
        $('#modalbodyedit').empty();

        const modalbody = `
            <div class="mb-3 row">
                <div class="col-lg-6">
                    <label for="servicetypeidnew">Select Service Type</label>
                    <select name="servicetype" class="form-select" id="servicetypeidnew" required>
                        <option value="Services" ${pricingdata.servicetype == 'Services' ? 'selected' : '' }>Services</option>
                        <option value="Consulting" ${pricingdata.servicetype == 'Consulting' ? 'selected' : '' }>Consulting</option>
                    </select>
                    <div class="mt-3">
                        <label for="servicemainidnew">Select Service</label>
                        <select name="serviceid" class="form-select" id="servicemainidnew" required>
                            <option value="">--Select Service--</option>
                            ${services.map(service => 
                                `<option value="${service.id}" ${service.id == pricingdata.serviceid ? 'selected' : ''}>${service.label}</option>`
                            ).join('')}
                        </select>
                    </div>
                     <div class="mt-2 mb-2">
                        <label for="price">Price</label>
                        <input class="form-control" value="${pricingdata.price}" placeholder="Enter Price" name="price" type="text">
                        <input type="hidden" name="pricingid" value="${pricingdata.id}">
                    </div>
                    
                    <div class="mt-2 mb-2">
                        <label for="disprice">Discount Price</label>
                        <input class="form-control" value="${pricingdata.disprice}" placeholder="Enter Discount Price" name="disprice" type="text">
                    </div>
                    
                    <div class="mt-2 mb-2">
                        <label for="duration">Duration</label>
                        <input class="form-control" value="${pricingdata.duration}" placeholder="Enter Duration" name="duration" type="text">
                    </div>
                    <div class="mt-2 mb-2">
                        <label class="form-label">Documents to be Uploaded</label>
                        <select name="documents[]" id="documentselect" class="select2 form-control select2-multiple mb-3" multiple="multiple" data-placeholder="Choose Documents...">
                            ${masterdata.map(doc => 
                                `<option value="${doc.label}" ${selectedDocuments.includes(doc.label) ? 'selected' : ''}>${doc.label}</option>`
                            ).join('')}
                        </select>
                    </div>
                    <div class="mt-2 mb-2">
                        <label for="iconimage">Upload Cover Image</label>
                        <input class="form-control" onchange="readURL(this);" placeholder="Enter value" name="coverimage" type="file">
                    </div>
                </div>
                 <div class="col-lg-6">
                    <div class="img-pre">
                        <img id="imagemain" class="img-fluid" src="${imageSrc}" alt="Cover Image">
                    </div>
                </div>
            </div>

              <div class="row">
                <div class="col-lg-12 mt-2">
                    <label class="form-label">Details</label>
                    <textarea rows="4" name="details" class="form-control resize-none" placeholder="Your Details...">${pricingdata.details}</textarea>
                </div>
                <div class="col-lg-12 mt-2">
                    <label class="form-label">Note & Requirement</label>
                    <textarea rows="4" name="notereq" class="form-control resize-none" placeholder="Your Notes...">${pricingdata.notereq}</textarea>
                </div>
            </div>
        `;

        $('#modalbodyedit').append(modalbody);

        // Initialize Select2 again inside modal after appending content
        $('#documentselect').select2({
            placeholder: "Select fruits...",
            allowClear: true,
            dropdownParent: $('#myModal')
        });

        // Update main dropdown when modal dropdown changes
        $('#documentselect').on('change', function() {
            var updatedFruits = $(this).val();
            $('#fruitSelect').val(updatedFruits).trigger('change');
        });
    });
});
 </script>
</x-app-layout>
