@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Order Details | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid  p-4 desktop-view">
        <div class="row my-3">
            <div class="wallet-box">
                <div class="balance text-white text-center">
                    <div class="d-flex flex-row justify-content-start align-items-center ">
                        <div class="col-md-3">
                            <div class="card mb-1 rounded-4">
                                <div class="card-body p-1">
                                    <img src="{{ asset('assets/images/Services/' . $purchasedata->iconimage) }}"
                                        alt="icon" class="img-fluid" width="75">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 px-3">
                            <div class="fs-2 fw-bold text-start wallet-amount">
                                Order Details
                            </div>
                            <div class="fs-5 text-start">
                                Service: {{ $purchasedata->servicename }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="rounded-4" style="background-color: #ffffff;">
                <div class="p-3">
                    <div class="fs-4 fw-bold text-center">ORDER SUMMARY</div>
                    @php
                        $servicesum = intval($purchasedata->servicecharge) - intval($purchasedata->discount);
                    @endphp
                    @if ($walletamount < $servicesum && $purchasedata->status == 'Unpaid')
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                Toastify({
                                    text: "Insufficient Balance !, Please Recharge",
                                    gravity: "top",
                                    position: "center",
                                    style: {
                                        background: "#dc3545",
                                        color: "#ffffff",
                                    },
                                    duration: 5000
                                }).showToast();
                            });
                        </script>
                        <div class="p-3">
                            <!-- Danger Alert -->
                            <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                                <div>
                                    <i class="ri-error-warning-line  fs-4 me-1 fw-bold align-middle"></i>
                                    <span class="fs-4 fw-bold">
                                        Insufficient balance.
                                    </span>

                                    <div class="text-dark">
                                        You can proceed and pay later.
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <a href="/wallet" class="text-white fw-bold  btn btn-danger rounded-4">
                                        Recharge Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Wallet Balance
                            </div>
                            <div class="p-1">
                                ₹ {{ number_format($walletamount, 2) }}/-
                            </div>
                        </div>
                        <hr>
                        <div class="fw-bold text-center">Service</div>
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                {{ $purchasedata->servicename }}
                            </div>
                            <div class="p-1">
                                ₹ {{ $purchasedata->servicecharge }}/-
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Discount
                            </div>
                            <div class="p-1">
                                - ₹ {{ $purchasedata->discount }}/-
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Grand Total
                            </div>
                            <div class="p-1">
                                <div class="fw-bold">₹ {{ $servicesum }}/-</div>
                            </div>
                        </div>
                    </div>
                    @if ($purchasedata->status == 'Processing')
                        <div class="mt-2 p-2 text-center">
                            <span class="badge bg-success-subtle text-success fs-5 badge-border">Order is fully paid</span>
                        </div>
                    @elseif($purchasedata->status == 'Hold')
                        <div class="mt-2 p-3 bg-danger-subtle border-danger border-dashed border-2 rounded-3">
                            <div class="badge bg-danger fs-5 badge-border text-center fw-bold mb-2">
                                Action pending!
                            </div>
                            <div>
                                <div class="">
                                    Note: {{ $purchasedata->note }}
                                </div>
                                <hr>
                                <div class="">
                                    Documents:
                                </div>
                                <ul class="list-unstyled mb-0 vstack gap-3">
                                    @php
                                        $documents = explode(',', $purchasedata->documents);
                                    @endphp
                                    @foreach ($documents as $document)
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <a href="{{ asset($document) }}"
                                                        data-glightbox="title: {{ basename($document) }}">
                                                        <img src="{{ asset($document) }}" alt=""
                                                            class="avatar-sm rounded img-fluid">
                                                    </a>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-1" title="{{ basename($document) }}">
                                                        {{ Str::limit(basename($document), 20) }}</h6>
                                                    <a href="{{ asset($document) }}" download
                                                        class="btn btn-dark btn-sm mt-2">Download</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @elseif($purchasedata->status == 'Completed')
                        <div class="mt-3 text-center" style="background-color: antiquewhite;">
                            This Order was Completed on : <span
                                class="fw-bold">{{ $purchasedata->updated_at->format('d/m/y') }}</span>
                        </div>
                        <div class="mt-2 p-2 text-center">
                            <span class="badge bg-success-subtle text-success fs-5 badge-border">Order Completed</span>
                        </div>
                        <hr>
                        <div class="mt-2 p-3 bg-success-subtle border-success border-dashed border-2 rounded-3">
                            <div class="badge bg-success fs-5 badge-success text-center fw-bold mb-2">
                                Final documents produce
                            </div>
                            <div>
                                <div class="">
                                    Note: {{ $purchasedata->note }}
                                </div>
                                <hr>
                                <ul class="list-unstyled mb-0 vstack gap-3">
                                    @php
                                        $documents = explode(',', $purchasedata->documents);
                                    @endphp
                                    @foreach ($documents as $document)
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="flex-shrink-0">
                                                    <a href="{{ asset($document) }}"
                                                        data-glightbox="title: {{ basename($document) }}">
                                                        <img src="{{ asset($document) }}" alt=""
                                                            class="avatar-sm rounded img-fluid">
                                                    </a>
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <h6 class="fs-14 mb-1" title="{{ basename($document) }}">
                                                        {{ Str::limit(basename($document), 20) }}</h6>
                                                    <a href="{{ asset($document) }}" download
                                                        class="btn btn-dark btn-sm mt-2">Download</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    @endif



                </div>
            </div>
        </div>

        @if ($purchasedata->status != 'Completed')
            <div class="row my-3">
                <div class="card mt-0 rounded-4">
                    <div class="card-body">
                        @if (!$purchasedata)
                            <div class="sectionHeading text-center">
                                <img class="img-fluid" src="{{ asset('assets/images/Services/coming-soon.png') }}"
                                    alt="">
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="/servicedetail/{{ $purchasedata->serviceid }}"><button
                                        class="btn btn-sm text-decoration-underline">Go
                                        Back</button></a>
                                <a href="/allservices"><button class="btn btn-sm text-decoration-underline">Check other
                                        Services</button></a>
                            </div>
                        @else
                            <form id="originalform" enctype="multipart/form-data">
                                @csrf
                                @php
                                    $formdata = json_decode($finalJson, true);
                                    //dd($formdata);
                                @endphp
                                @foreach ($formdata as $data)
                                    @if ($data['label'] !== '_token')
                                        <!-- Exclude _token -->
                                        @if ($data['type'] != 'textarea' && $data['type'] != 'file')
                                            <div
                                                class="{{ $data['type'] == 'checkbox' ? 'form-check' : 'form-floating' }} mb-3 ">
                                                <input type="{{ $data['type'] }}"
                                                    class="{{ $data['type'] == 'checkbox' ? 'form-check-input' : 'form-control' }}"
                                                    id="{{ $data['label'] }}" name="{{ $data['label'] }}"
                                                    value="{{ $data['value'] }}" placeholder="Username" required>

                                                <label class="{{ $data['type'] == 'checkbox' ? 'form-check-label' : '' }}"
                                                    for="{{ $data['label'] }}">{{ $data['label'] }}</label>
                                            </div>
                                        @elseif ($data['type'] == 'file')
                                            <div class="mb-3 text-center">
                                                <label for="{{ $data['label'] }}"
                                                    class="form-label">{{ $data['label'] }}</label>
                                                <input class="form-control form-control-lg" name="{{ $data['label'] }}"
                                                    id="{{ $data['label'] }}" type="file"
                                                    onchange="previewFile(event)" value="{{ $data['value'] }}">
                                                <input type="hidden" name="file_{{ $data['label'] }}"
                                                    value="{{ $data['value'] }}">
                                            </div>
                                              <div id="filePreview" style="margin-top: 20px;"></div>
                                            <div class="text-center mb-3">
                                                <!-- Image Preview -->
                                                <img id="imagePreview"
                                                    src="{{ !empty($data['value']) && in_array(pathinfo($data['value'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']) ? asset('assets/images/users/' . $data['value']) : '' }}"
                                                    alt="Profile Image Preview" class="border"
                                                    style="display: {{ !empty($data['value']) && in_array(pathinfo($data['value'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']) ? 'block' : 'none' }};
                                                        width: 100%;
                                                        border-radius: 5%;
                                                        object-fit: cover;
                                                        margin-inline: auto;">

                                                <!-- PDF Icon & Name Preview -->
                                                <div id="pdfPreview" class="text-start"
                                                    style="display: {{ !empty($data['value']) && pathinfo($data['value'], PATHINFO_EXTENSION) === 'pdf' ? 'block' : 'none' }};">
                                                    <img src="https://cdn-icons-png.flaticon.com/512/337/337946.png"
                                                        alt="PDF Icon" style="width: 40px; height: 40px;">
                                                    <div>{{ basename($data['value']) }}</div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="form-floating mb-3">
                                                <textarea class="form-control" placeholder="Enter your address" id="{{ $data['label'] }}"
                                                    name="{{ $data['label'] }}" style="height: 100px">{{ $data['value'] }}</textarea>
                                                <label for="{{ $data['label'] }}">{{ $data['label'] }}</label>
                                            </div>
                                        @endif
                                    @endif
                                @endforeach

                                <!--Sending Necessary Things in form-->

                                <input type="hidden" name="formtype" id="formtype" value="{{ $purchasedata->type }}">
                                <input type="hidden" name="orderid" id="orderid" value="{{ $purchasedata->id }}">
                                <input type="hidden" name="serviceid" id="serviceid"
                                    value="{{ $purchasedata->serviceid }}">
                                <input type="hidden" name="servicename" id="servicename"
                                    value=" {{ $purchasedata->servicename }}">
                                <input type="hidden" name="amount" id="amount"
                                    value="{{ $purchasedata->servicecharge }}">
                                <input type="hidden" name="discount" id="amount"
                                    value="{{ $purchasedata->discount }}">
                                <button onclick="confirmInsert(' {{ $purchasedata->servicename }}')" type="button"
                                    class="btn btn-outline-danger shadow rounded-pill w-100">Submit</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @endif
    </div>

    {{-- JavaScript for Image Preview --}}
    <script>
        function previewFile(event) {
        const file = event.target.files[0];
        const output = document.getElementById('filePreview');

        // Clear previous content
        output.innerHTML = '';

        if (!file) return;

        const fileType = file.type;
        console.log("Selected file type:", fileType); // Debugging

        if (fileType.startsWith('image/')) {
            // Handle image preview
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.createElement('img');
                img.src = reader.result;
                img.alt = "Image Preview";
                img.style.maxWidth = "50px";
                img.style.maxHeight = "150px";
                output.appendChild(img);
            };
            reader.readAsDataURL(file);
        } else if (fileType === 'application/pdf') {
            // Show PDF icon & name instead of preview
            const pdfContainer = document.createElement('div');
            pdfContainer.style.display = "flex";
            pdfContainer.style.alignItems = "center";
            pdfContainer.style.gap = "10px";

            const pdfIcon = document.createElement('img');
            pdfIcon.src = "https://cdn-icons-png.flaticon.com/512/337/337946.png"; // PDF icon URL
            pdfIcon.alt = "PDF Icon";
            pdfIcon.style.width = "40px";
            pdfIcon.style.height = "40px";

            const fileName = document.createElement('span');
            fileName.textContent = file.name;
            fileName.style.fontSize = "16px";
            fileName.style.fontWeight = "bold";

            pdfContainer.appendChild(pdfIcon);
            pdfContainer.appendChild(fileName);

            output.appendChild(pdfContainer);
        } else {
            // Fallback for unsupported file types
            const message = document.createElement('p');
            message.textContent = "Preview not available for this file type.";
            output.appendChild(message);
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 2000);

        setTimeout(function() {
            $('#dangerAlert').fadeOut('slow');
        }, 2000);
    </script>
    {{-- Updating Form by AJAX --}}
    <script>
        function confirmInsert(servicename) {
            Swal.fire({
                    title: "Are you sure?",
                    html: "You want to Update <strong style='color: black; font-weight:bold;'>" + servicename +
                        "</strong> ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes",
                    cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        const formtype = $('#formtype').val();
                        const servicename = $('#servicename').val();
                        const amount = $('#amount').val();
                        const orderid = $('#orderid').val();
                        const serviceid = $('#serviceid').val();
                        console.log(orderid);
                        var formData = new FormData(document.getElementById('originalform'));
                        formData.append('formtype', formtype);
                        formData.append('servicename', servicename);
                        formData.append('amount', amount);
                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                        jQuery.ajax({
                            url: "{{ url('updateserviceform') }}",
                            type: 'post',
                            data: formData,
                            processData: false, // this is to be false in case of form data
                            contentType: false,
                            success: function(data) {
                                if (data) {
                                    console.log("Final data" + data);
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Service Updated..!",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "/proceedtopay/" + orderid;
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: "Error!",
                                        text: "There was an issue with your submission.",
                                        icon: "error",
                                        confirmButtonText: "OK"
                                    });
                                }
                            }
                        });
                    }
                });
        }
    </script>

@endsection
