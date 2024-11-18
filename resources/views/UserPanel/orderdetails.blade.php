@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>Order Details | DBA Consultancy</title>
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
                                <img src="{{ asset('assets/images/Services/' . $purchasedata->iconimage) }}" alt="icon"
                                    class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 px-3">
                        <div class="fs-3 text-start wallet-amount">
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
                            @php
                            $sum = intval($purchasedata->servicecharge) - intval($purchasedata->discount);
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
                @if (!$purchasedata)
                <div class="sectionHeading text-center">
                    <img class="img-fluid" src="{{ asset('assets/images/Services/coming-soon.png') }}" alt="">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/servicedetail/{{ $purchasedata->serviceid }}"><button
                            class="btn btn-sm text-decoration-underline">Go
                            Back</button></a>
                    <a href="/allservices"><button class="btn btn-sm text-decoration-underline">Check other
                            Services</button></a>
                </div>
                @else
                <form id="originalform">
                    @csrf
                    @php
                    $formdata = json_decode($purchasedata->formdata, true);
                    // dd($formdata);
                    @endphp
                    @foreach ($formdata as $data)
                    @if ($data['label'] !== '_token')
                    <!-- Exclude _token -->
                    @if ($data['type'] != 'textarea' && $data['type'] != 'file')
                    <div class="{{ $data['type'] == 'checkbox' ? 'form-check' : 'form-floating' }} mb-3 ">
                        <input type="{{ $data['type'] }}"
                            class="{{ $data['type'] == 'checkbox' ? 'form-check-input' : 'form-control' }}"
                            id="{{ $data['label'] }}" name="{{ $data['label'] }}" value="{{ $data['value'] }}"
                            placeholder="Username" required>

                        <label class="{{ $data['type'] == 'checkbox' ? 'form-check-label' : '' }}"
                            for="{{ $data['label'] }}">{{ $data['label'] }}</label>
                    </div>
                    @elseif ($data['type'] == 'file')
                    <div class="mb-3 text-center">
                        <label for="{{ $data['label'] }}" class="form-label">{{ $data['label'] }}</label>
                        <input class="form-control form-control-lg" name="{{ $data['label'] }}"
                            id="{{ $data['label'] }}" type="file" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <div class="text-center mb-3">
                        <img id="imagePreview" src="/assets/images/users/user-dummy-img.jpg" alt="Profile Image Preview"
                            class="border"
                            style="display: none; width: 100%;  border-radius: 5%; object-fit: cover; margin-inline: auto;">
                    </div>
                    @else
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Enter your address" id="{{ $data['label'] }}"
                            name="{{ $data['value'] }}" style="height: 100px">{{ $data['value'] }}</textarea>
                        <label for="{{ $data['label'] }}">{{ $data['label'] }}</label>
                    </div>
                    @endif
                    @endif
                    @endforeach

                    <!--Sending Necessary Things in form-->
                    <input type="hidden" name="formtype" id="formtype" value="{{ $purchasedata->type }}">
                    <input type="hidden" name="serviceid" id="formtype" value="{{ $purchasedata->id }}">
                    <input type="hidden" name="servicename" id="servicename" value=" {{ $purchasedata->servicename }}">
                    <input type="hidden" name="amount" id="amount" value="{{ $purchasedata->servicecharge }}">
                    <input type="hidden" name="discount" id="amount" value="{{ $purchasedata->discount }}">
                    <button onclick="confirmInsert(' {{ $purchasedata->servicename }}')" type="button"
                        class="btn btn-outline-danger shadow rounded-pill w-100">Submit</button>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- JavaScript for Image Preview --}}
<script>
    function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
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

                        jQuery.ajax({
                            url: "{{ url('updateserviceform') }}",
                            type: 'post',
                            data: {
                                data: jQuery('#originalform').serialize(),
                                formtype: formtype,
                                servicename: servicename,
                                amount: amount,
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                if (data) {
                                    Swal.fire({
                                        title: "Success!",
                                        text: "Service Updated..!",
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
