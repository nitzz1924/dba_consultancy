@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Service Detail | DBA Consultancy</title>
@endpush
@section('content')
    <div class="container-fluid desktop-view">
        {{-- Header bar --}}
        <div class="row"
            style="
                background-image: url('/assets/images/service-bg.png');
                background-size: cover;
                background-position: bottom;
                height: 250px;
                padding: 15px;
                display: flex;
                /* align-items: center; */
            ">
            <div class="col-8">
                <div class="d-flex justify-content-start align-items-center">
                    <div class="ms-1 fs-4 text-white">
                        Services View Section
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex justify-content-end">
                    <div class="p-2">
                        <i class='bx bx-arrow-back fs-3 text-white'></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Wallet box --}}
        <div class="row mt-n5 ">
            <div class="serviceHeading mb-3">
                Service Name
            </div>
            <div class="col-6 text-start align-items-center">
                <div class="fs-3 fw-bold">
                    ₹7,500
                </div>
            </div>
            <div class="col-6 text-center">
                <a href="#">
                    <div class="btn btn-light rounded-pill fs-6 shadow-lg">
                        <i class='bx bx-plus icon-bg text-white p-2 rounded-pill me-1'></i>Buy Now
                    </div>
                </a>
            </div>
        </div>

        {{-- content --}}
        <div class="row">
            <div class="sectionHeading">
                About service
            </div>
            <p>
                Lorem ipsum odor amet, consectetuer adipiscing elit. Consectetur faucibus natoque dis hac efficitur egestas
                ligula dis platea. Facilisi parturient ante primis aliquet velit integer tortor. Rhoncus nostra lacus justo
                sem semper himenaeos nisi. Senectus maecenas habitant parturient; hac torquent lacus eu. Efficitur sem
                finibus dis laoreet himenaeos id molestie. Efficitur curae ex vulputate quis inceptos phasellus fames
                inceptos eu.
                
            </p>
            <p>
                Eros maximus posuere ligula finibus mi torquent; sagittis taciti risus. Massa et vitae tristique faucibus
                venenatis nisl. Sem class quam dis arcu quam. Vivamus vitae commodo fermentum conubia mus proin. Ullamcorper
                vitae quis sodales quisque primis facilisi aptent. Pharetra velit dapibus dis sagittis eros; donec aliquam.
                Arcu cursus bibendum tortor ex luctus ipsum interdum. Venenatis vestibulum tincidunt suspendisse, erat et
                condimentum. Integer mollis adipiscing torquent est dictum maecenas et.
            </p>
        </div>




    </div>
@endsection
