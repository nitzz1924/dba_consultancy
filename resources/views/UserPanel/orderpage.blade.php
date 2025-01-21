@extends('layouts.UserPanelLayouts.usermain')
@push('title')
<title>My Orders | DBA Consultancy</title>
@endpush
@section('content')
<div class="container-fluid  p-4 desktop-view">
    <div class="row my-3">
        <div class="wallet-box">
            <div class="balance text-white text-center">
                <div class="d-flex flex-row justify-content-center align-items-center ">
                    <div class="col-md-3">
                        <div class="bg-white py-2 px-2 mb-1 rounded-4">
                            <div class=" p-1">
                                <img src="{{ asset('assets/images/Services/clipboard.png')}}" alt="icon" width="50"
                                    class="img-fluid" width="75">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9 px-3">
                        <div class="mt-2 text-start wallet-amount">My Orders</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- History --}}
    <div class="row my-3 orders">
        <div class="d-flex justify-content-between align-content-center">
            <div class="sectionHeading">
                Orders List
            </div>
            {{-- <div>
                <a href="#" class="btn btn-outline-dark border-0 fs-6">See more</a>
            </div> --}}
        </div>
        <ul class="nav nav-tabs nav-pills  nav-fill" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Unpaid</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">In Process</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Completed</button>
            </li>
        </ul>
        <div class="tab-content mt-2" id="myTabContent">
            <div class="tab-pane fade show active custom-tab" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                @foreach ($purchasedata as $value)
                @if($value->status == 'Unpaid')
                <a href="{{ route('orderdetails', ['id' => $value->id]) }}" class="text-decoration-none">
                    <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <img src="{{ asset('assets/images/Services/' . $value->iconimage) }}" class="rounded-4"
                                    alt="icon" height="50" width="50">
                            </div>
                            <div class="fs-5 text-dark">
                                {{$value->servicename}}
                                <div class="">
                                    <div class="text-muted fs-6">
                                        Order#{{$value->id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="badge rounded-pill bg-danger-subtle text-danger">{{$value->status}}</span>
                            <div class="text-muted fs-6">
                                {{ $value->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
            <div class="tab-pane fade custom-tab" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                tabindex="0">
                @foreach ($purchasedata as $value)
                @if($value->status == 'Processing')
                <a href="{{ route('orderdetails', ['id' => $value->id]) }}" class="text-decoration-none">
                    <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <img src="{{ asset('assets/images/Services/' . $value->iconimage) }}" class="rounded-4"
                                    alt="icon" height="50" width="50">
                            </div>
                            <div class="fs-5 text-dark">
                                {{$value->servicename}}
                                <div class="">
                                    <div class="text-muted fs-6">
                                        Order#{{$value->id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="badge rounded-pill bg-info-subtle text-info">{{$value->status}}</span>
                            <div class="text-muted fs-6">
                                {{ $value->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                @foreach ($purchasedata as $value)
                @if($value->status == 'Completed')
                <a href="{{ route('orderdetails', ['id' => $value->id]) }}" class="text-decoration-none">
                    <div class="p-2 shadow-lg rounded-4 d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex align-items-center">
                            <div class="me-2">
                                <img src="{{ asset('assets/images/Services/' . $value->iconimage) }}" class="rounded-4"
                                    alt="icon" height="50" width="50">
                            </div>
                            <div class="fs-5 text-dark">
                                {{$value->servicename}}
                                <div class="">
                                    <div class="text-muted fs-6">
                                        Order#{{$value->id}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span class="badge rounded-pill bg-success-subtle text-success">{{$value->status}}</span>
                            <div class="text-muted fs-6">
                                {{ $value->created_at->diffForHumans()}}
                            </div>
                        </div>
                    </div>
                </a>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    setTimeout(function() {
            $('#successAlert').fadeOut('slow');
        }, 2000);

        setTimeout(function() {
            $('#dangerAlert').fadeOut('slow');
        }, 2000);
</script>
@endsection
