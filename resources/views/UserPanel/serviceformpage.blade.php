@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Buy Service | DBA Consultancy</title>
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
                                <img src="{{ asset('assets/images/Services/' . $masterdata->iconimage) }}" alt="icon" class="img-fluid" width="75">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 px-3">
                        <div class="mt-2 text-start service-name">{{ $masterdata->type }}</div>
                        <div class="fs-2 fw-bold text-start">
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
                @php
                $servicesum = intval($pricingdata->price) - intval($pricingdata->disprice);
                @endphp
                @if ($walletamount < $servicesum) <script>
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
            </div>
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
            <div class="pb-2">
                <div class="d-flex justify-content-between">
                    <div class="p-1">
                        Grand Total
                    </div>
                    <div class="p-1">
                        <div class="fw-bold">₹ {{ $servicesum }}/-</div>
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
                    <img class="img-fluid" src="{{ asset('assets/images/Services/coming-soon.png') }}" alt="">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/servicedetail/{{ $serviceid }}"><button class="btn btn-sm text-decoration-underline">Go
                            Back</button></a>
                    <a href="/allservices"><button class="btn btn-sm text-decoration-underline">Check other
                            Services</button></a>
                </div>
                @else
                <form id="originalform" enctype="multipart/form-data">
                    @csrf
                    @foreach ($formattributes as $data)
                    @if ($data->inputtype != 'textarea' && $data->inputtype != 'file')
                    <div class="{{ $data->inputtype == 'checkbox' ? 'form-check' : 'form-floating' }} mb-3 ">
                        <input type="{{ $data->inputtype }}" class="{{ $data->inputtype == 'checkbox' ? 'form-check-input' : 'form-control' }}" id="{{ $data->value }}" name="{{ $data->value }}" data-inputs="{{ $data->inputtype }}" placeholder="Username" required>
                        <label class="{{ $data->inputtype == 'checkbox' ? 'form-check-label' : '' }}" for="{{ $data->value }}">{{ $data->value }}</label>
                    </div>
                    @elseif($data->inputtype == 'file')
                    <div class="mb-3 text-start">
                        <label for="{{ $data->value }}" class="form-label">{{ $data->value }}</label>
                        <input class="form-control form-control-lg" data-inputs="{{ $data->inputtype }}" name="{{ $data->value }}" id="{{ $data->value }}" type="file" onchange="previewFile(event)" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx">
                    </div>
                    <div id="filePreview" style="margin-top: 20px;"></div>
                    <div class="text-center mb-3">
                        <img id="imagePreview" src="/assets/images/users/user-dummy-img.jpg" alt="Profile Image Preview" class="border" style="display: none; width: 100%;  border-radius: 5%; object-fit: cover; margin-inline: auto;">
                    </div>
                    @else
                    <div class="form-floating mb-3">
                        <textarea class="form-control" data-inputs="{{ $data->inputtype }}" placeholder="Enter your address" id="{{ $data->value }}" name="{{ $data->value }}" style="height: 100px"></textarea>
                        <label for="{{ $data->value }}">{{ $data->value }}</label>
                    </div>
                    @endif
                    @endforeach
                    <input type="hidden" name="formtype" id="formtype" value="{{ $masterdata->type }}">
                    <input type="hidden" name="serviceid" id="serviceid" value="{{ $masterdata->id }}">
                    <input type="hidden" name="servicename" id="servicename" value=" {{ $pricingdata->servicename }}">
                    <input type="hidden" name="amount" id="amount" value="{{ $pricingdata->price }}">
                    <input type="hidden" name="discount" id="amount" value="{{ $pricingdata->disprice }}">
                    <button onclick="confirmInsert(' {{ $pricingdata->servicename }}')" type="button" class="btn btn-outline-danger shadow rounded-pill w-100">Buy Now</button>
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
                title: "Incomplete Form"
                , html: "Please fill in the following required fields:<br><strong>" + missingFields.join(", ") +
                    "</strong>"
                , icon: "warning"
                , confirmButtonText: "OK"
            });
            return; // Stop further execution if the form is incomplete
        }

        // If the form is valid, proceed with the SweetAlert confirmation dialog
        Swal.fire({
                title: "Are you sure?"
                , html: "You want to Buy <strong style='color: black; font-weight:bold;'>" + servicename +
                    "</strong> ?"
                , icon: "warning"
                , showCancelButton: true
                , confirmButtonColor: "#28a745"
                , cancelButtonColor: "#d33"
                , confirmButtonText: "Yes, proceed"
                , cancelButtonText: "Cancel"
            })
            .then((result) => {
                if (result.isConfirmed) {
                    const formtype = $('#formtype').val();
                    const serviceid = $('#serviceid').val();
                    console.log(serviceid);
                    const servicename = $('#servicename').val();
                    const amount = $('#amount').val();
                    var formData = new FormData(document.getElementById('originalform'));
                    formData.append('formtype', formtype);
                    formData.append('servicename', servicename);
                    formData.append('amount', amount);
                    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
                    jQuery.ajax({
                        url: "{{ url('insertserviceform') }}"
                        , type: 'post'
                        , data: formData
                        , processData: false, // this is to be false in case of form data
                        contentType: false
                        , success: function(data) {
                            if (data) {
                                Swal.fire({
                                    title: "Success!"
                                    , text: "Service Purchased..!"
                                    , icon: "success"
                                    , confirmButtonText: "OK"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "/proceedtopay/" + serviceid;
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Error!"
                                    , text: "There was an issue with your submission."
                                    , icon: "error"
                                    , confirmButtonText: "OK"
                                });
                            }
                        }
                    });
                }
            });
    }

</script>
@endsection
