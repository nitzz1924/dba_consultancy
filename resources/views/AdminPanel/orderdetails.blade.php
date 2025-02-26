{{-- ---------------------------------------------------🙏अंतः अस्ति प्रारंभः🙏--------------------------- --}}
<x-app-layout>
    @section('title', 'Order Details')
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
            <div class="col-xl-9">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title flex-grow-1 mb-0">Order #{{ $orderdetails->id }}</h5>
                            <div class="flex-shrink-0">
                                <a href="{{ url()->previous() }}" class="btn btn-dark btn-sm"><i
                                        class="ri-arrow-left-fill align-middle me-1"></i> Go back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-card">
                            <table class="table table-nowrap align-middle table-borderless mb-0">
                                <thead class="table-light text-muted">
                                    <tr>
                                        <th scope="col">Service Details</th>
                                        <th scope="col">Service Charge</th>
                                        <th scope="col" class="text-end">Total Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-md bg-light rounded p-1">
                                                    <img src="{{ asset('assets/images/Services/' . $orderdetails->serviceimage) }}"
                                                        alt="" class="img-fluid d-block">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="fs-14 text-body">{{ $orderdetails->servicename }}</h5>
                                                    <p class="text-muted mb-0">{{ $orderdetails->formtype }}</p>
                                                    <span
                                                        class="text-muted mb-0">{{ $orderdetails->created_at->format('d M Y') }}</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>₹ {{ $orderdetails->servicecharge }}/-</td>
                                        <td class="fw-medium text-end">
                                            @php $total = $orderdetails->servicecharge - $orderdetails->discount @endphp
                                            ₹ {{ $total }}/-
                                        </td>
                                    </tr>
                                    <tr class="border-top border-top-dashed">
                                        <td colspan="3"></td>
                                        <td colspan="2" class="fw-medium p-0">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total :</td>
                                                        <td class="text-end">₹ {{ $orderdetails->servicecharge }}/-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount:</td>
                                                        <td class="text-end">-₹ {{ $orderdetails->discount }}/-</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed">
                                                        <th scope="row">Total (₹) :</th>
                                                        <th class="text-end">₹ {{ $total }}/-</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-sm-flex align-items-center">
                                    <h5 class="card-title flex-grow-1 mb-0">Form Details</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                @php
                                    $formdata = json_decode($orderdetails->formdata, true);
                                @endphp
                                <table class="table table-bordered border-light">
                                    <tbody>
                                        @foreach ($formdata as $data)
                                        @if ($data['label'] !== '_token')
                                        <tr>
                                            <td>{{ $data['label'] }}</td>
                                            <td>
                                                @php
                                                    $filePath = asset('assets/images/users/' . $data['value']);
                                                    $fileExtension = pathinfo($data['value'], PATHINFO_EXTENSION);
                                                    $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                @endphp
        
                                                @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                    <div>
                                                        <img src="{{ $filePath }}" alt="{{ $data['label'] }}"
                                                            style="width: 100px; height: 100px; object-fit: cover;">
                                                    </div>
                                                    <a href="{{ $filePath }}" download="{{ $data['value'] }}"
                                                        class="btn btn-dark btn-sm mt-2">Download</a>
                                                @elseif (strtolower($fileExtension) === 'pdf')
                                                    <!-- Display PDF in iframe with download link -->
                                                    <iframe src="{{ $filePath }}"
                                                        style="width: 100%; height: 200px; border: none;"></iframe>
                                                    <a href="{{ $filePath }}" download="{{ $data['value'] }}"
                                                        class="btn btn-dark btn-sm mt-2">Download PDF</a>
                                                @else
                                                    {{ $data['value'] }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex">
                                    <h5 class="card-title flex-grow-1 mb-0">Submitted by Admin</h5>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="alert alert-info" role="alert">
                                    Note: {{$orderdetails->note}}
                                </div>
                                <hr>
                                <ul class="list-unstyled mb-0 vstack gap-3">
                                    @php
                                        $documents = explode(',', $orderdetails->documents);
                                    @endphp
                                        @foreach ($documents as $document)
                                            @php
                                                $fileExtension = pathinfo($document, PATHINFO_EXTENSION);
                                                $imageExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                            @endphp
                                            <li>
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0">
                                                        @if (in_array(strtolower($fileExtension), $imageExtensions))
                                                            <img src="{{ asset($document) }}" alt="" class="avatar-sm rounded img-fluid">
                                                        @elseif (strtolower($fileExtension) === 'pdf')
                                                            <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png" alt="PDF Icon" class="avatar-sm rounded img-fluid">
                                                        @else
                                                            <img src="{{ asset('assets/images/file-icon.png') }}" alt="File Icon" class="avatar-sm rounded img-fluid">
                                                        @endif
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="fs-14 mb-1">{{ basename($document) }}</h6>
                                                        <a href="{{ asset($document) }}" download class="btn btn-dark btn-sm mt-2">Download</a>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                
            </div>
            </div>
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5 class="card-title flex-grow-1 mb-0">Customer Details</h5>
                            <div class="flex-shrink-0">
                                <a href="javascript:void(0);" class="link-secondary">View Profile</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0 vstack gap-3">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset('assets/images/defaultuser.png') }}" alt=""
                                            class="avatar-sm rounded">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ $orderdetails->username }}</h6>
                                        <p class="text-muted mb-0">Customer</p>
                                    </div>
                                </div>
                            </li>
                            <li><i
                                    class="ri-mail-line me-2 align-middle text-muted fs-16"></i>{{ $orderdetails->email }}
                            </li>
                            <li><i class="ri-phone-line me-2 align-middle text-muted fs-16"></i>+(91)
                                {{ $orderdetails->mobilenumber }}
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{route('updateorderstatus')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex">
                                <h5 class="card-title flex-grow-1 mb-0">Update Order Status and Upload Documents</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="orderStatus" class="form-label">Order Status</label>
                                <select name="status" class="form-select orderstatus" id="orderStatus"
                                    aria-label="Default select example">
                                    <option>--select to change--</option>
                                    <option value="Cancel" {{ $orderdetails->status == 'Unpaid' ? 'selected' : '' }}>
                                        Unpaid
                                    </option>
                                    <option value="Cancel" {{ $orderdetails->status == 'Cancel' ? 'selected' : '' }}>
                                        Cancel
                                    </option>
                                    <option value="Hold" {{ $orderdetails->status == 'Hold' ? 'selected' : '' }}>On Hold
                                    </option>
                                    <option value="Processing" {{ $orderdetails->status == 'Processing' ? 'selected' : '' }}>
                                        Processing</option>
                                    <option value="Completed" {{ $orderdetails->status == 'Completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="uploadDocuments" class="form-label">Select Documents <span class="fw-bold">(You can select multiple documents)</span> </label>
                                <input class="form-control" type="file" id="uploadDocuments" name="documents[]" multiple
                                    accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.xls,.xlsx">
                            </div>
                            <div class="mb-3">
                                <label for="note" class="form-label">Write Note</label>
                                <input class="form-control" type="text" placeholder="Write a Note......." id="note"
                                    name="note">
                            </div>
                            <input type="hidden" id="purchaseid" name="purchaseid" value="{{ $orderdetails->id }}">
                            <input type="hidden" id="servicetotal" name="servicetotal" value="{{ $total }}">
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-success ">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--Order Status-->
     {{-- <script>
        $(document).ready(function () {
            $('.orderstatus').on('change', function () {
                var selectedStatus = $(this).val();
                var userid = $('#userid').val();
                console.log(selectedStatus, userid);
                Swal.fire({
                    title: "Update Order Status",
                    text: "Are you sure you want to update the Order status?",
                    icon: "info",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, update it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/updateorderstatus',
                            method: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}',
                                status: selectedStatus,
                                record_id: userid
                            },
                            success: function (response) {
                                if (response.success) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Status Updated..!",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "/admin/customersallorders";
                                        }
                                    });
                                } else {
                                    Swal.fire("Error", "Failed to update Order status.", "error");
                                }
                            },
                            error: function (xhr, status, error) {
                                let errorMessage = xhr.responseJSON?.message || error || "An unknown error occurred.";
                                Swal.fire("Error", errorMessage, "error");
                            }
                        });
                    }
                });
            });
        });
    </script> --}}
</x-app-layout>