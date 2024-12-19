@extends('website.layout.websitemain')
@section('title', 'Terms and conditions | ' . config('app.name'))
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
                            <li>Terms and Conditions</li>
                        </ul>
                        <h1>Terms and Conditions</h1>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--// Breadcrumb Area -->

    <div class="container py-5">
        

        <h2>1. General</h2>
        <p>DBA Consultancy (“we,” “our,” or “us”) is a tax consultancy and loan advisory firm providing services to manage financial and legal matters efficiently. By accessing or using our online portal at <a href="https://dbaconsultancy.in">dbaconsultancy.in</a>, you agree to these terms.</p>

        <h2>2. Services</h2>
        <p>We provide tax consultancy, loan advisory, legal compliance assistance, and document management services. Clients are responsible for ensuring the accuracy and completeness of the information they provide.</p>

        <h2>3. Use of Online Portal</h2>
        <ul>
            <li>Use the portal only for lawful purposes.</li>
            <li>Maintain the confidentiality of your account credentials.</li>
            <li>Notify us immediately in case of unauthorized access to your account.</li>
        </ul>

        <h2>4. Payment Terms</h2>
        <ul>
            <li>Fees are clearly stated and must be paid as per agreed terms.</li>
            <li>Payments are non-refundable unless explicitly stated otherwise.</li>
        </ul>

        <h2>5. Confidentiality and Data Protection</h2>
        <p>We prioritize the confidentiality of your data. Refer to our Privacy Policy for detailed information.</p>

        <h2>6. Limitation of Liability</h2>
        <p>DBA Consultancy is not liable for any indirect or consequential damages arising from the use of our services. Our total liability is limited to the fees paid for the specific service.</p>

        <h2>7. Intellectual Property</h2>
        <p>All content on our website and portal is the property of DBA Consultancy and is protected by copyright laws. Unauthorized use is prohibited.</p>

        <h2>8. Amendments to Terms</h2>
        <p>We reserve the right to modify these Terms and Conditions. It is your responsibility to review updates periodically.</p>

        <h2>9. Governing Law and Jurisdiction</h2>
        <p>These terms are governed by Indian law. Disputes shall be subject to the exclusive jurisdiction of the courts in Rajsamand, Rajasthan.</p>

        <h2>10. Contact Information</h2>
        <div class="contact-info">
            <p><strong>Website:</strong> <a href="https://dbaconsultancy.in">dbaconsultancy.in</a></p>
            <p><strong>Email:</strong> <a href="mailto:info@dbaconsultancy.in">info@dbaconsultancy.in</a></p>
            <p><strong>Phone:</strong> +91 9460574344</p>
            <p><strong>Address:</strong> DBA Consultancy, Near Truck Chouraha, NH 8, Bhim, Distt. Rajsamand, Rajasthan - 305921</p>
        </div>
    </div>

@endsection
