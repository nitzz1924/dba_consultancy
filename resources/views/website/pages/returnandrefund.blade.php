@extends('website.layout.websitemain')
@section('title', 'Return and Refund Policy | ' . config('app.name'))
@section('content')

    <!-- Breadcrumb Area -->
    <div id="cr-breadcrumb-area" class="cr-breadcrumb-area section-padding--md">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6 col-md-8">
                    <div class="cr-breadcrumb">
                        <ul class="cr-breadcrumb__pagination">
                            <li>
                                <a href="{{ route('homepage')}}">Home</a>
                            </li>
                            <li>Return and Refund Policy</li>
                        </ul>
                        <h1>Return and Refund Policy</h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Breadcrumb Area -->

    <div class="container py-5">

        <h2>1. Overview</h2>
        <p>At DBA Consultancy, we strive to provide excellent services to our clients. This Return and Refund Policy outlines the terms under which refunds may be granted for our services. Please read this policy carefully before availing of our services.</p>

        <h2>2. Services Not Eligible for Refund</h2>
        <p>The following services are non-refundable:</p>
        <ul>
            <li>Tax filing and consultancy services after submission of documents.</li>
            <li>Loan advisory services after completion of consultation or application process.</li>
            <li>Any services where work has already commenced based on the client’s instructions.</li>
        </ul>

        <h2>3. Refund Eligibility</h2>
        <p>Refunds may be considered under the following circumstances:</p>
        <ul>
            <li>If the service was not initiated due to an error on our part.</li>
            <li>If the client cancels the service before any work has commenced.</li>
            <li>If the client is charged incorrectly due to technical or billing errors.</li>
        </ul>

        <h2>4. Refund Process</h2>
        <p>To request a refund, the client must:</p>
        <ul>
            <li>Contact us at <a href="mailto:info@dbaconsultancy.in">info@dbaconsultancy.in</a> or call us at +91 9460574344 within 7 days of the payment.</li>
            <li>Provide proof of payment and a detailed explanation of the reason for the refund request.</li>
        </ul>
        <p>Once the request is received, we will review it and notify the client of the refund approval or rejection within 7 business days.</p>

        <h2>5. Refund Method</h2>
        <p>If a refund is approved, the amount will be credited back to the original payment method within 10-15 business days. Transaction fees, if any, may be deducted from the refund amount.</p>

        <h2>6. Changes to Policy</h2>
        <p>We reserve the right to update this Return and Refund Policy at any time. Changes will be effective immediately upon posting on our website. It is the client’s responsibility to review the policy periodically.</p>

        <h2>7. Contact Information</h2>
        <div class="contact-info">
            <p><strong>Website:</strong> <a href="https://dbaconsultancy.in">dbaconsultancy.in</a></p>
            <p><strong>Email:</strong> <a href="mailto:info@dbaconsultancy.in">info@dbaconsultancy.in</a></p>
            <p><strong>Phone:</strong> +91 9460574344</p>
            <p><strong>Address:</strong> DBA Consultancy, Near Truck Chouraha, NH 8, Bhim, Distt. Rajsamand, Rajasthan - 305921</p>
        </div>
    </div>

@endsection
