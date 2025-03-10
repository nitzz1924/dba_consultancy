@extends('layouts.UserPanelLayouts.usermain')
@push('title')
    <title>Refer & Earn | DBA Consultancy</title>
@endpush
@section('content')
<div class="p-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 p-0">
                <div>
                    <img src="{{ asset('assets/images/Refer.png') }}" alt="Refer Image" class="img-fluid rounded-3">
                </div>
            </div>
        </div>
    </div>
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-4 p-0">
                <div class="row justify-content-center shadow-lg py-3 rounded-4 bg-white">
                    <div class="">
                        <h5 class="text-success text-center fw-bold">Referral Program Conditions:</h5>
                        @foreach ($referincomedata as $data)
                            <p>
                            <ul class="text-dark fs-5">
                                <li>
                                    <strong>{{$data->incomename}}</strong>
                                    <p>{{$data->lessthangreater}} ₹{{$data->amount}}/- in business: {{$data->criteria}}
                                        referral bonus.</p>
                                </li>
                            </ul>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-2">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-4 p-0">
                <div class="row">
                    <div class="col-xs-12 d-grid justify-items-center">
                        <div class="p-2">
                            <div class="mb-3 text-center fs-5">
                                Your Referral code is
                            </div>

                            <div id="p1" class="mb-3 text-center text-danger shadow-lg bg-white referCode">
                                {{ Auth::guard('customer')->user()->refercode ?? 'Guest' }}
                            </div>
                            <div class="d-flex justify-content-around">
                                <button onclick="copyToClipboard()" class="btn btn-outline-primary fs-4">
                                    Copy Code
                                </button>
                                <button
                                    onclick="shareOnWhatsapp('{{ Auth::guard('customer')->user()->refercode ?? 'Guest' }}')"
                                    class="btn btn-success fs-4">
                                    <i class="bx bxl-whatsapp"></i> Share Code
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    function copyToClipboard() {
            var copyText = document.getElementById("p1").textContent;
            navigator.clipboard.writeText(copyText);
            // alert("Copied the code: " + copyText);
            Toastify({
                text: "Copied to clipboard:" + copyText,
                gravity: "top",
                position: "center",
                style: {
                    background: "green",
                    color: "#ffffff",
                    whiteSpace: "nowrap",
                    borderRadius: "10px",
                    textAlign: "center"
                },
                duration: 5000
            }).showToast();
        }

    function shareOnWhatsapp(referCode) {
        const message = encodeURIComponent(
            `🎉👉 Use my referral code *${referCode}* to sign up and get a Bonus🏆
            Visit our :
            App - https://dbaconsultancy.in/user/registration/?refer=${referCode}
            `
        );
        const whatsappLink = `https://api.whatsapp.com/send/?text=${message}`;
        window.open(whatsappLink, '_blank');
    }
</script>
@endsection