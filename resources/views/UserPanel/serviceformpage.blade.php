@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Buy Service | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid  p-4 desktop-view">
        <div class="row my-3">
            <div class="wallet-box">
                <div class="balance text-white text-center">
                    <div class="d-flex flex-row justify-content-center align-items-center ">
                        <div class="col-md-3">
                            <div class="card mb-1 rounded-4">
                                <div class="card-body p-1">
                                    <img src="{{ asset('assets/images/Services/' . $masterdata->iconimage) }}" alt="icon"
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 px-3">
                            <div class="mt-2 text-start service-name">{{ $masterdata->type }}</div>
                            <div class="fs-3 text-start">
                                {{ $pricingdata->servicename }}
                            </div>
                            <div class="fs-5 text-start">
                                ₹ {{ $pricingdata->price }}/-
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
                    <div class="">
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Wallet Balance
                            </div>
                            <div class="p-1">
                                Rs. Total
                            </div>
                        </div>
                        <hr>
                        <div class="fw-bold text-center">Service</div>
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                {{ $pricingdata->servicename }}
                            </div>
                            <div class="p-1">
                                ₹ {{ $pricingdata->price }}/-
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="p-1">
                                Discount
                            </div>
                            <div class="p-1">
                                - ₹ {{ $pricingdata->disprice }}/-
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
                                @php
                                    $sum = intval($pricingdata->price) - intval($pricingdata->disprice);
                                @endphp
                                <div class="fw-bold">₹ {{ $sum }}/-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- History --}}
        <div class="row my-3">
            <div class="card mt-0 rounded-4">
                <div class="card-body">
                    @if ($formattributes->isEmpty())
                        <div class="sectionHeading text-center">
                            <img class="img-fluid" src="{{ asset('assets/images/Services/coming-soon.png') }}"
                                alt="">
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="/servicedetail/{{ $serviceid }}"><button
                                    class="btn btn-sm text-decoration-underline">Go
                                    Back</button></a>
                            <a href="/allservices"><button class="btn btn-sm text-decoration-underline">Check other
                                    Services</button></a>
                        </div>
                    @else
                        <form id="originalform" enctype="multipart/form-data">
                            @csrf
                            @foreach ($formattributes as $data)
                                @if ($data->inputtype != 'textarea' && $data->inputtype != 'file')
                                    <div
                                        class="{{ $data->inputtype == 'checkbox' ? 'form-check' : 'form-floating' }} mb-3 ">
                                        <input type="{{ $data->inputtype }}"
                                            class="{{ $data->inputtype == 'checkbox' ? 'form-check-input' : 'form-control' }}"
                                            id="{{ $data->value }}" name="{{ $data->value }}"
                                            data-inputs="{{ $data->inputtype }}" placeholder="Username" required>
                                        <label class="{{ $data->inputtype == 'checkbox' ? 'form-check-label' : '' }}"
                                            for="{{ $data->value }}">{{ $data->value }}</label>
                                    </div>
                                @elseif($data->inputtype == 'file')
                                    <div class="mb-3 text-start">
                                        <label for="{{ $data->value }}" class="form-label">{{ $data->value }}</label>
                                        <input class="form-control form-control-lg" data-inputs="{{ $data->inputtype }}"
                                            name="{{ $data->value }}" id="{{ $data->value }}" type="file"
                                            onchange="previewFile(event)" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx">
                                    </div>
                                    <div id="filePreview" style="margin-top: 20px;"></div>
                                    <div class="text-center mb-3">
                                        <img id="imagePreview" src="/assets/images/users/user-dummy-img.jpg"
                                            alt="Profile Image Preview" class="border"
                                            style="display: none; width: 100%;  border-radius: 5%; object-fit: cover; margin-inline: auto;">
                                    </div>
                                @else
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" data-inputs="{{ $data->inputtype }}" placeholder="Enter your address"
                                            id="{{ $data->value }}" name="{{ $data->value }}" style="height: 100px"></textarea>
                                        <label for="{{ $data->value }}">{{ $data->value }}</label>
                                    </div>
                                @endif
                            @endforeach
                            <input type="hidden" name="formtype" id="formtype" value="{{ $masterdata->type }}">
                            <input type="hidden" name="serviceid" id="formtype" value="{{ $masterdata->id }}">
                            <input type="hidden" name="servicename" id="servicename"
                                value=" {{ $pricingdata->servicename }}">
                            <input type="hidden" name="amount" id="amount" value="{{ $pricingdata->price }}">
                            <input type="hidden" name="discount" id="amount" value="{{ $pricingdata->disprice }}">
                            <button onclick="confirmInsert(' {{ $pricingdata->servicename }}')" type="button"
                                class="btn btn-outline-danger shadow rounded-pill w-100">Buy Now</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- JavaScript for Image Preview --}}
    <script>
        function previewFile(event) {
            const file = event.target.files[0];
            const output = document.getElementById('filePreview');

            // Ensure output element is cleared for new preview
            output.innerHTML = '';

            if (!file) return;

            const fileType = file.type;

            if (fileType.startsWith('image/')) {
                // Handle image preview
                const reader = new FileReader();
                reader.onload = function() {
                    const img = document.createElement('img');
                    img.src = reader.result;
                    img.alt = "Image Preview";
                    img.style.maxWidth = "100%";
                    img.style.maxHeight = "300px";
                    output.appendChild(img);
                };
                reader.readAsDataURL(file);
            } else if (fileType === 'application/pdf') {
                // Handle PDF preview
                const url = URL.createObjectURL(file);
                const iframe = document.createElement('iframe');
                iframe.src = url;
                iframe.style.width = "100%";
                iframe.style.height = "400px";
                iframe.frameBorder = "0";
                output.appendChild(iframe);
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
    {{-- Submitting Form by AJAX --}}
    <script>
        function confirmInsert(servicename) {
            const form = document.getElementById('originalform');
            let missingFields = [];

            // Check each required input and collect those that are empty
            Array.from(form.elements).forEach(element => {
                if (element.hasAttribute('required') && !element.value.trim()) {
                    const label = form.querySelector(`label[for='${element.id}']`);
                    if (label) {
                        missingFields.push(label.innerText);
                    } else {
                        missingFields.push(element.name);
                    }
                }
            });

            if (missingFields.length > 0) {
                // If there are missing required fields, show an alert listing them
                Swal.fire({
                    title: "Incomplete Form",
                    html: "Please fill in the following required fields:<br><strong>" + missingFields.join(", ") +
                        "</strong>",
                    icon: "warning",
                    confirmButtonText: "OK"
                });
                return; // Stop further execution if the form is incomplete
            }

            // If the form is valid, proceed with the SweetAlert confirmation dialog
            Swal.fire({
                    title: "Are you sure?",
                    html: "You want to Order <strong style='color: black; font-weight:bold;'>" + servicename +
                        "</strong> ?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#28a745",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, proceed",
                    cancelButtonText: "Cancel"
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        const formtype = $('#formtype').val();
                        const servicename = $('#servicename').val();
                        const amount = $('#amount').val();
                        var formData = new FormData(document.getElementById('originalform'));
                        formData.append('formtype', formtype);
                        formData.append('servicename', servicename);
                        formData.append('amount', amount);
                        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                        jQuery.ajax({
                            url: "{{ url('insertserviceform') }}",
                            type: 'post',
                            data: formData,
                            processData: false, // this is to be false in case of form data
                            contentType: false,
                            success: function(data) {
                                if (data) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Service Purchased..!",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href = "/orderpage";
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
