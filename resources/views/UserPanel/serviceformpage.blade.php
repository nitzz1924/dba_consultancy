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
                            Buy {{ $servicename }}
                        </div>
                        <div class="fs-5 text-start">
                            ₹ {{ $serviceprice }}/-
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
                    <img class="img-fluid" src="{{ asset('assets/images/Services/coming-soon.png') }}" alt="">
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/servicedetail/{{ $serviceid }}"><button class="btn btn-sm text-decoration-underline">Go
                            Back</button></a>
                    <a href="/allservices"><button class="btn btn-sm text-decoration-underline">Check other
                            Services</button></a>
                </div>
                @else
                <form id="originalform">
                    @csrf
                    @foreach ($formattributes as $data)
                    @if ($data->inputtype != 'textarea' && $data->inputtype != 'file')
                    <div class="{{ $data->inputtype == 'checkbox' ? 'form-check' : 'form-floating' }} mb-3 ">
                        <input type="{{ $data->inputtype }}"
                            class="{{ $data->inputtype == 'checkbox' ? 'form-check-input' : 'form-control' }}"
                            id="{{ $data->value }}" name="{{ $data->value }}" placeholder="Username" required>
                        <label class="{{ $data->inputtype == 'checkbox' ? 'form-check-label' : '' }}"
                            for="{{ $data->value }}">{{ $data->value }}</label>
                    </div>
                    @elseif($data->inputtype == 'file')
                    <div class="mb-3 text-center">
                        <label for="{{ $data->value }}" class="form-label">{{ $data->value }}</label>
                        <input class="form-control form-control-lg" name="{{ $data->value }}" id="{{ $data->value }}"
                            type="file" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <div class="text-center mb-3">
                        <img id="imagePreview" src="/assets/images/users/user-dummy-img.jpg" alt="Profile Image Preview"
                            class="border"
                            style="display: none; width: 100%;  border-radius: 5%; object-fit: cover; margin-inline: auto;">
                    </div>
                    @else
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Enter your address" id="{{ $data->value }}"
                            name="{{ $data->value }}" style="height: 100px"></textarea>
                        <label for="{{ $data->value }}">{{ $data->value }}</label>
                    </div>
                    @endif
                    @endforeach
                    <input type="hidden" name="formtype" id="formtype" value="{{ $masterdata->type }}">
                    <input type="hidden" name="servicename" id="servicename" value="{{ $servicename }}">
                    <input type="hidden" name="amount" id="amount" value="{{ $serviceprice }}">
                    <button onclick="confirmInsert('{{ $servicename }}')" type="button"
                        class="btn btn-outline-danger shadow rounded-pill w-100">Buy Now</button>
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
            html: "You want to Buy <strong style='color: red;'>" + servicename + "</strong> ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#222222",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, proceed",
            cancelButtonText: "Cancel"
        })
        .then((result) => {
            if (result.isConfirmed) {
                const formtype = $('#formtype').val();
                const servicename = $('#servicename').val();
                const amount = $('#amount').val();

                jQuery.ajax({
                    url: "{{ url('insertserviceform') }}",
                    type: 'post',
                    data: {
                        data: jQuery('#originalform').serialize(),  // Serialize the form data
                        formtype: formtype,
                        servicename: servicename,
                        amount: amount,
                        _token: $('meta[name="csrf-token"]').attr('content')  // Add CSRF token directly here
                    },
                    success: function(data) {
                        if (data) {
                            Swal.fire({
                                title: "Success!",
                                text: "Your service has been successfully added.",
                                icon: "success",
                                confirmButtonText: "OK"
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
